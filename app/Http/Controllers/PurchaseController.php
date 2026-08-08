<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Role;
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
        $user = auth()->user();

        // Support two payload shapes: { formData: { ... }, selectedTickets: [...] }
        // or flat: { fullName: ..., selectedTickets: [...] }
        $formData = $request->input('formData') && is_array($request->input('formData'))
            ? $request->input('formData')
            : [];

        // Merge formData with top-level fields so validation can find either
        $payload = array_merge($formData, $request->all());

        // For authenticated users (purchase more), skip validating formData like fullName/email/phone
        $isAuthenticatedPurchase = $user !== null;

        if ($isAuthenticatedPurchase) {
            // Only validate tickets and payment method for purchase-more
            $rules = [
                'paymentMethod' => 'required|in:lpo,mpesa',
                'selectedTickets' => 'required|array|min:1',
            ];

            $messages = [
                'paymentMethod.required' => 'Payment method is required',
                'selectedTickets.required' => 'Selected tickets is required',
                'selectedTickets.array' => 'You must select at least one ticket type',
                'selectedTickets.min' => 'You must select at least one ticket type',
            ];
        } else {
            $rules = [
                'fullName' => 'required|string|max:255',
                'email' => 'required|unique:users|email|max:255',
                'phone' => 'required|unique:users,mobile|string|max:50',
                'country' => 'required|string|max:100',
                'paymentMethod' => 'required|in:lpo,mpesa',
                'selectedTickets' => 'required|array|min:1',
            ];

            $messages = [
                'fullName.required' => 'Full name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Enter a valid email address',
                'email.unique' => 'A delegate is already registered with this email',
                'phone.required' => 'Phone number is required',
                'phone.unique' => 'A delegate is already registered with this number',
                'country.required' => 'Country is required',
                'country.string' => 'Invalid country',
                'country.max' => 'Invalid country',
                'paymentMethod.required' => 'Payment method is required',
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

            // If authenticated user, use existing user record
            if ($isAuthenticatedPurchase) {
                $user = $user;
            } else {
                // Split full name into first_name and last_name
                $fullName = trim($payload['fullName'] ?? '');
                $firstName = null;
                $lastName = null;
                if ($fullName !== '') {
                    $parts = preg_split('/\s+/', $fullName);
                    $firstName = array_shift($parts);
                    $lastName = count($parts) ? implode(' ', $parts) : null;
                }

                // Create or update user with provided registration details
                // If the user already exists, update their profile but DO NOT overwrite their password.
                // If the user does not exist, generate a random password now so it's present on create.
                $existingUser = User::where('email', $payload['email'])->first();

                if ($existingUser) {
                    $existingUser->update([
                        'first_name' => $firstName,
                        'last_name' => $lastName,
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
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'mobile' => $payload['phone'] ?? null,
                        'country' => $payload['country'] ?? null,
                        'organization' => $payload['organization'] ?? null,
                        'email' => $payload['email'] ?? null,
                        'password' => $password,
                    ]);

                    $user->assignRole(Role::DELEGATE);
                }
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
                                $sum += (float)$item['price'] * (int)$item['count'];
                                $computed = true;
                            } elseif (isset($item['price']) && isset($item['quantity'])) {
                                $sum += (float)$item['price'] * (int)$item['quantity'];
                                $computed = true;
                            }
                        }

                        if ($computed) {
                            $amount = $sum;
                        }
                    }
                }
            }

            // Create purchase order via Eloquent so ULID is generated by HasUlids
            $purchaseOrder = PurchaseOrder::create([
                'user_id' => $user->id,
                'reference' => 'PO'.time().rand(100,999),
                'payment_method' => $payload['paymentMethod'] ?? null,
                'payment_email' => $payload['paymentEmail'] ?? null,
                'payment_phone' => $payload['paymentPhone'] ?? null,
                'tickets' => $tickets,
                'amount' => $amount ?? null,
                'currency' => $payload['currency'] ?? null,
                'status' => 'new',
            ]);

            // Queue email with login details only for newly created users
            if (!$isAuthenticatedPurchase && $password) {
                Mail::to($user->email)->queue(new LoginDetailsMail($user, $password, $purchaseOrder));
            }

            DB::commit();

            $successMessage = $isAuthenticatedPurchase
                ? 'Purchase order created successfully! You can proceed to payment.'
                : 'Congratulations! Check your email for login details to manage your ticket purchase.';

            return response()->json(['message' => $successMessage, 'order_id' => $purchaseOrder->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to save purchase',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
