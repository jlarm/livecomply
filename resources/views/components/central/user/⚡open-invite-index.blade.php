<?php

use App\Models\Invitation;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    #[Computed]
    #[On('invitation-sent')]
    #[On('invitation-deleted')]
    public function invites()
    {
        return Invitation::query()
            ->orderBy('email')
            ->paginate(20);
    }
};
?>

<div>
    <flux:table :paginate="$this->invites">
        <flux:table.columns>
            <flux:table.column>Email</flux:table.column>
            <flux:table.column>Sent</flux:table.column>
            <flux:table.column>Expires</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach($this->invites as $invite)
                <flux:table.row>
                    <flux:table.cell>{{ $invite->email }}</flux:table.cell>
                    <flux:table.cell>{{ $invite->created_at->format('Y-m-d H:i:s') }}</flux:table.cell>
                    <flux:table.cell>{{ $invite->expires_at->format('Y-m-d H:i:s') }}</flux:table.cell>
                    <flux:table.cell align="end">
                        <livewire:central.user.delete-invite :$invite />
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
