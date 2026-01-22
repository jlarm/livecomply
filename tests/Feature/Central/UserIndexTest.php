<?php

declare(strict_types=1);

use App\Enums\Role;
use App\Models\User;

test('admin can see invitation page', function (): void {
    $admin = User::factory()->create(['role' => Role::ADMIN]);

    $this->actingAs($admin)
        ->get(route('users.index'))
        ->assertOk();
});

test('non-admin cannot see invitation page', function (): void {
    $consultant = User::factory()->create(['role' => Role::CONSULTANT]);

    $this->actingAs($consultant)
        ->get(route('users.index'))
        ->assertForbidden();
});
