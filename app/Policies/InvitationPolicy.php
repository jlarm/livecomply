<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class InvitationPolicy
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

    public function createCentral(User $user): bool
    {
        return $user->role === Role::ADMIN;
    }

    public function createOrganization(User $user): bool
    {
        return $user->role->canManageInvitations();
    }

    public function delete(User $user): bool
    {
        return $user->role === Role::ADMIN;
    }

    public function allowedRolesInvite(User $user): array
    {
        if ($user->role === Role::ADMIN) {
            return [Role::ADMIN, Role::PORTER];
        }

        return [
            Role::OWNER,
            Role::CFO,
            Role::GM,
            Role::GSM,
            Role::MANAGER,
            Role::PORTER,
            Role::EMPLOYEE,
        ];
    }
}
