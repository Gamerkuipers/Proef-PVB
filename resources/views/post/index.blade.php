<x-app-layout>
    <x-slot:title>
        {{ __('Posts') }}
    </x-slot:title>

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
            <x-table.row>
                <x-table.cell class="w-fit">
                    {{ $post->created_at }}
                </x-table.cell>
                <x-table.cell class="w-fit">
                    {{ $post->title }}
                </x-table.cell>
                <x-table.cell class="truncate w-96">
                    {{ $post->body }}
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table>
    {{ $posts->links() }}
</x-app-layout>
