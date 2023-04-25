<div>
    <h2 class="text-2xl font-bold">{{ __('Students') }}</h2>
    <div class="space-y-6">
        <div x-data="{isOpen: false}">
            <div @click="isOpen = !isOpen"
                 class="cursor-pointer w-fit text-gray-900/70 underline hover:text-blue-500/70">
                <p x-cloak x-show="!isOpen">
                    {{ __('Add a new student') }}
                </p>
                <div x-cloak x-show="isOpen">
                    {{ __('Close') }}
                </div>
            </div>
            <x-form class="" wire:submit.prevent="addStudent" x-cloak x-show="isOpen">
                <h3 class="text-xl font-semibold">
                    {{ __('Add a new student') }}
                </h3>
                <div class="pl-4 space-y-4">
                    <x-form.input-cluster for="student" :label="__('Name')"
                                          wire:model.lazy="student"
                                          class="max-w-xl"
                                          :placeholder="__('Student Name')"></x-form.input-cluster>
                    <x-form.input-cluster for="start_date" :label="__('Start Date')"
                                          wire:model.lazy="start_date"
                                          :min="$this->getMinStartDate()"
                                          class="max-w-xl" type="date"></x-form.input-cluster>
                    <x-form.input-cluster for="end_date" :label="__('End Date')"
                                          wire:model.lazy="end_date"
                                          :max="$this->maxEndDate"
                                          :min="$this->getMinStartDate()"
                                          class="max-w-xl" type="date"></x-form.input-cluster>
                    <x-form.submit class="">{{ __('Add') }}</x-form.submit>
                </div>
            </x-form>
        </div>


        <x-table>
            <x-slot:head>
                <x-table.cell-head>
                    {{ __('Name') }}
                </x-table.cell-head>
                <x-table.cell-head>
                    {{ __('Start Date') }}
                </x-table.cell-head>
                <x-table.cell-head>
                    {{ __('End Date') }}
                </x-table.cell-head>
                <x-table.cell-head>
                    {{ __('Time Till Start') }}
                </x-table.cell-head>
                <x-table.cell-head>
                    {{ __('Time Left') }}
                </x-table.cell-head>
                <x-table.cell-head class="text-center">
                    {{ __('Action') }}
                </x-table.cell-head>
            </x-slot:head>
            @foreach($assigneds as $assigned)
                <x-table.row>
                    <x-table.cell>
                        {{ $assigned->student }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $assigned->formatDate($assigned->start_date) }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $assigned->formatDate($assigned->end_date) }}
                    </x-table.cell>
                    <x-table.cell>
                        @if($assigned->start_date->gt(\Carbon\Carbon::now()))
                            {{ $assigned->start_date->diffForHumans() }}
                        @elseif($assigned->end_date->gt(\Carbon\Carbon::now()))
                            {{ __('Started') }}
                        @else
                            {{ __('Ended') }}
                        @endif
                    </x-table.cell>
                    <x-table.cell>
                        @if($assigned->end_date->isFuture() && \Carbon\Carbon::now()->gt($assigned->start_date))
                            {{ $assigned->end_date->diffForHumans() }}
                        @elseif($assigned->start_date->gt(\Carbon\Carbon::now()))
                            {{ __('Not started yet.') }}
                        @else
                            {{ __('Ended') }}
                        @endif
                    </x-table.cell>
                    <x-table.cell>
                        @can('deleteStudent', $assignment)
                            <x-icon.trash wire:click="deleteStudent({{ $assigned }})"
                                          class="mx-auto text-red-600 group-hover:text-white"></x-icon.trash>
                        @endcan
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-table>
        {{ $assigneds->links() }}
    </div>
</div>
