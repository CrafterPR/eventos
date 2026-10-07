<?php

namespace App\Http\Controllers;

use App\Enum\Currency;
use App\Models\Pesaflow\PesaflowRequest;
use App\Models\Role;
use App\Models\Sponsorship;
use App\Models\User;
use App\Mail\SponsorshipRegistrationMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SponsorshipController extends Controller
{
    private const PACKAGES = [
        'Platinum Sponsor' => ['KES' => 2000000, 'USD' => 15459],
        'Gold Sponsor' => ['KES' => 1500000, 'USD' => 11594],
        'Silver Sponsor' => ['KES' => 1000000, 'USD' => 7730],
        'Bronze Sponsor' => ['KES' => 750000, 'USD' => 5800],
        'Session Sponsor' => ['KES' => 400000, 'USD' => 3100],
        'Merchandise Sponsor' => ['KES' => 300000, 'USD' => 2319],
        'Exhibition Sponsor' => ['KES' => 300000, 'USD' => 2319],
    ];

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'package' => ['required', 'string', 'in:' . implode(',', array_keys(self::PACKAGES))],
            'currency' => ['required', 'string', 'in:KES,USD'],
            'company_name' => ['required', 'string', 'max:191'],
            'physical_address' => ['required', 'string', 'max:191'],
            'company_email' => ['required', 'email', 'max:191'],
            'contact_name' => ['required', 'string', 'max:191'],
            'contact_email' => ['required', 'email', 'max:191'],
            'contact_mobile' => ['required', 'string', 'max:50'],
            'terms' => ['accepted'],
        ]);

        $currency = Currency::from($validated['currency']);
        $amount = self::PACKAGES[$validated['package']][$currency->value];
        $serviceId = config('services.pesaflow.' . strtolower($currency->value) . '_service_id');
        $nameParts = preg_split('/\s+/', trim($validated['contact_name']), 2);

        [$sponsorship, $user, $password, $paymentRequest] = DB::transaction(function () use (
            $validated,
            $currency,
            $amount,
            $serviceId,
            $nameParts
        ) {
            $user = User::where('email', $validated['contact_email'])->first();
            $password = null;

            if (!$user) {
                $password = Str::random(12);
                $user = User::create([
                    'first_name' => $nameParts[0] ?? $validated['contact_name'],
                    'last_name' => $nameParts[1] ?? '',
                    'email' => $validated['contact_email'],
                    'password' => $password,
                ]);
                $user->assignRole(Role::DELEGATE);
            }

            $sponsorship = Sponsorship::create([
                'user_id' => $user->id,
                'reference' => 'SP' . now()->format('ymdHis') . Str::upper(Str::random(6)),
                'package' => $validated['package'],
                'company_name' => $validated['company_name'],
                'physical_address' => $validated['physical_address'],
                'company_email' => $validated['company_email'],
                'contact_name' => $validated['contact_name'],
                'contact_email' => $validated['contact_email'],
                'contact_mobile' => $validated['contact_mobile'],
                'amount' => $amount,
                'currency' => $currency,
                'status' => 'pending',
            ]);

            $paymentRequest = pesaflow_request_payment(
                $sponsorship,
                $validated['package'],
                $serviceId,
                $currency
            );

            return [$sponsorship, $user, $password, $paymentRequest];
        });

        Mail::to($validated['contact_email'])->queue(
            new SponsorshipRegistrationMail($sponsorship, $password, $paymentRequest->invoice_link)
        );

        return response()->json([
            'message' => 'Sponsorship application created. Check your email for the company and account details.',
            'sponsorship_id' => $sponsorship->id,
            'payment_url' => $paymentRequest->invoice_link,
            'invoice_link' => $paymentRequest->invoice_link,
        ]);
    }

    public function status(string $id): JsonResponse
    {
        $sponsorship = Sponsorship::find($id);
        if (!$sponsorship) {
            return response()->json(['message' => 'Sponsorship not found'], 404);
        }

        $paymentRequest = PesaflowRequest::where('sponsorship_id', $sponsorship->id)->latest()->first();

        return response()->json([
            'sponsorship_id' => $sponsorship->id,
            'status' => $sponsorship->status,
            'pesaflow' => $paymentRequest ? [
                'invoice_number' => $paymentRequest->invoice_number,
                'status' => $paymentRequest->status,
            ] : null,
        ]);
    }
}
