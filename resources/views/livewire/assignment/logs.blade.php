<div class="space-y-4" x-data="{isOpen: false}">
    <h2 class="font-bold text-2xl">
        {{ __('Logs') }}
    </h2>
    <div class="underline cursor-pointer select-none w-fit" x-cloak @click="isOpen = !isOpen">
        <span x-show="!isOpen">
            {{ __('Show Logs') }}
        </span>
        <span x-show="isOpen">
            {{ __('Hide Logs') }}
        </span>
    </div>
    <div class="space-y-4" x-cloak x-show="isOpen">
        @if($logs->isNotEmpty())
            <x-table>
                <x-slot:head>
                    <x-table.cell-head>
                        {{ __('Time') }}
                    </x-table.cell-head>
                    <x-table.cell-head>
                        {{ __('Old Status') }}
                    </x-table.cell-head>
                    <x-table.cell-head>
                        {{ __('New Status') }}
                    </x-table.cell-head>
                </x-slot:head>
                @foreach($logs as $log)
                    <x-table.row>
                        <x-table.cell>
                            {{ $log->created_at->format('Y-m-d H:i') }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $log->old_status }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $log->new_status }}
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table>
            {{ $logs->links() }}
            @else
            <p class="font-semibold">
                {{ __('There are currently no logs') }}
            </p>
        @endif
    </div>
</div>
