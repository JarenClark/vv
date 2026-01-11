@if(!get_field('hide_contact_section', get_the_ID()))
<section class="bg-blue-grey py-20">
    <div class="container max-w-[1200px]">
        <h2 class="text-center">Get in touch</h2>
        <div class="max-w-3xl mx-auto text-center mt-4">
            <p class="lg:text-[20px] ">
                Have questions or need a bit more support? We’re here to help! Your work is invaluable, and we’re ready to make your day just a little bit easier.
            </p>
        </div>
        <ul class="mt-8 flex  items-stretch divide-y md:divide-x rounded-lg shadow-md divide-[#e6eaef] flex-wrap lg:flex-nowrap">
            <li class="w-full md:w-1/2">
                <a href="/contact" class="h-full flex flex-col  p-4 lg:p-8 bg-white hover:bg-grey-50">
                    <span class="text-blue-main mb-4"  data-aos-delay="000">
                        @include('icons.send')
                    </span>
                    <h4 class="mt-2"  data-aos-delay="100">Fill out a form</h4>
                    <p  data-aos-delay="200">Send us your ideas! Your feedback helps us grow — share what inspires you about our content and what works best for you. </p>
                </a>
            </li>
            <li class="w-full md:w-1/2">
                <a href="mailto:info@valuesandvirtues.org"  class="h-full flex flex-col  p-4 lg:p-8 bg-white hover:bg-grey-50"> 
                    <span   data-aos-delay="100"
                        class="text-blue-main mb-4">
                        @include('icons.email')
                    </span>
                    <h4 class="mt-2"  data-aos-delay="200">Send us an email</h4>
                    <p  data-aos-delay="300">Send us your ideas! Your feedback helps us grow — share what inspires you about our content and what works best for you.
                    </p>
                </a>
            </li>
            {{-- <li class="w-full md:w-1/3">
                <a href="/donate" class="h-full flex flex-col  p-4 lg:p-8 bg-white hover:bg-grey-50"> 
                    <span   data-aos-delay="200"
                        class="text-blue-main mb-4">
                        @include('icons.gift')
                    </span>
                    <h4 class="mt-2"  data-aos-delay="300">Donate to our Cause</h4>
                    <p  data-aos-delay="400">Lorem ipsum dolor, sit amet consectetur elit. Neque commodi animi.</p>
                </a>
            </li> --}}
        </ul>
    </div>
</section>
@endif
