<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class TicketNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public OrderItem $orderItem
    )
    {
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
        $formattedAmount = format_amount($this->orderItem->total, $this->orderItem->currency);
        $template = EmailTemplate::where('key', 'ticket_notification')->first();
        $variables = [
            'ticket_type' =>  $this->orderItem->itemable?->title,
            'reference_no' => $this->orderItem->reference_no,
            'amount' => $formattedAmount,
            'name' => $notifiable->name,
            'date' => format_date($this->orderItem->order?->check_out_completed_at),
            'payer' => $this->orderItem->order->user?->name,
        ];
        return (new MailMessage)
            ->subject($template->subject)
            ->view('emails.notifications.default', ['emailBody' => transform_config($template->body, $variables), 'name' => $notifiable->name,])
            ->attach(Storage::disk('public')->path($this->orderItem->ticket_url));

    }
}
