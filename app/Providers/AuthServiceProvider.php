<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\HallPolicy;
use App\Models\Hall;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('hall', HallPolicy::class);

        // D'autres autorisations et configurations peuvent être ajoutées ici

        // Par exemple, si vous avez d'autres modèles et politiques :
        // Gate::resource('autre_modele', AutreModelePolicy::class);
    }
}
