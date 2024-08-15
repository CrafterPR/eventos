<?php

namespace App\Notifications;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class SendInvitationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
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
        $template = EmailTemplate::where('key', 'welcome_invite')->first();
        if ($template) {
            $variables = [
                'theme' => 'INNOVATING TO UNLOCK OUR COMMON WEALTH',
                'signature' => true];
            $invitationLetter = Storage::disk('public')->path('/invitations/' . $notifiable->id . '/' . $notifiable->first_name . '_' . $notifiable->last_name . '.pdf');
            return (new MailMessage)
                ->subject($template->subject)
                ->view('emails.notifications.default', ['emailBody' => transform_config($template->body, $variables), 'name' => $notifiable->first_name,])
                ->action('Login', route('login'))
                ->attach($invitationLetter);
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
