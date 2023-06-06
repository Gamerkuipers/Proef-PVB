<x-app-layout>
    <x-slot:title>
        {{ __('Contact Details') }}
    </x-slot:title>

    <x-dashboard.action-group>
        @can('update', \App\Models\ContactDetails::class)
            <x-link-button :href="route('dashboard.contactDetails.edit')">
                {{ __('Edit') }}
            </x-link-button>
        @endcan
    </x-dashboard.action-group>

    <x-dashboard.field>
        @foreach($contactDetails as $contact)
        <x-dashboard.section>
            <x-dashboard.text-label class="break-words">{{ $contact->name  }}:</x-dashboard.text-label>
            <x-dashboard.text>{{ $contact->content }}</x-dashboard.text>
        </x-dashboard.section>
        @endforeach
    </x-dashboard.field>
</x-app-layout>
