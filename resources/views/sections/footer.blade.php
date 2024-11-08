@if (is_page() && !is_page('contact'))
    @include('sections.pre-footer')
@endif
<footer class="pdfcrowd-remove  bg-white relative">
    {{-- <div class="absolute inset-0 bg-repeat pointer-events-none" style="background: url(@asset('/images/bg-lines.svg'))">

    </div> --}}
    {{-- <div class="container  -translate-y-1/2 bg-yellow p-8 border-md rounded-md">
        <div class="flex justify-between items-center">
            <h3 class="text-blue-900 font-medium">Have any ideas for how we can do?</h3>
            <x-button-link classes="bg-blue-dark text-yellow " link="/contact" class="ml-4">Contact Us</x-button-link>
        </div>
    </div> --}}
    <div class="container border-t border-blue-grey py-16 xl:!py-20 lg:!py-20 md:!py-20">
        <div class="flex flex-wrap mx-[-15px] mt-[-30px] xl:mt-0 lg:mt-0">
            <div
                class="md:w-4/12 xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:mt-0 lg:mt-0 mt-[30px]">
                <div class="widget old-text-[#cacaca]">
                    @include('icons.logo')
                    <p class="!mb-4 mt-2 hidden lg:block">© {!! get_the_date('Y') !!} Values & Virtues. <br
                            class="hidden xl:block lg:block old-text-[#cacaca]">All rights reserved.</p>
                    
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div
                class="md:w-4/12 xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:mt-0 lg:mt-0 mt-[30px]">
                <div class="widget old-text-[#cacaca]">
                    <h4 class="widget-title old-text-white !mb-3 text-[.95rem] !leading-[1.45]">Membership</h4>
                    <ul>
                        @if (is_user_logged_in())
                            <li>
                                <a href="/membership-account">
                                    Overview</a>
                            </li>
                            <li>
                                <a href="/membership-account/your-profile/">
                                    Your Profile</a>
                            </li>
                            <li>
                                <a href="/membership-account/membership-orders/">
                                    Orders</a>
                            </li>
                        @else
                            <li>
                                <a href="/login">
                                    Login</a>
                            </li>
                            <li>
                                <a href="/membership-levels">
                                    Join Today
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div
                class="md:w-4/12 xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:mt-0 lg:mt-0 mt-[30px]">
                <div class="widget old-text-[#cacaca]">
                    <h4 class="widget-title old-text-white !mb-3 text-[.95rem] !leading-[1.45]">Learn More</h4>
                    <ul class="pl-0 list-none   !mb-0">
                        <li>
                            <a class="old-text-[#cacaca] hover:text-[#3f78e0]" href="/about-us">About Us</a>
                        </li>
                        <li class="mt-[0.35rem]">
                            <a class="old-text-[#cacaca] hover:text-[#3f78e0]" href="/virtues">
                                Our Values & Virtues</a>
                        </li>
                        <li class="mt-[0.35rem]">
                            <a class="old-text-[#cacaca] hover:text-[#3f78e0]" href="/support-us">Support
                                Us</a>
                        </li>
                        <li class="mt-[0.35rem]">
                            <a class="old-text-[#cacaca] hover:text-[#3f78e0]"
                                href="/contact">Contact
                                Us</a>
                            </li>
                        {{-- <li class="mt-[0.35rem]"><a class="old-text-[#cacaca] hover:text-[#3f78e0]" href="#">Terms
                                of
                                Use</a></li>
                        <li class="mt-[0.35rem]"><a class="old-text-[#cacaca] hover:text-[#3f78e0]"
                                href="#">Privacy
                                Policy</a></li> --}}
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div
                class="md:w-full xl:w-3/12 lg:w-3/12 w-full flex-[0_0_auto] px-[15px] max-w-full xl:mt-0 lg:mt-0 mt-[30px]">
                <div class="widget old-text-[#cacaca]">
                    <h4 class="widget-title old-text-white !mb-3 text-[.95rem] !leading-[1.45]">Our Newsletter</h4>
                    <p class="!mb-5">Subscribe to receive news and updates straight to your inbox</p>
                    <div class="newsletter-wrapper">
                        <!-- Begin  Signup Form -->
                        @shortcode('[gravityform id="2" title="false" description="false" ajax="true"]')
                        {{-- <div id="mc_embed_signup2">
                            <form
                                action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a"
                                method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form"
                                class="validate dark-fields" target="_blank" novalidate="">
                                <div id="mc_embed_signup_scroll2">
                                    <div
                                        class="!text-left input-group form-floating !relative flex flex-wrap items-stretch w-full">
                                        <input type="email" value="" name="EMAIL"
                                            class="required email form-control block w-full text-[12px] font-medium leading-[1.7] appearance-none bg-clip-padding shadow-[0_0_1.25rem_rgba(30,34,40,0.04)] px-4 py-[0.6rem] rounded-[0.4rem] motion-reduce:transition-none focus:text-[#60697b] focus:bg-[rgba(255,255,255,.03)] focus:shadow-[0_0_1.25rem_rgba(30,34,40,0.04),unset] disabled:bg-[#aab0bc] disabled:opacity-100 file:mt-[-0.6rem] file:mr-[-1rem] file:mb-[-0.6rem] file:ml-[-1rem] file:text-[#60697b] file:bg-[#fefefe] file:pointer-events-none file:transition-all file:duration-[0.2s] file:ease-in-out file:px-4 file:py-[0.6rem] file:rounded-none motion-reduce:file:transition-none placeholder:text-[#959ca9] placeholder:opacity-100 border border-solid !border-[rgba(255,255,255,0.1)] old-text-[#cacaca] focus:!border-[rgba(63,120,224,.5)] bg-[rgba(255,255,255,.03)] focus-visible:!border-[rgba(63,120,224,.5)] focus-visible:!outline-0"
                                            placeholder="Email Address" id="mce-EMAIL2">
                                        <label
                                            class="!ml-[0.05rem] text-[#959ca9] text-[.75rem] absolute z-[2] h-full overflow-hidden text-start text-ellipsis whitespace-nowrap pointer-events-none origin-[0_0] px-4 py-[0.6rem] left-0 top-0"
                                            for="mce-EMAIL2">Email Address</label>
                                        <input type="submit" value="Join" name="subscribe"
                                            id="mc-embedded-subscribe2"
                                            class="btn btn-primary old-text-white !bg-[#3f78e0] border-[#3f78e0] hover:old-text-white hover:bg-[#3f78e0] hover:border-[#3f78e0] focus:shadow-[rgba(92,140,229,1)] active:old-text-white active:bg-[#3f78e0] active:border-[#3f78e0] disabled:old-text-white disabled:bg-[#3f78e0] disabled:border-[#3f78e0] !text-[.85rem] !relative z-[2] focus:z-[5] hover:!transform-none border-0">
                                    </div>
                                    <div id="mce-responses2" class="clear">
                                        <div class="response" id="mce-error-response2" style="display:none"></div>
                                        <div class="response" id="mce-success-response2" style="display:none"></div>
                                    </div>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                            type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1"
                                            value=""></div>
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div> --}}
                        <!--End mc_embed_signup-->
                    </div>
                    <!-- /.newsletter-wrapper -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <div class="block lg:hidden">
            <p class="!mb-4 mt-2">© {!! get_the_date('Y') !!} Values & Virtues. <br
                class="hidden xl:block lg:block old-text-[#cacaca]">All rights reserved.</p>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</footer>
