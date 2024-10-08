<?php

namespace App\Providers;

use App\Events\PesaflowPaymentFailedEvent;
use App\Events\PesaflowPaymentSuccessfulEvent;
use App\Events\TicketApprovedEvent;
use App\Listeners\PesaflowPaymentFailedListener;
use App\Listeners\PesaflowPaymentSuccessfulListener;
use App\Listeners\SendTicketNotificationListener;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use App\Observers\CouponObserver;
use App\Observers\EventObserver;
use App\Observers\OrderObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Http\Client\Events\RequestSending' => [
            'App\Listeners\LogRequestSending',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
         Event::observe(EventObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
