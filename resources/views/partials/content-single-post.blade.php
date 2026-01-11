<article @php(post_class('h-entry'))>


    <section class="pt-32 pb-8 lg:pt-48">
        <div class="container">
            <div class="flex justify-center items-center space-x-2 mb-4">
                @if (has_term('', 'virtue'))
                    <div class="bg-blue-50 rounded-full text-sm py-1 px-2">
                        @term('virtue', true)
                    </div>
                @endif

                <div class="text-sm">
                    @published('F, Y')
                </div>

            </div>
            <h1 class="text-center">
                {!! get_the_title() !!}
            </h1>
            <div class="flex justify-center divide-x divide-x-black">

            </div>

        </div>
    </section>



    <section>
        <div class="container max-w-[1200px] pb-20">
            @if (has_post_thumbnail())
                <div class="w-full mx-auto max-w-[48rem]">

                    <img src="{{ get_the_post_thumbnail_url(get_the_ID(), 'large') }}" class=""
                        alt="@title Thumbnail">

                </div>
            @endif
            <div class="prose mx-auto w-full max-w-[48rem]">
                @php(the_content())
            </div>

            <div class="mt-8 max-w-[48rem] mx-auto">
                <x-button-link link="/blog" classes="w-full block border border-blue-main hover:bg-blue-main hover:text-white text-blue-main">
                    Back to Blog
                </x-button-link>
            </div>


        </div>
    </section>



</article>
