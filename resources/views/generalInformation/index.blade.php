<x-app-layout>
    <x-slot:title>
        {{ __('General Information') }}
    </x-slot:title>

    <div class="flex justify-end">
        @can('update', \App\Models\WebContent::class)
            <x-link-button :href="route('dashboard.generalInformation.edit')">
                {{ __('Edit') }}
            </x-link-button>
        @endcan
    </div>

    <x-dashboard.field>
        <x-dashboard.section>
            <x-dashboard.text-label>{{ __('Title') }}:</x-dashboard.text-label>
            <x-dashboard.text>
                {{ $generalInformation->name }}
            </x-dashboard.text>
        </x-dashboard.section>
        <x-dashboard.section>
            <x-dashboard.text-label>{{ __('Content') }}:</x-dashboard.text-label>
            <x-dashboard.text class="whitespace-pre-wrap">{{ $generalInformation->body }}</x-dashboard.text>
        </x-dashboard.section>
    </x-dashboard.field>
</x-app-layout>
