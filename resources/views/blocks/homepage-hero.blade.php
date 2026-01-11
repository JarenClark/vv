{{--   
  Title: VV - Homepage Hero
  Description: Homepage Hero with fields for heading, subheading, paragraph, button link, image, and list items
  Category: custom
  Icon: superhero
  Keywords: homepage hero banner
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}
@php($verbs = ['know', 'desire', 'choose'])
@php($stats = [['number' => 12, 'label' => 'Virtues'], ['number' => 196, 'label' => 'Stories'], ['number' => 30, 'label' => 'Activities']])


{{--
HERO

--}}
<section class="relative  lg:min-h-[90vh] overflow-hidden flex flex-col justify-end">
    <div class="absolute inset-0 bg-cover bg-center lg:bg-right"
        style="background-image: url(/wp-content/uploads/2024/08/output-onlinetools-1.png)">
    </div>
    <div class="absolute inset-0  bg-gradient-to-br from-blue-900 "></div>
    <div class="absolute inset-0  bg-blue-dark/40 block md:hidden"></div>
    <div class="container  pt-40 pb-24 lg:py-48 lg:pb-64 relative">
<div class="block md:hidden">
    <h1 class="text-white">Helping students <i>know</i> the good, <i>choose</i> the good, and <i>desire</i> the&nbsp;good.</h1>
</div>
        <div class="hidden md:block">
    <div class="h1 leading-normal text-white mb-0">Helping students
    </div>
    <div>
        <div class="inline-flex">
            <div id="hp-slider" class="bg-blue-main text-white h-fit">
                @php($idx = 0)
                @foreach ($verbs as $verb)
                    <div class="{!! $idx != 0 ? 'pre-tns-hidden' : null !!}">
                        <div
                            class="px-6 min-w-[256px] flex items-center text-center justify-center h1 mb-0 leading-normal text-white">
                            {!! $verb !!}
                        </div>
                    </div>
                    @php($idx++)
                @endforeach
            </div>
            <div class="h1 mb-0 leading-normal text-white">&nbsp;the good</div>
        </div>


    </div>
</div>
        <p class="text-xl max-w-sm text-white mt-6">Explore the world of character education with just a few clicks.</p>
        <div class="block mt-12">
            <x-button-link link="/virtue"
                classes="bg-transparent border border-white text-white hover:border-blue-900 hover:bg-blue-dark hover:text-white">Our
                Virtues</x-button-link>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        let sliderPromise = new Promise(function(sliderResolve) {
            const slider = tns({
                container: '#hp-slider',
                items: 1,
                autoplay: true,
                controls: false,
                nav: false,
                autoplayTimeout: 3000,
                autoplayButton: false,
                autoplayButtonOutput: false,
                axis: 'vertical',
                // mode: 'gallery'
            });
            sliderResolve(slider.getInfo().container);
        });

        sliderPromise.then(function(sliderContainer) {
            // .. code after the slider has been built up
            console.log('slider has initialized');
            document.querySelectorAll('#hp-slider .pre-tns-hidden').forEach(element => {
                element.classList.remove('pre-tns-hidden');
                console.log('removing pre tns hidden')
            });
        });



    });
</script>
<style>
    div:not(.tns-slider) .pre-tns-hidden {
        display: none;
    }

    .tns-slider .pre-tns-hidden {
        display: block !important;
    }
</style>



@php($stats = [['number' => 12, 'label' => 'Virtues'], ['number' => 196, 'label' => 'Stories'], ['number' => 30, 'label' => 'Activities']])


{{--
<section class="wrapper bg-soft-primary py-20 lg:pt-40">
    <div class="container ">
        <div class="flex flex-wrap -mx-4 mt-16 mb-32">
            <div class="w-full lg:w-1/2 px-4">
                <h1 class="fs-66 mb-0">
                    Explore the world of&nbsp;character education with just a few
                    clicks.
                </h1>
            </div>
            <div class="w-full lg:w-1/2 px-4">
                <p class="lead my-3">We believe in Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Praesentium provident odio inventore fugit nostrum corporis!</p>
                <a href="#" class="more hover">Learn More</a>
            </div>
        </div>
        <!-- /.row -->
        <div class="relative mt-12 h-[600px] rounded-xl overflow-hidden">
            <div class="absolute z-[-1] inset-0 bg-fixed bg-cover" style="background-image: url(@asset('/images/image-1.jpg'))">
            </div>
            <div class="absolute inset-0 bg-blue/25"></div>
        </div>
    </div>
    <!-- /.container -->
</section>


--}}
