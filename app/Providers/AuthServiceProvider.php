<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));

        Passport::enableImplicitGrant();

        Passport::personalAccessClientId('5');

        /*定义作用域*/
        Passport::tokensCan([
            'user' => 'user info',
            'place-orders' => 'Place orders',
            'check-status' => 'Check order status',
            'test' => [
                'test1' => 'test1',
                'test2' => 'test2',
            ],
        ]);

        /*默认作用域*/
        Passport::setDefaultScope([
            'user',
        ]);
    }
}
