{{--   
  Title: VV - Site Instructions
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: editor-ol
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}

@php($steps = ['Navigate to the "Our Values And Virtues" page', 'Select one of the Virtues.', 'Select a Grade Level', 'Choose any Story you want, then Click on "Read Story"', 'Listen to or Read the Story', 'Click on "Companion Content" if you would like to access our Discussion Questions', 'Click on "Begin Activities" to find the Activities that correspond to each Story or Virtue'])
@php($steps = get_field('steps'))
<section class="py-20 ">
    <div class="container max-w-[900px]">
        <h2 class="text-center mb-2">How to use this site</h2>
        {{-- <p class="lg:text-xl text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p> --}}
        @if($steps && count($steps) > 0)
        <ul class="max-w-xl mx-auto space-y-2 mt-8">
            @php($idx = 0)
            @foreach ($steps as $step)
            <li data-aos="fade-up" data-aos-delay="{!! $idx * 25 !!}" class="rounded-[10px] bg-blue-grey p-2 flex space-x-4 items-center">
                <div class="bg-white rounded-[10px] p-4 flex items-center justify-center">
                    <div class="text-blue-main font-bold text-2xl">{!! $idx > 8 ? null : 0!!}{!! $idx + 1 !!}</div>
                </div>
                <div class="py-2 pr-8">
                    <h4 >{!! $step['step'] !!}</h4>
                </div>
            </li>
            @php($idx++)
            @endforeach
        </ul>
        @endif
        {{-- <ul class=" mt-8 lg:mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
            @php($idx = 0)
            @foreach ($steps as $step)
                <li class="site-step flex space-x-2 md:flex-col md:space-x-0 transition duration-300 lg:col-span-2 rounded-[15px] md:border items-start  mb-4 md:mb-0 md:p-4 ">
                    <div
                        class="inline-flex mb-2 leading-none h-auto  p-2 text-center bg-blue-dark rounded-lg text-sm text-white">
                        0{!! $idx + 1 !!}
                    </div>
                    <p class="">{!! $step !!}</p>
                </li>
                @php($idx++)
            @endforeach
        </ul> --}}
    </div>
</section>
<style>
    .site-step.active {
        transform: translateY(-8px);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const siteSteps = document.querySelectorAll('.site-step');
        let currentIndex = 0;

        function nextStep() {
            if(window.innerWidth < 767) return;
        // Remove the active class from all elements
        siteSteps.forEach(element => element.classList.remove('active'));

        // Add the active class to the current element
        siteSteps[currentIndex].classList.add('active');

        // Move to the next element, looping back to the start if necessary
        currentIndex = (currentIndex + 1) % siteSteps.length;

        // Call the function again after 500ms
        setTimeout(nextStep, 2000);
        }
        nextStep()

        window.addEventListener('resize', () => {
            if(window.innerWidth < 767) {
                siteSteps.forEach(element => element.classList.remove('active'));
            } else {
                nextStep()
            }
        })
    });
</script>
