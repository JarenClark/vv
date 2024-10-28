<section class="wrapper !bg-[#ffffff] ">
    <div class="container pt-20 xl:pt-28 lg:pt-28 md:pt-28 pb-16 xl:pb-20 lg:pb-20 md:pb-20">
        <div class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] mt-[-50px] items-center">
            <div
                class="md:w-8/12 lg:w-6/12 xl:w-5/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] max-w-full mt-[50px] xl:!order-2 lg:!order-2 !relative">
                {{-- <div class="shape !bg-[#edf2fc] !rounded-[50%] rellax !w-[10rem] !h-[10rem] absolute z-[1]"
                    data-rellax-speed="1" style="top: -2rem; right: -1.9rem;"></div> --}}
                <figure class="!rounded-[.4rem] z-[2] relative">
                    <img class="!rounded-[20px] " src="@asset('/images/image-1.jpg')"
                         alt="image">
                </figure>
            </div>
            <!--/column -->
            <div
                class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:px-[35px] lg:px-[20px] px-[15px] max-w-full mt-[50px]">
                <h2 class="text-[calc(1.305rem_+_0.66vw)] font-bold xl:text-[1.8rem] leading-[1.3] !mb-3">Who Are We?
                </h2>
                <p class="lead !text-[1.05rem] !leading-[1.6] font-medium">We are a digital and branding company that
                    believes in the power of creative strategy and along with great design.</p>
                <p class="!mb-6">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel
                    scelerisque nisl consectetur et.</p>
                <div class="flex flex-wrap mx-[-15px] xl:mx-[-25px] mt-[-30px]">
                    <div
                        class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] xl:px-[25px] px-[15px] max-w-full mt-[30px]">
                        <div class="flex flex-row">
                            <div>
                                @include('icons.target')
                            </div>
                            <div>
                                <h4 class="!mb-1">Our Mission</h4>
                                <p class="!mb-0">Dapibus eu leo quam ornare curabitur blandit tempus.</p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                    <div
                        class="xl:w-6/12 lg:w-6/12 md:w-6/12 w-full flex-[0_0_auto] xl:px-[25px] px-[15px] max-w-full mt-[30px]">
                        <div class="flex flex-row">
                            <div>
                                @include('icons.ribbon')
                            </div>
                            <div>
                                <h4 class="!mb-1">Our Values</h4>
                                <p class="!mb-0">Aenean lacinia bibendum nulla sed consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
