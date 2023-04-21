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
    <x-section.general-information></x-section.general-information>

    {{-- Assignment --}}
    <div class="text-gray-900 p-20 lg:px-20 px-6" id="assignment">
        <x-section.assignment-form></x-section.assignment-form>
    </div>


    {{-- Footer --}}
    <x-section.footer></x-section.footer>
</x-guest-layout>
