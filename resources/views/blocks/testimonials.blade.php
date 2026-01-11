{{--   
  Title: VV - Testimonials
  Description: Testimonials repeater with fields for text,name, and roles
  Category: custom
  Icon: format-quote
  Keywords: tesimonials quotes parents testimony testimonies
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
  SupportsMultiple: false
--}}
@hasfields('testimonials')
    <section>
        <div class="container bg-blue-grey lg:rounded-[30px] py-8 lg:py-32">
            @hasfield('heading')
            <div class="text-center">
                <x-label>Testimonials</x-label>
            </div>
            <h2 class="text-center">
                @field('heading')
                </h2>
            @endfield
            <div class="relative mx-auto max-w-2xl mt-8">
                <div id="testimonials" class="">
                    @php($idx = 0)
                    @fields('testimonials')

                        <div class=" ">
                            <div class="rounded-[10px] bg-white p-4 lg:p-8">


                                @hassub('text')
                                <h3 class="text-blue-dark">
                                    <span>"</span>
                                    @sub('text')
                                        <span>"</span>
                                    </h3>
                                @endsub
                                @hassub('name')
                                <p class="text-sm mt-4 text-blue-dark font-bold">
                                    @sub('name')
                                    </p>
                                @endsub
                                @hassub('role')
                                <p class="text-sm">
                                    @sub('role')
                                    </p>
                                @endsub
                            </div>
                        </div>
                        @php($idx++)
                    @endfields
                </div>
                <div id="testimonials-nav"
                    class="relative lg:absolute mt-8 lg:mt-0 lg:top-1/2 lg:-translate-y-1/2 lg:-left-16 lg:-right-16  flex justify-center lg:justify-between">
                    <button class="text-blue-dark hover:text-blue-main bg-white rounded-full p-4 mr-4 lg:mr-0">
                        @include('icons.arrow-left')
                    </button>
                    <button class="text-blue-dark hover:text-blue-main bg-white rounded-full p-4 ml-4 lg:ml-0">
                        @include('icons.arrow-right')
                    </button>

                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            let tSliderPromise = new Promise(function(tSliderResolve) {
                let tSlider = tns({
                    container: '#testimonials',
                    items: 1,
                    autoplay: true,
                    nav: false,
                    controls: true,
                    controlsContainer: '#testimonials-nav',
                    autoplayButton: false,
                    autoplayButtonOutput: false,
                    // loop: true,
                    // mouseDrag: true,
                });

                tSliderResolve(tSlider.getInfo().container);
            })

        })
    </script>
@endhasfields
{{-- 
I’m so grateful that I’ve consciously decided to emphasize character. Now, in the 2nd semester, we’re actually learning so much! My difficult classes are so positive now, and I’ve now only got 1 tough cookie instead of 6 or 7. All day I get to just be happy to be around them.
--}}
