<?php

namespace App\Listeners;

use App\Events\PesaflowPaymentSuccessfulEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginDetailsMail;
use App\Models\User;
use App\Models\Role;

class PesaflowPaymentSuccessfulListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(PesaflowPaymentSuccessfulEvent $event): void
    {
        $order = $event->purchase_order;

        // If a user already exists on the purchase order, reset password and email credentials
        $user = $order->user;

        // Generate a new password and email it to the user (or create the user if missing)
        $password = Str::random(10);

        if (!$user) {
            // Attempt best-effort creation using available contact info on the order
            $email = $order->payment_email;
            if (!$email) {
                // Can't create user without email
                return;
            }

            $user = User::create([
                'first_name' => $order->first_name ?? null,
                'last_name' => $order->last_name ?? null,
                'mobile' => $order->payment_phone ?? null,
                'email' => $email,
                'password' => $password,
            ]);

            // Assign delegate role if available
            try {
                $user->assignRole(Role::DELEGATE);
            } catch (\Throwable $e) {
                // ignore role assignment failures
            }

            Mail::to($user->email)->queue(new LoginDetailsMail($user, $password, $order));

            return;
        }

        // Reset passwords for existing user and send login details
        $user->password = $password;
        $user->save();

        try {
            if (!$user->hasRole(Role::DELEGATE)) {
                $user->assignRole(Role::DELEGATE);
            }
        } catch (\Throwable $e) {
            // ignore
        }

        Mail::to($user->email)->queue(new LoginDetailsMail($user, $password, $order));
    }
}
