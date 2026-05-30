<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\FarmCategory;
use App\Models\User;

class FarmCategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FarmCategory $farmCategory): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function update(User $user, FarmCategory $farmCategory): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function delete(User $user, FarmCategory $farmCategory): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function deleteAny(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }
}
