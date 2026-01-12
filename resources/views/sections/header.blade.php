{{-- <div id="backdrop" class="hidden fixed inset-0  backdrop-blur-sm z-[29]"></div> --}}
<div id="search" class="hidden fixed z-30 {!! is_user_logged_in() && current_user_can('administrator') ? 'top-8' : 'top-0 ' !!} left-0 w-screen bg-blue-dark text-white">
    <div class="inner border-b border-white -translate-y-full transition duration-300">
        <div class="container ">
            <div class="flex py-4 justify-between">
                {!! get_search_form() !!}
                <button class="close-search">
                    @include('icons.close')
                </button>
            </div>

        </div>
    </div>

</div>
<header class="fixed bg-white lg:bg-transparent {!! is_user_logged_in() && current_user_can('administrator') ? 'top-8' : 'top-0 ' !!} left-0 w-screen z-20">
    <div id="backdrop" class="hidden fixed inset-0 h-screen w-screen bg-blue-dark/0"></div>
    <div class="inner relative">
        <div class="container ">
            <div class="flex items-center  justify-between">

                <a href="/" class="py-4 flex items-center z-[40] space-x-1 relative">
                    <div class="w-12 h-12 opacity-100 transition duration-200" style="overflow: hidden; background-image: url(@asset('/images/logos/tpa.svg'))">
                        {{-- @include('icons.tpa-logo') --}}
                    </div>
                    @include('icons.logo')
                </a>

                <div class=" items-center block lg:justify-end lg:inline-flex pdfcrowd-remove">
                    @if (has_nav_menu('primary_navigation'))
                        <nav id="main-nav"
                            class=" flex flex-col lg:flex-row justify-between lg:justify-end absolute top-0 pt-16 right-0 lg:relative h-screen lg:h-auto translate-x-full lg:translate-x-0 w-screen max-w-[600px] lg:max-w-screen bg-white lg:bg-transparent lg:p-0 z-[30] ">
                            <div class="flex flex-col lg:flex-row lg:items-center">
                                <div class="block lg:hidden mx-4 mt-8 mb-4 lg:mb-0">
                                    {!! get_search_form(false) !!}
                                </div>

                                {!! wp_nav_menu([
                                    'theme_location' => 'primary_navigation',
                                    'menu_class' => 'navbar-nav nav nav-primary',
                                    'walker' => new \App\nav_walker(),
                                ]) !!}
    {{-- login/ logout --}}
                                
                                    @if (is_user_logged_in())
                            
                                        <a href="/membership-account/" style="cursor: pointer;" class="bg-blue-main cursor-pointer font-semibold hover:bg-blue-dark hover:text-white leading-6 mt-3 lg:mt-0 px-6 py-2 rounded-[10px] text-center text-sm text-white mx-4 lg:mr-0">
                                            My Account    </a>
                                    @else
                                    <a href="/login/" style="cursor: pointer;white-space: nowrap;" class="bg-blue-main cursor-pointer font-semibold hover:bg-blue-dark hover:text-white leading-6 mt-3 lg:mt-0 px-6 py-2 rounded-[10px] text-center text-sm text-white mx-4 lg:mr-0">
                                        Sign Up / Login    </a>
                             
                                    @endif
                            </div>
                            <ul class="flex flex-col lg:hidden space-y-2 p-4 mb-8">
                                <li>
                                    <a href="/contact"
                                        class="hover:bg-blue-main hover:text-white font-medium block rounded-[10px] py-3 px-10 w-full text-center border border-blue-dark">
                                        Contact</a>
                                </li>
                                <li>
                                    <a href="https://www.every.org/principledacademy?utm_campaign=donate-link#/donate/card" target="_blank"
                                        class="block font-medium bg-blue-main text-white rounded-[10px] py-3 px-10 w-full text-center border border-blue-main">
                                        Donate</a>
                                </li>
                            </ul>

                        </nav>
                    @endif

                    {{-- Desktop Search Toggle --}}
                    <button id="search-btn" class="hidden lg:ml-4 lg:block">
                        @include('icons.search')
                    </button>
                </div>

                <div class="flex lg:hidden items-center">
                    {{-- <button id="search">
                        @include('icons.search')
                    </button> --}}

                    <button class="block lg:hidden z-[40]">

                        @include('icons.hamburger-html')
                    </button>
                    {{-- <button class="block lg:hidden hamburger text-current menu-toggler" id="menu-toggler">
                        @include('icons.hamburger')
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</header>

<script></script>
