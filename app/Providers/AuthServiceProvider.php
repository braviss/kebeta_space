<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('view-admin', function (User $user) {

           if(Auth::user()->status == 'admin') {
                //  Log::channel('admin')->info('Авторизация в панели: '. Auth::user()->name);
                 return $user->status == 'admin';
           }
           else {
             Log::channel('admin')->info('Попытка авторизации в панели');
           }

        });
    }
}
