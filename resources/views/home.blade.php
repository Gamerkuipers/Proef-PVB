<x-guest-layout>
    <div class="min-h-screen relative flex items-center">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute h-full w-full bg-gray-900 bg-opacity-30 -z-0"></div>
            <img src="{{ asset('img/landing-image.jpeg') }}" alt="{{ __('Landing Image') }}"
                 class="object-cover h-full w-full -z-10">
        </div>
        <div class="grid lg:grid-cols-2 w-full h-full z-10 max-w-7xl mx-auto">
            <div class="flex justify-center">
                <div class="bg-white h-full w-2/3 shadow-md rounded-lg p-4 space-y-2">
                    <div class="font-semibold text-xl">
                        An Awesome message
                    </div>
                    <p class="text-sm h-36 overflow-hidden text-ellipsis">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ullamcorper vestibulum nisl.
                        Suspendisse fermentum gravida lacus, eget tristique lectus pharetra sed. Morbi ut malesuada
                        eros, ut euismod odio. Nullam imperdiet pretium enim at pellentesque. Phasellus et elit ut nisl
                        feugiat faucibus ut sit amet dui. Etiam nec metus eu metus dapibus ullamcorper. Pellentesque
                        euismod urna at purus cursus eleifend. Vivamus scelerisque maximus eros tempus finibus. Sed eget
                        dignissim lectus, sed sollicitudin diam. Aliquam erat volutpat. Sed tempor eget velit sed
                        iaculis. Curabitur vulputate euismod lobortis. Duis ut magna id erat ultrices tincidunt in in
                        arcu. Curabitur commodo lectus convallis, volutpat purus at, egestas ex.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- General Information --}}
    <div class="bg-primary text-white p-20 lg:px-20 px-6" id="generalInformation">
        <div class="max-w-7xl mx-auto">
            <div class="space-y-8">
                <h1 class="font-bold text-4xl">{{ __('General information') }}</h1>
                <p class="text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur gravida diam sit amet quam
                    sodales
                    lobortis. Vestibulum scelerisque viverra nisl. Maecenas elementum turpis pellentesque massa iaculis,
                    sit
                    amet euismod quam volutpat. Phasellus efficitur, dui eu efficitur auctor, tellus elit consequat
                    elit,
                    sed ultricies nisi massa ut velit. Mauris aliquam nisl et scelerisque lacinia. Aenean sit amet velit
                    eu
                    turpis congue ultrices sed nec nunc. Vestibulum ante ipsum primis in faucibus orci luctus et
                    ultrices
                    posuere cubilia curae; Maecenas sed lacus eu elit varius dapibus. Mauris quis est facilisis, mattis
                    justo eget,
                    sollicitudin tellus. Cras consequat aliquam ipsum eget porttitor. Integer vel elit bibendum, semper
                    lectus sed, dictum justo. Maecenas id sodales mi.

                    Cras elementum non eros vitae tincidunt. Vivamus risus odio, consequat vitae lectus non, pulvinar
                    gravida nibh. Aenean pretium at felis sit amet rutrum. Nunc convallis porta malesuada. Aliquam et
                    fringilla ante. Aenean ac consectetur dolor, ut dapibus lorem. Donec massa diam, posuere eget purus
                    ac,
                    lacinia
                    ultrices libero. Nam vel elit sit amet leo sollicitudin posuere. Vestibulum ut ligula egestas,
                    iaculis
                    metus in,
                    interdum erat. Suspendisse at sollicitudin ante. Sed justo ante, fringilla non lectus sed,
                    condimentum
                    eleifend arcu. Donec ut orci ante.
                </p>
                <p class="text-lg">
                    Duis porttitor elementum lectus dignissim tempor. Proin sodales, enim ac tincidunt tempor, arcu dui
                    placerat erat, in rutrum purus magna non neque. Integer quis sollicitudin risus, ac placerat quam.
                    Vivamus fringilla leo ac libero suscipit rhoncus. Curabitur tincidunt massa sed diam porta porta.
                    Maecenas
                    facilisis leo nec tellus convallis placerat. Phasellus risus urna, dignissim eu nisi nec, consequat
                    convallis nisi.
                    Pellentesque id venenatis est, vel egestas turpis. Mauris tincidunt ut dui a ultrices. Donec dictum
                    eget
                    arcu eu hendrerit. Nullam dictum egestas elementum. Duis aliquam a ligula vulputate suscipit. Fusce
                    et
                    mattis risus. Curabitur lorem ante, pretium quis lorem id, ultricies dapibus magna. Morbi ultrices
                    commodo urna vitae luctus. Pellentesque quis quam augue. Ut quis quam tempor, sodales risus a,
                    rutrum
                    erat. Aenean massa odio, varius quis turpis ac, volutpat blandit nisi. Aenean placerat bibendum nibh
                    sed
                    molestie. Aenean convallis sapien non arcu vehicula, ac ultrices tortor lobortis.
                </p>
            </div>
        </div>
    </div>

    {{-- Assignment --}}
    <div class="text-gray-900 p-20 lg:px-20 px-6" id="assignment">
        <div class="max-w-7xl mx-auto space-y-4">
            <h1 class="font-bold text-4xl">{{ __('Request assignment') }}</h1>
            <x-form>
                <div class="grid lg:grid-cols-2 lg:w-full gap-8">
                    <x-form.section>
                        <x-form.input-cluster for="companyName" :label="__('Company Name')"
                                              :placeholder="__('The name of the company')"/>
                        <x-form.textarea-cluster for="about" :label="__('About the company')"
                                                 :placeholder="__('Tell something about your company')"/>
                        <x-form.input-cluster for="email" :label="__('Email')" :placeholder="__('Email')"/>
                        <x-form.input-cluster for="phoneNumber" :label="__('Phone number')"
                                              :placeholder="__('Phone number')"/>
                        <x-form.file-cluster for="existingFiles" :label="__('Existing files')" type="file" multiple
                                             accept="image/jpeg, image/png, image/svg+xml"></x-form.file-cluster>
                    </x-form.section>
                    <x-form.section>
                        <x-form.input-cluster for="projectName" :label="__('Project name')"
                                              :placeholder="__('Target name')"/>
                        <x-form.input-cluster for="targetAudience" :label="__('Target audience')"
                                              :placeholder="__('Target audience')"/>
                        <x-form.textarea-cluster for="assignmentDescription" :label="__('Assignment description')"
                                                 :placeholder="__('A description about the assignment')"/>
                        <x-form.input-cluster type="date" for="deadLine" :label="__('Dead line')"
                                              min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></x-form.input-cluster>
                    </x-form.section>
                </div>
                <x-form.section class="flex justify-center col-span-2 pt-10">
                    <x-form.submit>{{ __('Send') }}</x-form.submit>
                </x-form.section>
            </x-form>
        </div>
    </div>
    <div class="w-full bg-primary p-6 text-white">
        <div class="py-10 px-20 gap-8">
            <div class="space-y-1" id="contact">
                <h3 class="text-4xl font-bold">{{ __('Contact') }}</h3>
                <x-contact :for="__('Email')">impressitaat@noorderpoort.nl</x-contact>
                <x-contact :for="__('Phone number')">06 123456789</x-contact>
                <x-contact :for="__('Location')">Groningen, Groningen Melkweg 2</x-contact>
            </div>
        </div>
    </div>
</x-guest-layout>
