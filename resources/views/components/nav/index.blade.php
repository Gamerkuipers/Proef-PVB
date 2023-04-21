<div>
    {{-- Lg screen --}}
    <nav class="fixed top-0 bg-white/50 w-full h-20 z-50 px-10 xl:flex justify-between backdrop-blur-sm hidden">
        <div>
            <x-application-logo class="h-full py-2"/>
        </div>
        <div class="flex gap-x-2 items-center">
            <x-nav.item href="{{ route('home') }}#generalInformation">{{ __('Information') }}</x-nav.item>
            <x-nav.item href="{{ route('home') }}#contact">{{ __('Contact') }}</x-nav.item>
            <x-nav.item href="{{ route('home') }}#assignment">{{ __('Assignment') }}</x-nav.item>
            @auth
                <x-nav.item :href="route('dashboard')">{{ __('Dashboard') }}</x-nav.item>
            @else
                <x-nav.item :href="route('login')">{{ __('Login') }}</x-nav.item>
            @endauth
        </div>
    </nav>

    {{-- Mobile --}}
    <div class="fixed top-0 flex xl:hidden w-full h-20 bg-white/50 backdrop-blur-sm z-10" x-data="{open: false}">
        <div class="p-2">
            <x-application-logo class="h-full py-2"/>
        </div>
        <div class="w-full flex justify-end px-10 my-auto group z-20">
            <x-icon.menu x-cloack x-show="!open"
                         class="transition ease-in-out duration-500 group-hover:scale-125 cursor-pointer"
                         @click="open = true"/>
            <x-icon.cancel x-cloak x-show="open"
                           class="transition ease-in-out duration-500 group-hover:scale-125 cursor-pointer"
                           @click="open = false"/>
        </div>
        <nav class="bg-white h-fit w-full fixed top-0 divide-y-2 divide-y-gray-900 grid" x-cloak x-show="open" @click.outside="open = false">
            <div class="h-20 p-2">
                <x-application-logo class="h-full py-2"/>
            </div>
            <x-nav.item-responsive href="{{ route('home') }}#generalInformation">{{ __('Information') }}</x-nav.item-responsive>
            <x-nav.item-responsive href="{{ route('home') }}#contact">{{ __('Contact') }}</x-nav.item-responsive>
            <x-nav.item-responsive href="{{ route('home') }}#assignment">{{ __('Assignment') }}</x-nav.item-responsive>
            @auth
                <x-nav.item-responsive :href="route('dashboard')">{{ __('Dashboard') }}</x-nav.item-responsive>
            @else
                <x-nav.item-responsive :href="route('login')">{{ __('Login') }}</x-nav.item-responsive>
            @endauth
        </nav>
    </div>
</div>
