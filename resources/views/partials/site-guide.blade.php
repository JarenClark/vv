@php($steps = ['Navigate to the "Our Values And Virtues" page', 'Select one of the Virtues.', 'Select a Grade Level', 'Choose any Story you want, then Click on "Read Story"', 'Listen to or Read the Story', 'Click on "Companion Content" if you would like to access our Discussion Questions', 'Click on "Begin Activities" to find the Activities that correspond to each Story or Virtue'])
<section class="py-20 bg-gradient-to-br from-white via-blue-50 to-blue-50">
    <div class="container">
        <div class="flex w-full mb-8 justify-center">
           
                <h2 class="text-center">How to use this site</h2>
        </div>
        <div class="flex flex-col lg:flex-row lg:justify-between">
            <div class="w-full lg:w-2/3 pr-16 ">
                <div class=" overflow-hidden sticky right-0 top-32">
                    <img src="@asset('/images/image-1.jpg')"class="ml-auto" alt="">
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                {{-- <h2 class="mb-4">How to use this site</h2> --}}
                <ul class="flex  flex-col flex-wrap justify-center">
                    @php($idx = 0)
                    @foreach ($steps as $step)
                        <li
                            class="bg-white relative overflow-hidden p-4 px-8 flex space-x-2  mb-1 lg:mb-8 items-start">
                            <div
                                class=" leading-none text-xs rounded-full h-auto p-1 lg:p-2 lg:text-3xl text-blue-900 fill-none  ">
                                0{!! $idx + 1 !!}</div>
                            <p class="text-xl mt-2">{!! $step !!}</p>
                        </li>
                        @php($idx++)
                    @endforeach
                </ul>
                <x-button-link link="/virtues" class="bg-blue-dark text-white">Get Started</x-button-link>
            </div>

        </div>

    </div>
</section>
