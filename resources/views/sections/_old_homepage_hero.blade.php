<section
    class="bg-blue-50 !relative before:content-[''] before:absolute before:w-full before:h-full before:bg-cover before:pointer-events-none before:left-0 before:top-0 123beforebg-url(@asset('/images/lines.png'))">

    <div class="container pt-28 md:pt-36 lg:pt-48 relative ">
        <div class="flex flex-wrap lg:flex-nowrap lg:-mx-4">
            <div class="w-full lg:w-3/5 mb-20 flex flex-col justify-end">
                <div>
                    @hasfield('heading')
                    <h1 class=" mb-6  text-6xl text-left  lg:max-w-3xl">
                        @field('heading')
                    </h1>
                    @endfield
                    @hasfield('subheading')
                    <p class="max-w-sm text-blue-50 ">
                        @field('subheading')
                    </p>
                    @endfield
                    <div
                        class="flex flex-col sm:flex-row mt-8 sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 md:space-x-8 lg:space-x-12">

                        @hasfield('button_link')
                        @php($btn = get_field('button_link'))
                        <x-button-link link="{!! $btn['url'] !!}">
                            {!! $btn['title'] !!}
                        </x-button-link>
                        @endfield
                        @hasfield('secondary_link')
                        <a href="@field('secondary_link', 'url')
"
                            class="hidden sm:flex items-center hover:text-blue-main text-blue-900 tracking-wide font-medium">
                            @field('secondary_link', 'title')
                                &nbsp; @include('icons.arrow-right')
                            </a>
                        @endfield


                    </div>
                    <ul class="flex space-x-8 mt-20">
                        @foreach ($stats as $stat)
                            @php($ints = str_split($stat['number']))
                            <li>
                                <div class=" border-blue-main border-b-2 mb-1 min-w-[100px]">
                                    <h5
                                        class="inline-flex font-space-grotesk mt-0 mb-2 ml-1 h-8 overflow-hidden  text-3xl font-semibold tracking-tight leading-9 text-left ">
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
                                </div>
                                <p class="text-blue-50  font-light ml-1">{{ $stat['label'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-full lg:w-2/5">
                @hasfield('image')
                <img src="@field('image', 'url')
" class="rounded-xl mb-16" />
            @endfield
        </div>
    </div>
</div>

<!-- /.container -->
</section>

