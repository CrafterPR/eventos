<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'formData.fullName' => 'required|string|max:255',
            'formData.email' => 'required|email|max:255',
            'formData.phone' => 'required|string|max:50',
            'formData.country' => 'required|string|max:100',
            'paymentMethod' => 'required|in:lpo,mpesa',
            'selectedTickets' => 'required|array|min:1',
        ];

        if ($request->input('paymentMethod') === 'lpo') {
            $rules['paymentEmail'] = 'required|email|max:255';
        } elseif ($request->input('paymentMethod') === 'mpesa') {
            $rules['paymentPhone'] = 'required|string|max:50';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $dataToSave = [
            'name' => $request->input('formData.fullName'),
            'email' => $request->input('formData.email'),
            'phone' => $request->input('formData.phone'),
            'country' => $request->input('formData.country'),
            'organization' => $request->input('formData.organization'),
            'payment_method' => $request->input('paymentMethod'),
            'payment_email' => $request->input('paymentEmail'),
            'payment_phone' => $request->input('paymentPhone'),
            'tickets' => $request->input('selectedTickets'),
        ];

        try {
            // Save into inbox_entries.content as JSON to avoid schema assumptions
            DB::table('inbox_entries')->insert([
                'content' => json_encode($dataToSave),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['message' => 'Purchase saved successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to save purchase',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
