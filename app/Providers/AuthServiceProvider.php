<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | God Mode
        |--------------------------------------------------------------------------
        |
        | God mode = do _anything_
        */
        Gate::define('is-god', fn (User $user) => $user->is_god);
    }
}
