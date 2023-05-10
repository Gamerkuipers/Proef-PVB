<div>
    <x-form wire:submit.prevent="save">
        <div class="flex justify-end gap-x-4">
            <x-link-button :href="route('dashboard.post.show', $post)" class="border-red-500 hover:border-gray-900 text-white bg-red-500">
                {{ __('Cancel') }}
            </x-link-button>
            <x-form.submit>
                {{ __('Save') }}
            </x-form.submit>
        </div>

        <div class="max-w-lg">
            <x-form.section>
                <x-form.section>
                    <x-form.input-cluster for="post.title" :label="__('Title')" :placeholder="__('The title of a post')"  wire:model.lazy="post.title"></x-form.input-cluster>
                    <x-form.textarea-cluster for="post.body" :label="__('Content')" :placeholder="__('The content of a post')" wire:model.lazy="post.body"></x-form.textarea-cluster>
                </x-form.section>
            </x-form.section>
        </div>
    </x-form>
</div>
