<?php

use App\Models\Invitation;
use Flux\Flux;
use Livewire\Component;

new class extends Component {
    public Invitation $invite;

    public function delete(): void
    {
        $this->authorize('create-central', Invitation::class);

        $this->invite->delete();

        $this->dispatch('invitation-deleted');

        Flux::toast(
            text: 'Invitation Deleted Successfully',
            variant: 'success',
        );
    }
};
?>

<div>
    <flux:button
        variant="danger"
        size="xs"
        wire:click="delete"
        wire:confirm="Are you sure you want to delete the invite for {{ $invite->email }}?"
    >Delete
    </flux:button>
</div>
