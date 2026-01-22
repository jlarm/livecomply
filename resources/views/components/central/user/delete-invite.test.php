<?php

declare(strict_types=1);

use App\Enums\Role;
use App\Models\Invitation;
use App\Models\User;

test('admin can delete invitation', function (): void {
    $admin = User::factory()->create(['role' => Role::ADMIN]);
    $invitation = Invitation::factory()->create();

    $this->assertDatabaseHas('invitations', ['id' => $invitation->id]);

    $this->actingAs($admin);

    Livewire::test('central.user.delete-invite', ['invite' => $invitation])
        ->call('delete')
        ->assertOk();

    $this->assertDatabaseMissing('invitations', ['id' => $invitation->id]);
});

test('non-admin cannot delete invitation', function (): void {
    $consultant = User::factory()->create(['role' => Role::CONSULTANT]);
    $invitation = Invitation::factory()->create();

    $this->assertDatabaseHas('invitations', ['id' => $invitation->id]);

    $this->actingAs($consultant);

    Livewire::test('central.user.delete-invite', ['invite' => $invitation])
        ->call('delete')
        ->assertForbidden();

    $this->assertDatabaseHas('invitations', ['id' => $invitation->id]);
});
