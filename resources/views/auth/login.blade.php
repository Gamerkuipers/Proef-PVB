<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute h-full w-full bg-gray-900/30 -z-0"></div>
        <img src="{{ asset('img/landing-image.jpeg') }}" alt="{{ __('Landing Image') }}"
             class="object-cover h-full w-full -z-10">
    </div>

    <div class="min-h-screen w-full flex justify-center items-center z-100">
        <div class="max-w-7xl mx-auto">
            <div class="bg-primary/50 rounded-lg backdrop-blur-sm p-10 space-y-6">
                <x-application-logo class="h-16" />
                <x-form class="text-white flex flex-col items-center gap-y-3 w-full" :action="route('login')">
                    <!-- Email -->
                    <x-form.input-cluster
                        for="email"
                        :placeholder="__('Fill in your email')"
                        class="border-b-white placeholder:text-white/50 text-white"
                    ></x-form.input-cluster>
                    <!-- Password -->
                    <x-form.input-cluster
                        type="password"
                        for="password"
                        :placeholder="__('Fill in your password')"
                        class="border-b-white placeholder:text-white/50 text-white"
                    ></x-form.input-cluster>

                    <!-- Remember Me -->
                    <div class="block mt-4 self-start">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 p-2"
                                   name="remember">
                            <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <x-form.submit class="border-white w-fit hover:bg-white hover:!text-gray-900">
                        {{ __('Login') }}
                    </x-form.submit>
                </x-form>
            </div>
        </div>
    </div>

    {{--        <!-- Email Address -->--}}
    {{--        <div>--}}
    {{--            <x-input-label for="email" :value="__('Email')" />--}}
    {{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
    {{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Password -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="password" :value="__('Password')" />--}}

    {{--            <x-text-input id="password" class="block mt-1 w-full"--}}
    {{--                            type="password"--}}
    {{--                            name="password"--}}
    {{--                             />--}}

    {{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Remember Me -->--}}
    {{--        <div class="block mt-4">--}}
    {{--            <label for="remember_me" class="inline-flex items-center">--}}
    {{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
    {{--                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
    {{--            </label>--}}
    {{--        </div>--}}

    {{--        <div class="flex items-center justify-end mt-4">--}}
    {{--            <x-primary-button class="ml-3">--}}
    {{--                {{ __('Log in') }}--}}
    {{--            </x-primary-button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
</x-guest-layout>
