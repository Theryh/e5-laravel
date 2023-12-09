<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\HallPolicy;
use App\Models\Hall;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        // Définir les autorisations individuelles pour la ressource 'hall'
        Gate::define('create-hall', [HallPolicy::class, 'create']);
        Gate::define('view-hall', [HallPolicy::class, 'view']);
        Gate::define('update-hall', [HallPolicy::class, 'update']);
        Gate::define('delete-hall', [HallPolicy::class, 'delete']);

        // Vous pouvez également utiliser Gate::resource pour les actions standard
        Gate::resource('hall', HallPolicy::class);
    }
}
