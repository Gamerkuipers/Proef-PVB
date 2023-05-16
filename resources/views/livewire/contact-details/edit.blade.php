<div>
    <x-form class="max-w-7xl" wire:submit.prevent="save">
        <x-dashboard.action-group>
            <x-link-button-danger :href="route('dashboard.contactDetails.index')">
                {{ __('Cancel') }}
            </x-link-button-danger>
            <x-form.submit>
                {{ __('Save') }}
            </x-form.submit>
        </x-dashboard.action-group>

        <div class="space-y-6 divide-y-2 divide-gray-300 max-w-lg">
            @foreach($contactDetails as $index => $contact)
                <div class="space-y-2">
                    <x-dashboard.text-label class="xl:!text-2xl">{{ $contact->name }}</x-dashboard.text-label>
                    <div class="lg:pl-4 pl-2 space-y-2">
                        <x-form.input-cluster wire:model="contactDetails.{{ $index }}.name"
                                              for="contactDetails.{{ $index }}.name" :label="__('Title')"
                                              :placeholder="__('Name of contact detail')"/>

                        <x-form.input-cluster wire:model="contactDetails.{{ $index }}.content"
                                              for="contactDetails.{{ $index }}.content"
                                              :label="__('Content')"
                                              :placeholder="__('The general information')"/>
                    </div>
                </div>
            @endforeach
        </div>
    </x-form>
</div>
