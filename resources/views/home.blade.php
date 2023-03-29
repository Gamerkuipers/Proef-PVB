<x-guest-layout>
    <div class="min-h-screen relative flex items-center">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute h-full w-full bg-gray-900 bg-opacity-30 z-10"></div>
            <img src="/img/landing-image.jpeg" alt="{{ __('Landing Image') }}"
                 class="object-cover h-full w-full z-0">
        </div>
        <div class="grid grid-cols-2 w-full h-full z-10">
            <div class="flex justify-center">
                <div class="bg-white h-56 w-96 shadow-md rounded-lg p-4 space-y-2">
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
            <div>

            </div>
        </div>
    </div>
    {{-- General Information --}}
    <div class="min-h-screen max-w-4xl mx-auto flex justify-center p-4 space-y-8 pt-10">
        <div>
            <h1 class="font-bold text-4xl">{{ __('General information') }}</h1>
            <p class="whitespace-pre-line">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur gravida diam sit amet quam sodales
                lobortis. Vestibulum scelerisque viverra nisl. Maecenas elementum turpis pellentesque massa iaculis, sit
                amet euismod quam volutpat. Phasellus efficitur, dui eu efficitur auctor, tellus elit consequat elit,
                sed ultricies nisi massa ut velit. Mauris aliquam nisl et scelerisque lacinia. Aenean sit amet velit eu
                turpis congue ultrices sed nec nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                posuere
                cubilia curae; Maecenas sed lacus eu elit varius dapibus. Mauris quis est facilisis, mattis justo eget,
                sollicitudin tellus. Cras consequat aliquam ipsum eget porttitor. Integer vel elit bibendum, semper
                lectus sed, dictum justo. Maecenas id sodales mi.

                Cras elementum non eros vitae tincidunt. Vivamus risus odio, consequat vitae lectus non, pulvinar
                gravida nibh. Aenean pretium at felis sit amet rutrum. Nunc convallis porta malesuada. Aliquam et
                fringilla
                ante. Aenean ac consectetur dolor, ut dapibus lorem. Donec massa diam, posuere eget purus ac, lacinia
                ultrices
                libero. Nam vel elit sit amet leo sollicitudin posuere. Vestibulum ut ligula egestas, iaculis metus in,
                interdum erat. Suspendisse at sollicitudin ante. Sed justo ante, fringilla non lectus sed, condimentum
                eleifend arcu. Donec ut orci ante.


                Duis porttitor elementum lectus dignissim tempor. Proin sodales, enim ac tincidunt tempor, arcu dui
                placerat erat, in rutrum purus magna non neque. Integer quis sollicitudin risus, ac placerat quam.
                Vivamus
                fringilla leo ac libero suscipit rhoncus. Curabitur tincidunt massa sed diam porta porta. Maecenas
                facilisis leo
                nec tellus convallis placerat. Phasellus risus urna, dignissim eu nisi nec, consequat convallis nisi.
                Pellentesque id venenatis est, vel egestas turpis. Mauris tincidunt ut dui a ultrices. Donec dictum eget
                arcu eu hendrerit. Nullam dictum egestas elementum. Duis aliquam a ligula vulputate suscipit. Fusce et
                mattis risus. Curabitur lorem ante, pretium quis lorem id, ultricies dapibus magna. Morbi ultrices
                commodo urna vitae luctus. Pellentesque quis quam augue. Ut quis quam tempor, sodales risus a, rutrum
                erat.
                Aenean massa odio, varius quis turpis ac, volutpat blandit nisi. Aenean placerat bibendum nibh sed
                molestie.
                Aenean convallis sapien non arcu vehicula, ac ultrices tortor lobortis.
            </p>
        </div>
    </div>
    {{-- Assignment --}}
    <div class="min-h-screen bg-primary text-white pt-10">
        <div class="max-w-7xl mx-auto space-y-4">
            <h1 class="font-bold text-4xl">{{ __('Request assignment') }}</h1>
            <form action="#">
                @csrf
                <div class="flex flex-col gap-y-2">
                    <label for="">{{ __('Name') }}</label>
                    <input type="text" placeholder="Name" class="border-0 border-b-2 border-b-white bg-transparent text-white placeholder:text-white">
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
