<div class="space-y-6">
    <x-table>
        <x-slot:head>
            <x-table.cell-head>
                {{ __('Date') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Title') }}
            </x-table.cell-head>
            <x-table.cell-head>
                {{ __('Body') }}
            </x-table.cell-head>
            <x-table.cell-head class="text-center">
                {{ __('Action') }}
            </x-table.cell-head>
        </x-slot:head>
        @foreach($posts as $post)
            <x-table.row-link :href="route('dashboard.post.show', $post)"
                              class="table-row">
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
                <x-table.cell>
                    <div class="flex gap-x-2 justify-center items-center">
                        @can('update', $post)
                            <div class="p-1 hover:bg-white rounded hover:text-green-600" x-data
                                 @click.prevent="location = '{{ route('dashboard.post.edit', $post) }}'">
                                <x-icon.edit></x-icon.edit>
                            </div>
                        @endcan
                        @can('delete', $post)
                            <div wire:click.prevent="confirmDeletion({{ $post->id }})"
                                 class="p-1 hover:bg-white rounded hover:text-red-600">
                                <x-icon.trash></x-icon.trash>
                            </div>
                        @endcan
                    </div>
                </x-table.cell>
            </x-table.row-link>
        @endforeach
    </x-table>
    {{ $posts->links() }}

    <div>
        <h2 class="text-2xl font-bold">{{ __('Create Post') }}</h2>

        <x-form wire:submit.prevent="createPost">
            <div class="max-w-lg">
                <x-form.section>
                    <x-form.input-cluster for="title" :label="__('Title')" :placeholder="__('The title of a post')"
                                          wire:model.lazy="title"></x-form.input-cluster>
                    <x-form.textarea-cluster for="body" :label="__('Content')"
                                             :placeholder="__('The content of a post')"
                                             wire:model.lazy="body"></x-form.textarea-cluster>
                </x-form.section>
                <x-form.section class="flex justify-end pt-10">
                    <x-form.submit>{{ __('Send') }}</x-form.submit>
                </x-form.section>
            </div>
        </x-form>
    </div>
</div>
