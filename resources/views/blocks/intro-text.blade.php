{{--   
  Title: VV - Homepage Intro Text
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: editor-textcolor
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}
@php($stats = [['number' => get_field('virtue_count') ? get_field('virtue_count') : 12, 'label' => 'Virtues', 'icon' => 'icons.apple', 'plus' => false], ['number' => get_field('story_count') ? get_field('story_count') : 250, 'label' => 'Stories', 'icon' => 'icons.book-open', 'plus' => true], ['number' => get_field('activity_count') ? get_field('activity_count') : 100, 'label' => 'Activities', 'icon' => 'icons.party-popper', 'plus' => true]])

<section class="rounded-t-[60px] bg-white w-full pt-20 pb-8 lg:pb-20  xl:pt-32 relative lg:-mt-20">

    <div class="container">
        @hasfield('label')
        <x-label>
            @field('label')
            </x-label>
        @endfield
        @hasfield('intro_text')
        <h2 class="text-center max-w-4xl mx-auto">
            @field('intro_text')
            </h2>
        @endfield


        <ul class="flex flex-col md:flex-row  justify-center  max-w-5xl mt-8 md:mt-16 mx-auto">
            @foreach ($stats as $stat)
                @php($ints = str_split($stat['number']))
                <li class="w-full md:w-1/2 lg:w-1/3 px-2 mb-8">
                    <div
                        class="border rounded-[20px] flex flex-col md:flex-row text-center md:text-left items-center md:items-start p-8 lg:p-4 shadow-lg">
                        {{-- <div>I</div> --}}
                        <div class="md:mr-2 mb-4">
                            <div
                                class="bg-blue-50 flex items-center justify-center text-blue-400 rounded-lg p-2 w-10 h-10">
                                @include($stat['icon'])</div>
                        </div>
                        <div>
                            <h5
                                class="inline-flex   mt-0 mb-2 ml-1 h-[48px] text-[48px] overflow-hidden  leading-none font-semibold tracking-tight  text-left ">
                                @foreach ($ints as $int)
                                    <span class="vertical-number-counter" data-to="{!! $int !!}">
                                        <ul class="transition duration-1000 translate-y-0">
                                            @for ($i = 0; $i < 10; $i++)
                                                <li class=" {!! $i == $int ? 'set-width' : 'make-narrow' !!} transition duration-100 text-right">
                                                    {!! $i !!}</li>
                                            @endfor
                                        </ul>
                                    </span>
                                @endforeach
                                @if ($stat['plus'])
                                    <span class="ml-2">+</span>
                                @endif
                            </h5>
                            <x-label>{{ $stat['label'] }}</x-label>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
        <div class="flex mt-8 justify-center">


            <x-button-link link="/login">
                Make a free account to access all stories and activities
            </x-button-link>
        </div>
    </div>

</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const narrowNums = document.querySelectorAll('.make-narrow');
            narrowNums.forEach(num => {
                num.style.overflow = 'hidden';
                num.style.width = '1px';
            });
        }, 1000);
        //make numbers without set-width 1 pixel wide 

    });
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        
        function getTextWidth(num) { 
     
     inputText = num; 
     font = "16px times new roman"; 
  
     canvas = document.createElement("canvas"); 
     context = canvas.getContext("2d"); 
     context.font = font; 
     width = context.measureText(inputText).width; 
     formattedWidth = Math.ceil(width) + "px"; 
  
     document.querySelector('.output').textContent 
                 = formattedWidth; 
 } 

    });
</script> --}}


{{-- <section class="">
    <div class="container py-20">
        <p class="text-5xl text-center max-w-5xl mx-auto">
            @field('intro_text')
        </p>
    </div>
</section> --}}


{{-- <div class="container mb-20">
    <div class="flex flex-wrap lg:flex-nowrap">
        <div class="w-full lg:w-1/2 lg:pr-20">
            <h3 class="text-3xl">
                @field('intro_text')</h3>
        </div>
        <div class="w-full lg:w-1/2">
            <ul class="grid grid-cols-2 gap-4">
                @foreach ($stats as $stat)
                @php($ints = str_split($stat['number']))
                <li>
                    <div class="border rounded-[20px] flex p-4 shadow-lg">

                        <div>
                            <h5
                                class="inline-flex font-space-grotesk mt-0 mb-2 ml-1 h-[48px] text-[48px] overflow-hidden  leading-none font-semibold tracking-tight leading-9 text-left ">
                                @foreach ($ints as $int)
                                    <span class="vertical-number-counter" data-to="{!! $int !!}">
                                        <ul class="transition duration-1000 translate-y-0">
                                            @for ($i = 0; $i < 10; $i++)
                                                <li class="text-right">{!! $i !!}</li>
                                            @endfor
                                        </ul>
                                    </span>
                                @endforeach
                            </h5>
                            <p class="text-lg ml-4 font-light">{{ $stat['label'] }}</p>
                        </div>
                    </div>

                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div> --}}
