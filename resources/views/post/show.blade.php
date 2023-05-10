<x-app-layout>
    <x-slot:title>
        <div class="flex items-end justify-between">

            <div>
                {{ __('Post: :title', ['title' => $post->title]) }}
            </div>

            <a class="text-lg font-medium underline text-gray-900/60 cursor-pointer hover"
               href="{{ route('dashboard.post.index') }}">
                back
            </a>
        </div>
    </x-slot:title>

    <div class="flex justify-end">
        @can('update', $post)
            <x-link-button :href="route('dashboard.post.edit', $post)">
                {{ __('Edit') }}
            </x-link-button>
        @endcan
    </div>

    <x-dashboard.field>
        <x-dashboard.section>
            <x-dashboard.text-label>{{ __('Title') }}</x-dashboard.text-label>
            <x-dashboard.text>{{ $post->title }}</x-dashboard.text>
        </x-dashboard.section>
        <x-dashboard.section>
            <x-dashboard.text-label>{{ __('Content') }}</x-dashboard.text-label>
            <x-dashboard.text>{{ $post->body }}</x-dashboard.text>
        </x-dashboard.section>
    </x-dashboard.field>
</x-app-layout>
