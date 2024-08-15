<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $password
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
        return (new MailMessage)
            ->subject('Welcome to the Kenya Innovation Week 2023 - Commonwealth Edition: Innovating to Unlock Our Commonwealth')
            ->greeting("Dear " . $notifiable->name)
            ->view('emails.notifications.default', [$notifiable])
            ->line("To login, use the below credentials")
            ->line("Email : $notifiable->email")
            ->line("Password: $this->password")
            ->action('Login', url('/login'))
            ->salutation('Welcome to the Kenya Innovation Week 2023 - Commonwealth Edition: Innovating to Unlock Our Commonwealth');
    }
}
