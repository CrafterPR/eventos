<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class PaymentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected string $actionUrl;
    protected string $reference;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Order $order)
    {
        $this->reference = $this->order->reference;
        $userType = $this->order->user->user_type->value;

        $this->actionUrl = config("app.url") . "/portal/$userType/receipt?reference=$this->reference";
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
    public function toMail(User $notifiable): MailMessage
    {
        $formattedAmount = format_amount($this->order->total_amount, $this->order->currency);

        $template = EmailTemplate::where('key', 'payment_notification')->first();

        $variables = [
            //'item' => $this->order->orderItem?->itemable_type == 'ticket' ? $this->order->orderItem?->itemable?->title : "Booth No " . $this->order->orderItem?->itemable_type_id,
            'reference' => $this->reference,
            'amount' => $formattedAmount,
            'transaction_reference' => $this->order->transaction_reference,
            'date' => format_date($this->order->check_out_completed_at ?? now()),
            'method' => $this->order->payment_method,
        ];

        return (new MailMessage)
            ->cc('accounts@innovationagency.go.ke')
            ->subject($template->subject)
            ->view('emails.notifications.default', ['emailBody' => transform_config($template->body, $variables), 'name' => $notifiable->name,])
            ->action('View Receipt', $this->actionUrl)
            ->attach(Storage::disk('public')->path($this->order->receipt_url));

    }
}
