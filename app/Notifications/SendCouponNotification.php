<?php

namespace App\Notifications;

use App\Models\Coupon;
use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendCouponNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Coupon $coupon)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $template = EmailTemplate::where('key', 'send_coupon')->first();
        if ($template) {
            $variables = [
                'code' => $this->coupon->code,
                'organization' => $this->coupon->organization,
                'no_of_delegates' => $this->coupon->no_of_delegates,
                'type' => $this->coupon->type,
            ];

            return (new MailMessage)
                ->subject($template->subject)
                ->cc('accounts@innovationagency.go.ke')
                ->view('emails.notifications.default', ['emailBody' => transform_config($template->body, $variables), 'name' => $this->coupon->organization]);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
