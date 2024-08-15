<?php

namespace App\Providers;

use App\Core\KTBootstrap;
use App\Models\Contestant;
use App\Models\User;
use App\Models\Voter;
use App\Models\VotingPeriod;
use App\Models\VotingPosition;
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
            "user"          =>  User::class,
            'votingPeriod'  =>  VotingPeriod::class,
            'votingPosition'  =>  VotingPosition::class,
            'contestant'    =>  Contestant::class,
            'role'          => Role::class,
            'permission'    => Permission::class,
            'voter'         => Voter::class,
        ]);

    }
}
