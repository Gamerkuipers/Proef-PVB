<nav class="fixed top-0 bg-white/50 w-full h-20 z-50 px-10 flex justify-between backdrop-blur-sm">
    <div>
        <x-application-logo class="h-full py-2"/>
    </div>
    <div class="flex gap-x-2 items-center">
        <x-nav.item active="true" href="{{ route('home') }}#generalInformation">{{ __('Information') }}</x-nav.item>
        <x-nav.item href="{{ route('home') }}#contact">{{ __('Contact') }}</x-nav.item>
        <x-nav.item href="{{ route('home') }}#assignment">{{ __('Assignment') }}</x-nav.item>
        @auth
            <x-nav.item :href="route('dashboard')">{{ __('Dashboard') }}</x-nav.item>
        @else
            <x-nav.item :href="route('login')">{{ __('Login') }}</x-nav.item>
        @endauth
    </div>
</nav>
