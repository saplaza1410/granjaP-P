<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\FarmInventoryMovement;
use App\Models\User;

class FarmInventoryMovementPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FarmInventoryMovement $farmInventoryMovement): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->atLeastRole(UserRole::Operator);
    }

    public function update(User $user, FarmInventoryMovement $farmInventoryMovement): bool
    {
        return $user->atLeastRole(UserRole::Operator);
    }

    public function delete(User $user, FarmInventoryMovement $farmInventoryMovement): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function deleteAny(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }
}
