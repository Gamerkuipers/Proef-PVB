<x-app-layout>
    <x-slot:title>
        {{ __('Assignments') }}
    </x-slot:title>

    @if($assignments->isNotEmpty())
    <x-table>
        <x-slot:head>
            <x-table.cell-head>
                {{ __('Project Name') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Deadline') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Email') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Phone Number') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Status') }}
            </x-table.cell-head>
        </x-slot:head>
        {{-- temporary --}}
        @foreach($assignments as $assignment)
            <x-table.row x-data @click="location = '{{ route('dashboard.assignment.show', $assignment) }}'">
                <x-table.cell>
                    {{ $assignment->name }}
                </x-table.cell>
                <x-table.cell>
                    {{ $assignment->deadline->diffForHumans() }}
                </x-table.cell>
                <x-table.cell>
                    {{ $assignment->email }}
                </x-table.cell>
                <x-table.cell>
                    {{ $assignment->phone_numbers->first() }}
                    @if($assignment->phone_numbers->count() > 1)
                        <span class="text-sm text-blue-500 underline">
                            +{{ $assignment->phone_numbers->count()-1 }}
                        </span>
                    @endif
                </x-table.cell>
                <x-table.cell>
                    {{ $assignment->status }}
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table>
    {{ $assignments->links() }}
    @else
        <p class="text-lg">{{ __('There are no assignments') }}</p>
    @endif
</x-app-layout>
