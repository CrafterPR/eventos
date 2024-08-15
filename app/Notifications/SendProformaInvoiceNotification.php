<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class SendProformaInvoiceNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Order $order)
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
        $template = EmailTemplate::where('key', 'send_proforma_invoice')->first();
        if ($template) {
            $this->order->load('orderItems');
            $formattedAmount = format_amount($this->order->total_amount, $this->order->currency);
            $variables = [
                'service' => $this->order->orderItems[0]->itemable_type == 'ticket' ? $this->order->orderItems[0]->itemable?->title : "booth no ".$this->order->orderItems[0]->itemable_id,
                'invoice_number' => $this->order->reference,
                'amount' => $formattedAmount,
                'reference' => $this->order->reference];
            $invoice = Storage::disk('public')->path('/invoices/' . $notifiable->id . '/' . $notifiable->first_name . '_' . $notifiable->last_name . '.pdf');

            return (new MailMessage)
                ->cc(['accounts@innovationagency.go.ke','f.okwara@innovationagency.go.ke'])
                ->subject($template->subject)
                ->view('emails.notifications.default', ['emailBody' => transform_config($template->body, $variables), 'name' => $notifiable->first_name,])
                ->attach($invoice);
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
