<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Last backup per destination</x-slot>

        @php($runs = $this->getLatestPerDisk())

        @if ($runs->isEmpty())
            <p class="text-sm text-gray-500 dark:text-gray-400">
                No backups recorded yet.
            </p>
        @else
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($runs as $run)
                    @php($ok = $run->wasSuccessful())
                    <div @class([
                        'rounded-xl border p-4',
                        'border-success-300 bg-success-50 dark:border-success-700 dark:bg-success-400/10' => $ok,
                        'border-danger-300 bg-danger-50 dark:border-danger-700 dark:bg-danger-400/10' => ! $ok,
                    ])>
                        <div class="flex items-center justify-between gap-2">
                            <span class="font-semibold text-gray-950 dark:text-white">
                                {{ $run->disk ?? 'default' }}
                            </span>
                            <x-filament::badge :color="$ok ? 'success' : 'danger'">
                                {{ $ok ? 'Success' : 'Failed' }}
                            </x-filament::badge>
                        </div>

                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            {{ $run->created_at?->diffForHumans() ?? 'unknown' }}
                        </div>

                        @if (! $ok && $run->message)
                            <div class="mt-1 text-sm text-danger-600 dark:text-danger-400">
                                {{ \Illuminate\Support\Str::limit($run->message, 80) }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
