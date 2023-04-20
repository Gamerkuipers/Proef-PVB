<div>
    <x-form class="max-w-7xl" wire:submit.prevent="save">
        <x-dashboard.action-group>
            <x-link-button-danger :href="route('contactDetails.index')">
                {{ __('Cancel') }}
            </x-link-button-danger>
            <x-form.submit>
                {{ __('Save') }}
            </x-form.submit>
        </x-dashboard.action-group>

        <div class="space-y-6 divide-y-2 max-w-lg">
            @foreach($contactDetails as $index => $contact)
                <div class="space-y-2">
                    <x-dashboard.text-label class="!text-2xl">{{ $contact->name }}</x-dashboard.text-label>
                    <div class="pl-4 space-y-2">
                        <x-form.input-cluster wire:model="contactDetails.{{ $index }}.name"
                                              for="contact-{{ $index }}-name" :label="__('Title')"
                                              :placeholder="__('Name of contact detail')"/>

                        <x-form.input-cluster wire:model="contactDetails.{{ $index }}.content"
                                              for="contact-{{ $index }}-content"
                                              :label="__('Content')"
                                              :placeholder="__('The general information')"/>
                    </div>
                </div>
            @endforeach

        </div>
    </x-form>
</div>
