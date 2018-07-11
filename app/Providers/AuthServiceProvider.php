<?php

namespace App\Providers;

use App\Client;
use App\Policies\ClientPolicy;
use App\Policies\TypePolicy;
use App\Policies\UserPolicy;
use App\Type;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',


        User::class   => UserPolicy::class,
        Client::class => ClientPolicy::class,
        Type::class => TypePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


    }
}
