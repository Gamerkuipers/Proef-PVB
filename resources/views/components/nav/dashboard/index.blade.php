<nav {{ $attributes->class('space-y-4') }}>
    <x-nav.dashboard.group>
        <x-nav.dashboard.item route="assignment.index">
            {{ __('Assignments') }}
        </x-nav.dashboard.item>
        <x-nav.dashboard.item>
            {{ __('Posts') }}
        </x-nav.dashboard.item>
    </x-nav.dashboard.group>

    <x-nav.dashboard.group>
        <x-nav.dashboard.head>
            {{ __('Content') }}
        </x-nav.dashboard.head>
        <x-nav.dashboard.item route="generalInformation.index">
            {{ __('General information') }}
        </x-nav.dashboard.item>
        <x-nav.dashboard.item route="contactDetails.index">
            {{ __('Contact details') }}
        </x-nav.dashboard.item>
    </x-nav.dashboard.group>
</nav>
