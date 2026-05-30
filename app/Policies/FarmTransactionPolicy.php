<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\FarmTransaction;
use App\Models\User;

class FarmTransactionPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FarmTransaction $farmTransaction): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->atLeastRole(UserRole::Operator);
    }

    public function update(User $user, FarmTransaction $farmTransaction): bool
    {
        return $user->atLeastRole(UserRole::Operator);
    }

    public function delete(User $user, FarmTransaction $farmTransaction): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }

    public function deleteAny(User $user): bool
    {
        return $user->atLeastRole(UserRole::Manager);
    }
}
