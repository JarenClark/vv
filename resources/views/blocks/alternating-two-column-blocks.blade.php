{{--   
  Title: VV - Alternating Two Column Blocks
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: columns
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}

<section class="">
    <div class="container max-w-[1200px] py-8 lg:py-20">
        <div class="flex flex-wrap  !mb-8 !text-center">
            <div class="lg:w-8/12 w-full flex-[0_0_auto]  max-w-full !mx-auto">
                @hasfield('label')
                <x-label>
                    @field('label')
                    </x-label>

                @endfield
                @hasfield('heading')
                <h2 class="">
                    @field('heading')
                    </h2>
                @endfield
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        @php($idx = 0)
        @if(get_field('reverse_order'))
        @php($idx++)
        @endif
        @hasfields('row')
            @fields('row')
                <div
                    class=" lg:px-4 flex flex-wrap {!! $idx % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' !!}  !mb-[4.5rem] xl:!mb-[7rem] lg:!mb-[7rem] md:!mb-[7rem] ">
                    <div
                        class="xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto]  max-w-full mt-12 !relative">
                        <div class="shape bg-dot violet rellax !w-[7rem] !h-[8rem] !absolute z-[1] opacity-50"
                            >
                        </div>
                        @hassub('image')
                        <figure class="rounded-[10px] !mb-0">
                            <img class="rounded-[10px]" src="@sub('image','url')"
                                alt="@sub('image','alt')">
                        </figure>
                        @endsub
                    </div>
                    <!--/column -->
                    <div
                        class=" lg:px-4 xl:w-6/12 lg:w-6/12 w-full flex-[0_0_auto] xl:px-[35px]  max-w-full mt-4 lg:mt-12 mb-12">
                        @hassub('subheading')
                        <h3 class=" mb-2 lg:mb-4">
                            @sub('subheading')
                            </h3>
                        @endsub
                        @hassub('paragraph')
                        <div class="richtext prose">
                            @sub('paragraph')
                            </div>
                        @endsub
                        {{-- <div class="flex flex-wrap mx-[-15px] mt-[-15px]">
                            <div class="xl:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[15px]">
                                <ul class="pl-0 list-none bullet-bg bullet-soft-leaf !mb-0">
                                    <li class="relative pl-6">
                                        <span><i
                                                class="uil uil-check !w-4 !h-4 text-[0.8rem] leading-none tracking-[normal] text-center table !text-[#7cb798] !bg-[#e7f2ec] absolute rounded-[100%] left-0 top-[0.2rem] before:align-middle before:table-cell before:content-['\e9dd']"></i></span>
                                        <span>Aenean quam ornare curabitur blandit consectetur.</span>
                                    </li>
                                    <li class="mt-3 relative pl-6">
                                        <span><i
                                                class="uil uil-check !w-4 !h-4 text-[0.8rem] leading-none tracking-[normal] text-center table !text-[#7cb798] !bg-[#e7f2ec] absolute rounded-[100%] left-0 top-[0.2rem] before:align-middle before:table-cell before:content-['\e9dd']"></i></span>
                                        <span>Nullam quis risus eget urna mollis ornare aenean leo.</span>
                                    </li>
                                </ul>
                            </div>
                            <!--/column -->
                            <div class="xl:w-6/12 w-full flex-[0_0_auto] px-[15px] max-w-full mt-[15px]">
                                <ul class="pl-0 list-none bullet-bg bullet-soft-leaf !mb-0">
                                    <li class="relative pl-6">
                                        <span><i
                                                class="uil uil-check !w-4 !h-4 text-[0.8rem] leading-none tracking-[normal] text-center table !text-[#7cb798] !bg-[#e7f2ec] absolute rounded-[100%] left-0 top-[0.2rem] before:align-middle before:table-cell before:content-['\e9dd']"></i></span>
                                        <span>Etiam porta euismod malesuada mollis nisl ornare sem.</span>
                                    </li>
                                    <li class="mt-3 relative pl-6">
                                        <span><i
                                                class="uil uil-check !w-4 !h-4 text-[0.8rem] leading-none tracking-[normal] text-center table !text-[#7cb798] !bg-[#e7f2ec] absolute rounded-[100%] left-0 top-[0.2rem] before:align-middle before:table-cell before:content-['\e9dd']"></i></span>
                                        <span>Vivamus sagittis lacus augue rutrum maecenas.</span>
                                    </li>
                                </ul>
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                        <a href="#"
                            class="btn btn-soft-leaf !text-[.85rem] !tracking-[normal] !rounded-[50rem] mt-6 !mb-0">More
                            Details</a> --}}
                    </div>
                    <!--/column -->
                </div>
            @endfields
        @endhasfields

    </div>
    <!-- /.container -->
</section>
