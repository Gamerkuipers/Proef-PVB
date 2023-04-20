<div>
    <x-form class="max-w-7xl" wire:submit.prevent="save">
        <div class="flex justify-end gap-x-4">
            <x-link-button :href="route('generalInformation.index')" class="border-red-500 hover:border-gray-900 text-white bg-red-500">
                {{ __('Cancel') }}
            </x-link-button>
            <x-form.submit>
                {{ __('Save') }}
            </x-form.submit>
        </div>

        <x-form.input-cluster class="w-fit" wire:model="generalInformation.name"
                              for="title" :label="__('Title')"
                              :placeholder="__('Title above information')"/>

        <x-form.textarea-cluster wire:model="generalInformation.body" for="content" rows="15" :label="__('Content')"
                                 :placeholder="__('The general information')"/>
    </x-form>
</div>
