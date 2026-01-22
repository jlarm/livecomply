<?php

declare(strict_types=1);

use App\Enums\Role;
use App\Models\User;

it('admin can create user invite', function (): void {
    $admin = User::factory()->create(['role' => Role::ADMIN]);

    $this->actingAs($admin);

    Livewire::test('central.user.invite-modal')
        ->set('email', 'test@email.com')
        ->call('submit')
        ->assertOk();
});

it('non-admin cannot create user invite', function (): void {
    $consultant = User::factory()->create(['role' => Role::CONSULTANT]);

    $this->actingAs($consultant);

    Livewire::test('central.user.invite-modal')
        ->set('email', 'test@email.com')
        ->call('submit')
        ->assertForbidden();
});
