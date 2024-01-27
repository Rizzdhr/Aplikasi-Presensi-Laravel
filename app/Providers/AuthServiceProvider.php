<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Gate;

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
    // public function boot()
    // {
    //     $this->registerPolicies();

    //     Gate::define('create_data', function ($user) {
    //         // Logika untuk memberikan otorisasi membuat data
    //         return $user->hasPermissionTo('create_data');
    //     });

    //     Gate::define('edit_data', function ($user) {
    //         // Logika untuk memberikan otorisasi mengedit data
    //         return $user->hasPermissionTo('edit_data');
    //     });

    //     Gate::define('delete_data', function ($user) {
    //         // Logika untuk memberikan otorisasi menghapus data
    //         return $user->hasPermissionTo('delete_data');
    //     });
    // }
}
