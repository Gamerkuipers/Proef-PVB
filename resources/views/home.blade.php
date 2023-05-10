<x-guest-layout>
    <div class="min-h-screen relative flex items-center">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute h-full w-full bg-gray-900 bg-opacity-30 -z-0"></div>
            <img src="{{ asset('img/landing-image.jpeg') }}" alt="{{ __('Landing Image') }}"
                 class="object-cover h-full w-full -z-10">
        </div>
        @isset($post)
            <div class="grid lg:grid-cols-2 w-full h-full z-10 max-w-7xl mx-auto">
                <div class="flex justify-center">
                    <div class="bg-white h-full w-2/3 shadow-md rounded-lg p-4 space-y-2">
                        <div class="font-semibold text-xl">
                            {{ $post->title }}
                        </div>
                        <p class="text-sm max-h-36 overflow-hidden text-ellipsis">{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        @endisset
    </div>

    {{-- General Information --}}
    <x-section.general-information></x-section.general-information>

    {{-- Assignment --}}
    <div class="text-gray-900 p-20 lg:px-20 px-6" id="assignment">
        <x-section.assignment-form></x-section.assignment-form>
    </div>


    {{-- Footer --}}
    <x-section.footer></x-section.footer>
</x-guest-layout>
