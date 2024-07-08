<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Enseignant;
use App\Models\User;
use App\Policies\DeatilgroupePolicy;
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
        Enseignant::class => DeatilgroupePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate::define('view-groupe', function(User $enseignant, $id){
        //         return $enseignant->id == $id;
        //     });
    }
}
