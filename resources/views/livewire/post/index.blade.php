<div class="space-y-6">
    <x-table>
        <x-slot:head>
            <x-table.cell-head>
                {{ __('date') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Title') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('body') }}
            </x-table.cell-head>
        </x-slot:head>
        @foreach($posts as $post)
            <x-table.row x-data @click="location = '{{ route('dashboard.post.show', $post) }}'">
                <x-table.cell>
                    {{ $post->created_at->format('Y-m-d - h:m') }}
                </x-table.cell>
                <x-table.cell>
                    {{ $post->title }}
                </x-table.cell>
                <x-table.cell>
                    <p class="truncate w-10 sm:w-32 md:w-96">
                        {{ $post->body }}
                    </p>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table>
    {{ $posts->links() }}

    <div>
        <h2 class="text-2xl font-bold">Create Post</h2>

        <x-form wire:submit.prevent="createPost">
            <div class="max-w-lg">
                <x-form.section>
                    <x-form.input-cluster for="title" :label="__('Title')" :placeholder="__('The title of a post')"  wire:model.lazy="title"></x-form.input-cluster>
                    <x-form.textarea-cluster for="body" :label="__('Content')" :placeholder="__('The content of a post')" wire:model.lazy="body"></x-form.textarea-cluster>
                </x-form.section>
                <x-form.section class="flex justify-end pt-10">
                    <x-form.submit>{{ __('Send') }}</x-form.submit>
                </x-form.section>
            </div>
        </x-form>
    </div>
</div>
