<?php

use App\Enums\Role;
use App\Models\Invitation;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Flux\Flux;

new class extends Component {
    #[Validate(['required', 'email', 'unique:invitations,email', 'unique:users,email'])]
    public string $email = '';

    public function submit(): void
    {
        $this->authorize('create-central', Invitation::class);

        $this->validate();

        Invitation::create([
            'email' => $this->email,
            'role' => Role::CONSULTANT,
        ]);

        $this->dispatch('invitation-sent');

        Flux::toast(
            text: 'Invite Successfully Sent',
            variant: 'success',
        );

        Flux::modal('send-invite')->close();
    }
};
?>

<div>
    <flux:modal.trigger name="send-invite">
        <flux:navbar.item>Send Invite</flux:navbar.item>
    </flux:modal.trigger>

    <flux:modal name="send-invite">
        <form wire:submit.prevent="submit" class="space-y-6">
            <div>
                <flux:heading size="lg">Send Invite</flux:heading>
            </div>
            <flux:field>
                <flux:label>Email</flux:label>

                <flux:input wire:model="email" type="email"/>

                <flux:error name="email"/>
            </flux:field>
            <div class="flex">
                <flux:spacer/>
                <flux:button type="submit" variant="primary">Send</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
