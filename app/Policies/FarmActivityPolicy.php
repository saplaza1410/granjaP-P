<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\FarmActivity;
use App\Models\User;

class FarmActivityPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FarmActivity $farmActivity): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function update(User $user, FarmActivity $farmActivity): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function delete(User $user, FarmActivity $farmActivity): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function deleteAny(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }
}
