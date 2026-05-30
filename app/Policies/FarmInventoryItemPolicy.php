<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\FarmInventoryItem;
use App\Models\User;

class FarmInventoryItemPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FarmInventoryItem $farmInventoryItem): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->atLeastRole(UserRole::Operator);
    }

    public function update(User $user, FarmInventoryItem $farmInventoryItem): bool
    {
        return $user->atLeastRole(UserRole::Operator);
    }

    public function delete(User $user, FarmInventoryItem $farmInventoryItem): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function deleteAny(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }
}
