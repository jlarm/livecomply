<?php

declare(strict_types=1);

use App\Models\Invitation;
use App\Models\User;

test('to array', function (): void {
    $invitation = Invitation::factory()->create()->refresh();

    expect(array_keys($invitation->toArray()))
        ->toBe([
            'id',
            'email',
            'role',
            'token',
            'invited_by',
            'expires_at',
            'accepted_at',
            'created_at',
            'updated_at',
        ]);
});

test('belongs to user', function (): void {
    $user = User::factory()->create();
    $invitation = Invitation::factory()->for($user, 'invitedBy')->create();

    expect($invitation->invitedBy->id)->toBe($user->id);
});

test('is valid', function (): void {
    $invitation = Invitation::factory()->create();

    expect($invitation->isValid())->toBeTrue();
});

test('has expired', function (): void {
    $invitation = Invitation::factory()->create(['expires_at' => now()->subDay()]);

    expect($invitation->hasExpired())->toBeTrue();
});
