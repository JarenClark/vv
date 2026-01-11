{{--   
  Title: VV - Virtue Listing Slider
  Description: Homepage Hero with fields for heading, subheading, paragraph, button link, image, and list items
  Category: custom
  Icon: grid-view
  Keywords: homepage hero banner
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}
@php($virtues = get_terms(['taxonomy' => 'virtue', 'hide_empty' => true]))



{{-- <section class="py-8 lg:py-20">
    @php($midpoint = ceil(count($virtues) / 2))
    @php($v1 = array_slice($virtues, 0, $midpoint))
    @php($v2 = array_slice($virtues, $midpoint))
    <h2 class="text-center">Our Values & Virtues</h2>
    <div id="v-sliders">
        @php($idx = 0)
        @foreach ([$v1, $v2] as $arr)
            <div class="marquee mb-4" style="transition-timing-function: linear;">
                @foreach ($arr as $virtue)
                    <?php
                    $args = [
                        'post_type' => 'story',
                        'tax_query' => [
                            [
                                'taxonomy' => 'virtue',
                                'field' => 'slug',
                                'terms' => $virtue->slug,
                            ],
                        ],
                    ];
                    $postTypes = new WP_Query($args);
                    $story_count = $postTypes->found_posts;
                    
                    ?>
                    @php($tagline = get_field('tagline', $virtue->taxonomy . '_' . $virtue->term_id))
                    <div class="px-4">
                        <a href="{!! get_term_link($virtue->term_id) !!}" class="group block rounded-[10px] p-4 text-center">
                            <h3 class="lg:text-3xl group-hover:text-blue-main">{!! $virtue->name !!}</h3>
                            <x-label>{!! $story_count !!} Stories</x-label>

                        </a>
                    </div>
                @endforeach
            </div>
            @php($idx++)
        @endforeach
    </div>

</section> --}}
<section>
    <div class="container lg:px-0 overflow-hidden bg-blue-dark text-white md:rounded-[40px]">
        <div class="flex flex-wrap lg:flex-nowrap">
            <div class="w-full lg:w-1/3 pt-20 pb-8 md:py-20 lg:py-32 lg:px-8 xl:pl-20">
                <h2 class="text-white mb-4">Our Values & Virtues</h2>
                <p class="text-blue-50">
                    Find easy-to-use, supportive resources that nurture your child's emotional, behavioral, and social well-being, helping them thrive in every aspect of their growth.
                </p>
                <div class="mt-8">
                    <x-button-link link="/virtues" classes="bg-white hover:bg-blue-dark text-blue-dark hover:text-white border border-white">All
                        Virtues</x-button-link>
                </div>
            </div>
            <div class="w-full lg:w-2/3  pt-8 py-20 lg:pt-32">
                {{-- <div style="max-width:{!! count($virtues) * 316 !!}px;" class="absolute top-20 overflow-hidden left-0 h-full"> --}}

                <div class="" id="virtue-slider">
                    @foreach ($virtues as $virtue)
                        {{-- @php($tagline = get_field('tagline', $virtue->taxonomy . '_' . $virtue->term_id)) --}}
                        <?php
                        $tagline = get_field('tagline', $virtue->taxonomy . '_' . $virtue->term_id);
                        $args = [
                            'post_type' => 'story',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'virtue',
                                    'field' => 'slug',
                                    'terms' => $virtue->slug,
                                ],
                            ],
                        ];
                        $postTypes = new WP_Query($args);
                        $story_count = $postTypes->found_posts;
                        ?>
                        <div class="">
                            <a href="{!! get_term_link($virtue->term_id) !!}"
                                class="transition duration-300 scale-100 hover:scale-105 rounded-lg pt-16 2xl:w-[300px] h-[300px] lg:h-[350px] bg-blue-main bg-opacity-75 hover:bg-opacity-100 group abcbg-blue-600 abchover:bg-blue-main mx-2 flex flex-col justify-between p-4 pb-8">
                                <div>
                                    <h3 class="text-white mb-0">{!! $virtue->name !!}</h3>
                                    <p class="text-grey-300 group-hover:text-white">{!! $tagline !!}</p>
                                </div>
                                <div class="text-grey-300 group-hover:text-white flex items-center space-x-2">

                                    <span class="transition duration-300">{!! $story_count !!} Stories</span>
                                    <span
                                        class="group-hover:translate-x-2 translate-x-0 transition-translate duration-300">
                                        @include('icons.arrow-right')
                                    </span>
                                </div>

                            </a>
                        </div>
                    @endforeach
                </div>
                <ul id="virtue-slider-nav" class="flex space-x-2 mt-8">
                    <li
                        class="rounded-full p-2 text-blue-main bg-white cursor-pointer hover:bg-blue-main hover:text-white transition duration-300">
                        @include('icons.arrow-left')
                    </li>
                    <li
                        class="rounded-full p-2 bg-white text-blue-main cursor-pointer hover:bg-blue-main hover:text-white transition duration-300">
                        @include('icons.arrow-right')
                    </li>
                </ul>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // const marquees = document.querySelectorAll('.marquee');
        // marquees.forEach((marquee, i) => {
        //     const m = tns({
        //         container: marquee,
        //         items: 2,
        //         loop: true,
        //         autoplay: true,
        //         autoplayHoverPause: true,
        //         autoplayButtonOutput: false,
        //         controls: false,
        //         nav: false,
        //         speed: 5000,
        //         autoplayDirection: (i % 2 == 0 ? 'forward' : 'backward'),
        //         autoplayTimeout: 0,
        //         preventActionWhenRunning: true,
        //         mouseDrag: true,
        //         easing: 'linear',
        //         responsive: {
        //             768: {
        //                 items: 4
        //             },
        //             1024: {
        //                 items: 5
        //             }
        //         }
        //     })
        //     document.addEventListener('resize', function() {
        //         console.log('resizing')
        //         m.destroy()
        //        m.rebuild()
        //     });
        // });
        let vSliderPromise = new Promise(function(sliderResolve) {
            const vSlider = tns({
                container: '#virtue-slider',
                controlsContainer: '#virtue-slider-nav',
                autoplay: true,
                autoplayHoverPause: true,
                // controls: false,
                nav: false,
                autoplayTimeout: 3000,
                autoplayButton: false,
                autoplayButtonOutput: false,
                gutter: 16,
                items: 1,
                responsive: {
                    768: {
                        items: 2
                    },
                    900: {
                        items: 2.2
                    },
                    1280: {
                        items: 3,
                    },
                    1536: {
                        items: 3.3
                    }
                }
                // axis: 'vertical',
                // mode: 'gallery'
            });
            sliderResolve(vSlider.getInfo().container);
        });

        vSliderPromise.then(function(sliderContainer) {
            // .. code after the slider has been built up
            console.log('slider has initialized');
            document.querySelectorAll('#virtue-slider .pre-tns-hidden').forEach(element => {
                element.classList.remove('pre-tns-hidden');
                console.log('removing pre tns hidden')
            });
        });



    });
</script>
