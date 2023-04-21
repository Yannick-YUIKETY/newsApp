<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {

        //'admin' est le nom de l'autorisation pour la facade gate et l'autre admin est l'admin dans la db

        Gate::define('admin', function (User $user) {
            return $user->admin === 1;
        });

        /*
        Gate::define('abonnement', function (User $user) {
            return date('Y-m-d H:i:s')<= $user->abonnement ;
        });
        */


        /* test autorisation majeur
        Gate::define('majeur', function (User $user){

            $age = date('Y')-intval(substr($user->datenais,4,4)) ;

            return $age >= 18 ;
        }
        */






    }
}
