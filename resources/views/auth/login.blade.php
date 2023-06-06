<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute h-full w-full bg-gray-900/30 -z-0"></div>
        <img src="{{ asset('img/landing-image.jpeg') }}" alt="{{ __('Landing Image') }}"
             class="object-cover h-full w-full -z-10">
    </div>

    <div class="min-h-screen w-full flex justify-center items-center z-100">
        <div class="max-w-xs mx-auto">
            <div class="bg-white/80 rounded-lg backdrop-blur-sm p-10 space-y-6 w-full">
                <x-application-logo class="h-16" />
                <x-form class="flex flex-col items-center gap-y-3" :action="route('login')">
                    <!-- Email -->
                    <x-form.input-cluster
                        for="email"
                        :placeholder="__('Fill in your email')"
                    ></x-form.input-cluster>
                    <!-- Password -->
                    <x-form.input-cluster
                        type="password"
                        for="password"
                        :placeholder="__('Fill in your password')"
                    ></x-form.input-cluster>

                    <!-- Remember Me -->
                    <div class="block mt-4 self-start">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 p-2"
                                   name="remember">
                            <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <x-form.submit class="hover:border-primary w-fit hover:bg-primary hover:text-white">
                        {{ __('Login') }}
                    </x-form.submit>
                </x-form>
            </div>
        </div>
    </div>
</x-guest-layout>
