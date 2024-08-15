<?php

namespace App\Observers;

use App\Actions\GenerateInvitationLetter;
use App\Enum\UserType;
use App\Models\User;
use App\Notifications\SendInvitationNotification;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function created(User $user): void
    {
        if ($user->user_type == UserType::DELEGATE || $user->user_type == UserType::EXHIBITOR) {
            try {

                if (GenerateInvitationLetter::run($user)) {
                    $user->notify(new SendInvitationNotification());
                    $user->update(['invitation_sent' => true]);
                }
            } catch (\Exception $exception) {
                report($exception);
            }
        }
    }
}
