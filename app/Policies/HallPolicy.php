<?php

namespace App\Policies;

use App\Models\Hall;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Silber\Bouncer\Bouncer;

class HallPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hall $hall)
    {
        // Tous les utilisateurs, y compris les Opérateurs et les Administrateurs, peuvent voir les halls.
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Hall $hall)
    {
        // Seuls les Administrateurs peuvent mettre à jour les halls.
        return $user->isAdmin();
    }

    public function delete(User $user, Hall $hall)
    {
        // Seuls les Administrateurs peuvent supprimer les halls.
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hall $hall): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hall $hall): bool
    {
        //
    }
}
