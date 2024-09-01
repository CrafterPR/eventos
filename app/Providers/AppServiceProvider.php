<?php

namespace App\Providers;

use App\Core\KTBootstrap;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\PaymentService;
use App\Models\Summit;
use App\Models\Ticket;
use App\Models\TicketPayment;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Update defaultStringLength
        Builder::defaultStringLength(191);

        KTBootstrap::init();

        Relation::enforceMorphMap([
            "user" => User::class,
            "booth" => Booth::class,
            "booking" => Booking::class,
            "ticket" => Ticket::class,
            "payment_service" => PaymentService::class,
            "ticket_payment" => TicketPayment::class,
            'role' => Role::class,
            'permission' => Permission::class
        ]);
    }
}
