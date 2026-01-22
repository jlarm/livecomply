<x-layouts::app :title="__('Users')">
    <div>
        <x-slot:heading>Users</x-slot:heading>
        <x-slot:actions>
            <x-central.user.subnav />
        </x-slot:actions>
    </div>
</x-layouts::app>

