<x-app-layout>
    <x-slot:title>
        {{ __('Editing post: :title', ['title' => $post->title]) }}
    </x-slot:title>
    <livewire:post.edit :post="$post"/>
</x-app-layout>
