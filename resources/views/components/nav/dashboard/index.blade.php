<sidebar>

    <div {{ $attributes->class(['bg-primary/25 xl:p-8 p-2 xl:space-y-4 text-2xl h-full w-fit flex flex-col justify-between']) }}>
        <div>
            <h2 class="text-4xl font-semibold hidden xl:block">
                {{ __('Dashboard') }}
            </h2>
            <nav class="xl:space-y-4">
                <x-nav.dashboard.group>
                    <x-nav.dashboard.item route="dashboard.assignment.index">
                        <x-slot:icon>
                            <x-icon.assignments class="h-7 w-7"></x-icon.assignments>
                        </x-slot:icon>
                        {{ __('Assignments') }}
                    </x-nav.dashboard.item>
                    <x-nav.dashboard.item route="dashboard.post.index">
                        <x-slot:icon>
                            <x-icon.posts class="h-7 w-7"></x-icon.posts>
                        </x-slot:icon>
                        {{ __('Posts') }}
                    </x-nav.dashboard.item>
                </x-nav.dashboard.group>

                <x-nav.dashboard.group>
                    <x-nav.dashboard.head>
                        {{ __('Content') }}
                    </x-nav.dashboard.head>
                    <x-nav.dashboard.item route="dashboard.generalInformation.index">
                        <x-slot:icon>
                            <x-icon.general-information class="h-7 w-7"></x-icon.general-information>
                        </x-slot:icon>
                        {{ __('General information') }}
                    </x-nav.dashboard.item>
                    <x-nav.dashboard.item route="dashboard.contactDetails.index">
                        <x-slot:icon>
                            <x-icon.contact-details class="h-7 w-7"></x-icon.contact-details>
                        </x-slot:icon>
                        {{ __('Contact details') }}
                    </x-nav.dashboard.item>
                </x-nav.dashboard.group>
            </nav>
        </div>
        <div class="flex justify-between items-center">
            <x-link :href="route('home')" class="text-base">{{ __('Go to public page') }}</x-link>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="transition-transform duration-500 hover:translate-x-2">
                    <x-icon.log-out/>
                </button>
            </form>
        </div>
    </div>

</sidebar>

