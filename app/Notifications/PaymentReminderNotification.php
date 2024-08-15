<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesaflow\PesaflowRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class PaymentReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public OrderItem $orderItem)
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
    public function toMail(object $notifiable): MailMessage
    {
        $formattedAmount = format_amount($this->orderItem->total, $this->orderItem->currency);
        $template = EmailTemplate::where('key', 'payment_reminder')->first();
        if ($template) {
            $paymentLink = $this->getPaymentLink($this->orderItem);
            $variables = [
                'item' => $this->orderItem->itemable?->title,
                'amount' => $formattedAmount,
                'link' => $paymentLink,
                'date' => format_date($this->orderItem->order?->created_at),
            ];

            return (new MailMessage)
                ->subject($template->subject)
                ->action('Pay Now', $paymentLink)
                ->view('emails.notifications.default', ['emailBody' => transform_config($template->body, $variables), 'name' => $notifiable->name,]);
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

    private function getPaymentLink($orderItem): string|null
    {
        $request = PesaflowRequest::query()
                ->where('order_id', $orderItem->order_id)
               ->latest()->first();
        if ($request) {
            return $request->invoice_link;
        }

        $request = pesaflow_request_payment(
            order: $orderItem->order,
            billDescription: 'Payment for '.$orderItem->itemable_type == 'ticket' ? $orderItem->itemable?->title : "Booth No " . $orderItem->itemable_type_id,
            serviceId: $orderItem->order->service_code,
            currency: $orderItem->order->currency->value
        );
        return $request['invoice_link'];
    }
}
