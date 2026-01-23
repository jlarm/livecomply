<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class UserPolicy
{
    use HandlesAuthorization;

    public function viewAnyCentral(User $user): bool
    {
        return $user->role === Role::ADMIN;
    }

    public function viewAnyOrganization(User $user): bool
    {
        return $user->role->canManageInvitations();
    }
}
