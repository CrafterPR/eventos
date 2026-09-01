<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Role;
use App\Models\Pesaflow\PesaflowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginDetailsMail;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {

        // Support two payload shapes: { formData: { ... }, selectedTickets: [...] }
        // or flat: { fullName: ..., selectedTickets: [...] }
        $formData = $request->input('formData') && is_array($request->input('formData'))
            ? $request->input('formData')
            : [];

        // Merge formData with top-level fields so validation can find either
        $payload = array_merge($formData, $request->all());

        $firstName = trim((string) ($payload['firstName'] ?? $payload['first_name'] ?? ''));
        $lastName = trim((string) ($payload['lastName'] ?? $payload['last_name'] ?? ''));
        $fullName = trim((string) ($payload['fullName'] ?? ''));

        if ($fullName !== '' && ($firstName === '' || $lastName === '')) {
            $parts = preg_split('/\s+/', $fullName);
            $firstName = $firstName !== '' ? $firstName : (string) ($parts[0] ?? '');
            $lastName = $lastName !== '' ? $lastName : implode(' ', array_slice($parts, 1));
        }

        $payload['firstName'] = $firstName;
        $payload['lastName'] = $lastName;
        $payload['fullName'] = trim($firstName . ' ' . $lastName);
        $payload['currency'] = strtoupper((string) ($payload['currency'] ?? 'KES'));
        $payload['paymentMethod'] = $payload['paymentMethod'] ?? 'pesaflow';

        // For authenticated users (purchase more), skip validating formData like fullName/email/phone
        $isAuthenticatedPurchase = $request->boolean('isPurchaseMore');

        if ($isAuthenticatedPurchase) {
            // Only validate tickets and payment method for purchase-more
            $rules = [
                'currency' => 'required|string|in:KES,USD',
                'paymentMethod' => 'nullable|in:lpo,mpesa,pesaflow',
                'selectedTickets' => 'required|array|min:1',
            ];

            $messages = [
                'currency.required' => 'Currency is required',
                'currency.in' => 'Currency must be KES or USD',
                'selectedTickets.required' => 'Selected tickets is required',
                'selectedTickets.array' => 'You must select at least one ticket type',
                'selectedTickets.min' => 'You must select at least one ticket type',
            ];
        } else {
            $rules = [
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|unique:users|email|max:255',
                'phone' => 'required|unique:users,mobile|string|max:50',
                'country' => 'required|string|max:100',
                'currency' => 'required|string|in:KES,USD',
                'paymentMethod' => 'nullable|in:lpo,mpesa,pesaflow',
                'selectedTickets' => 'required|array|min:1',
            ];

            $messages = [
                'firstName.required' => 'First name is required',
                'lastName.required' => 'Last name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Enter a valid email address',
                'email.unique' => 'A delegate is already registered with this email',
                'phone.required' => 'Phone number is required',
                'phone.unique' => 'A delegate is already registered with this number',
                'country.required' => 'Country is required',
                'country.string' => 'Invalid country',
                'country.max' => 'Invalid country',
                'currency.required' => 'Currency is required',
                'currency.in' => 'Currency must be KES or USD',
                'selectedTickets.required' => 'Selected tickets is required',
                'selectedTickets.array' => 'You must select at least one ticket type',
                'selectedTickets.min' => 'You must select at least one ticket type',
            ];
        }

        if (($payload['paymentMethod'] ?? null) === 'lpo') {
            $rules['paymentEmail'] = 'required|email|max:255';
        } elseif (($payload['paymentMethod'] ?? null) === 'mpesa') {
            $rules['paymentPhone'] = 'required|string|max:50';
        }

        $validator = Validator::make($payload, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'step' => 1,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            // If is not authenticated user
            if (!$isAuthenticatedPurchase) {
                $existingUser = User::where('email', $payload['email'])->first();

                if ($existingUser) {
                    $existingUser->update([
                        'first_name' => $firstName ?: null,
                        'last_name' => $lastName ?: null,
                        'mobile' => $payload['phone'] ?? null,
                        'country' => $payload['country'] ?? null,
                        'organization' => $payload['organization'] ?? null,
                    ]);

                    $user = $existingUser;
                    $password = null; // keep existing password
                } else {
                    // Generate a random password for new users (User model mutator will hash it)
                    $password = Str::random(10);

                    $user = User::create([
                        'first_name' => $firstName ?: null,
                        'last_name' => $lastName ?: null,
                        'mobile' => $payload['phone'] ?? null,
                        'country' => $payload['country'] ?? null,
                        'organization' => $payload['organization'] ?? null,
                        'email' => $payload['email'] ?? null,
                        'password' => $password,
                    ]);

                    $user->assignRole(Role::DELEGATE);
                }
            } else {
                $user = User::where('email', $payload['paymentEmail'] ?? $payload['email'] ?? null)->first();
            }

            // Determine tickets payload
            $tickets = $payload['selectedTickets'] ?? ($payload['tickets'] ?? []);
            if (is_string($tickets)) {
                $tickets = json_decode($tickets, true) ?: [];
            }

            // Compute amount from tickets if not provided explicitly
            $amount = $payload['amount'] ?? null;
            if ($amount === null) {
                if (is_array($tickets)) {
                    // Case 1: selectedTickets is an associative array with 'total'
                    if (array_key_exists('total', $tickets) && is_numeric($tickets['total'])) {
                        $amount = $tickets['total'];
                    } else {
                        // Case 2: selectedTickets is an array of items. Sum item totals or price*count
                        $sum = 0;
                        $computed = false;
                        foreach ($tickets as $item) {
                            if (!is_array($item)) continue;

                            if (isset($item['total']) && is_numeric($item['total'])) {
                                $sum += $item['total'];
                                $computed = true;
                            } elseif (isset($item['price']) && isset($item['count'])) {
                                $sum += (float) $item['price'] * (int) $item['count'];
                                $computed = true;
                            } elseif (isset($item['price']) && isset($item['quantity'])) {
                                $sum += (float) $item['price'] * (int) $item['quantity'];
                                $computed = true;
                            }
                        }

                        if ($computed) {
                            $amount = $sum;
                        }
                    }
                }
            }

            $currency = strtoupper((string) ($payload['currency'] ?? 'KES'));
            $serviceMap = [
                'KES' => config('services.pesaflow.kes_service_id'),
                'USD' => config('services.pesaflow.usd_service_id'),
            ];
            $serviceCode = $serviceMap[$currency];

            // Create purchase order via Eloquent so ULID is generated by HasUlids
            $purchaseOrder = PurchaseOrder::create([
                'user_id' => $user->id,
                'reference' => 'PO'.time().'2026',
                'payment_method' => $payload['paymentMethod'] ?? 'pesaflow',
                'payment_email' => $payload['paymentEmail'] ?? $payload['email'] ?? null,
                'payment_phone' => $payload['paymentPhone'] ?? $payload['phone'] ?? null,
                'tickets' => $tickets,
                'amount' => $amount ?? null,
                'currency' => $currency,
                'status' => 'new',
            ]);

            $paymentRequest = pesaflow_request_payment(
                $purchaseOrder,
                'Conference Fee',
                $serviceCode,
                $currency
            );

            // Defer sending login details until payment is confirmed via Pesaflow webhook/event
            // (Email will be sent by PesaflowPaymentSuccessfulListener)

            DB::commit();

            $paymentUrl = $paymentRequest->invoice_link ?? route('login');
            $successMessage = $isAuthenticatedPurchase
                ? 'Purchase order created successfully! Redirecting to payment.'
                : 'Congratulations! Check your email for login details to manage your ticket purchase.';

            return response()->json([
                'message' => $successMessage,
                'purchase_order_id' => $purchaseOrder->id,
                'currency' => $currency,
                'service_code' => $serviceCode,
                'payment_url' => $paymentUrl,
                'iframe_url' => $paymentUrl,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to save purchase',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Return purchase order status and related pesaflow request status for polling.
     */
    public function status(Request $request, $id)
    {
        $order = PurchaseOrder::where('id', $id)->first();
        if (!$order) {
            return response()->json(['message' => 'Purchase order not found'], 404);
        }

        $pesaflowRequest = PesaflowRequest::where('purchase_order_id', $order->id)->latest()->first();

        return response()->json([
            'purchase_order_id' => $order->id,
            'status' => $order->status,
            'transaction_reference' => $order->transaction_reference,
            'pesaflow' => $pesaflowRequest ? [
                'invoice_number' => $pesaflowRequest->invoice_number,
                'invoice_link' => $pesaflowRequest->invoice_link,
                'status' => $pesaflowRequest->status
            ] : null
        ]);
    }
}
