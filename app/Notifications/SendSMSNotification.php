<?php

namespace App\Notifications;

use App\Models\VotingPeriod;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\AfricasTalking\AfricasTalkingChannel;
use NotificationChannels\AfricasTalking\AfricasTalkingMessage;

class SendSMSNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private readonly VotingPeriod $votingPeriod)
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
        return [AfricasTalkingChannel::class];
    }

    public function viaQueues()
    {
        return [
            AfricasTalkingChannel::class => 'default',
        ];
    }

    /**
     */
    public function toAfricasTalking($notifiable): AfricasTalkingMessage
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->votingPeriod->election_date)->format('dS,M y');
        $startTime =  Carbon::createFromFormat('H:i:s',$this->votingPeriod->starts_at)->format('H:i A');
        $endTime =  Carbon::createFromFormat('H:i:s',$this->votingPeriod->ends_at)->format('H:i A');
        $ussdCode = config('USSD_CODE');

        return (new AfricasTalkingMessage())
            ->from(config('services.africastalking.from_transactional'))
            ->content("Dear {$notifiable->first_name},
             We humbly notify you to vote for Sacco Officials on $date. Voting opens at $startTime to $endTime. Dial $ussdCode to vote.");
    }


}
