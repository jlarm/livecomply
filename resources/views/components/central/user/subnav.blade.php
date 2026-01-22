<div class="flex items-center gap-4">
    <flux:navbar>
        <flux:navbar.item wire:navigate :href="route('users.index')">Users</flux:navbar.item>
        <flux:navbar.item wire:navigate :href="route('users.open-invites')">Open Invites</flux:navbar.item>
        <livewire:central.user.invite-modal />
    </flux:navbar>
</div>
