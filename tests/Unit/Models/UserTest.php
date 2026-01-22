<?php

declare(strict_types=1);

use App\Models\Invitation;
use App\Models\User;

test('to array', function (): void {
    $user = User::factory()->create()->refresh();

    expect(array_keys($user->toArray()))
        ->toBe([
            'id',
            'name',
            'email',
            'email_verified_at',
            'role',
            'qualified_individual',
            'created_at',
            'updated_at',
            'two_factor_confirmed_at',
        ]);
});

test('has many invitations', function (): void {
    $user = User::factory()->create();
    Invitation::factory(3)->for($user, 'invitedBy')->create();

    expect($user->invitations)
        ->toHaveCount(3)
        ->each(fn ($invitation) => $invitation->invited_by->toBe($user->id));
});
