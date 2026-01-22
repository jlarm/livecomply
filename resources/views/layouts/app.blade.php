<x-layouts::app.sidebar :title="$title ?? null">
    @isset($heading)
        <div class="p-6 pb-0">
            <div class="flex items-center justify-between">
                <flux:heading size="xl">{{ $heading }}</flux:heading>
                @isset($actions)
                <div>
                    {{ $actions }}
                </div>
                @endif
            </div>
            <flux:separator variant="subtle" />
        </div>
    @endif
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>
