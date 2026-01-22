<x-layouts::app :title="__('Open Invites')">
    <div>
        <x-slot:heading>Open Invites</x-slot:heading>
        <x-slot:actions>
            <x-central.user.subnav />
        </x-slot:actions>
    </div>
    <div>
        <livewire:central.user.open-invite-index />
    </div>
</x-layouts::app>

