<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\FarmZone;
use App\Models\User;

class FarmZonePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FarmZone $farmZone): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function update(User $user, FarmZone $farmZone): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function delete(User $user, FarmZone $farmZone): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function deleteAny(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }
}
