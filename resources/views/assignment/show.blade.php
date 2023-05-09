<x-app-layout>
    <x-slot:title>
        <div class="flex items-end justify-between">

            <div>
                {{ __('Assignment: :name', ['name' => $assignment->name]) }}
            </div>

            <a class="text-lg font-medium underline text-gray-900/60 cursor-pointer hover"
               href="{{ route('assignment.index') }}">
                back
            </a>
        </div>
    </x-slot:title>

    <div class="grid lg:grid-cols-8 gap-8">
        <x-dashboard.field class="col-span-3">
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Project Name') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->name }}</x-dashboard.text>
            </x-dashboard.section>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Target Audience') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->target_audience }}</x-dashboard.text>
            </x-dashboard.section>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Deadline') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->deadline->format('Y-m-d') }}</x-dashboard.text>
            </x-dashboard.section>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Description') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->description }}</x-dashboard.text>
            </x-dashboard.section>
        </x-dashboard.field>
        <x-dashboard.field class="col-span-3">
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Company Name') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->company_name }}</x-dashboard.text>
            </x-dashboard.section>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Email') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->email }}</x-dashboard.text>
            </x-dashboard.section>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Phone number') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->getPhoneNumbersString() }}</x-dashboard.text>
            </x-dashboard.section>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('About the company') }}</x-dashboard.text-label>
                <x-dashboard.text>{{ $assignment->company_description }}</x-dashboard.text>
            </x-dashboard.section>
        </x-dashboard.field>
        <x-dashboard.field>
            <x-dashboard.section>
                <x-dashboard.text-label>{{ __('Status') }}</x-dashboard.text-label>
                <livewire:assignment.status :assignment="$assignment"/>
            </x-dashboard.section>
        </x-dashboard.field>
    </div>
    <livewire:assignment.students :assignment="$assignment"></livewire:assignment.students>
    <livewire:assignment.logs :assignment="$assignment"></livewire:assignment.logs>
</x-app-layout>
