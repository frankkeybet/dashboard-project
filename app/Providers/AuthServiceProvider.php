<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function ( User $user, $token) {
            return 'http://127.0.0.1:8000/custom-password/reset/' . $token . '?email=' . $user->email;
        });
    }
}
