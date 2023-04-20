<x-app-layout>
    <x-slot:title>
        {{ __('Assignments') }}
    </x-slot:title>
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
            <x-table.row x-data @click="location = '{{ route('assignment.show', $assignment) }}'">
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
                    {{ $assignment->phone_numbers }}
                </x-table.cell>
                <x-table.cell>
                    status
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table>
    {{ $assignments->links() }}
</x-app-layout>
