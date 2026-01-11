{{--   
  Title: VV - Repeating Text Image Content and CTA
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: image-flip-horizontal
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}

<section class="pt-20 lg:pb-32 pb-0 ">
    <div class="container max-w-[1200px] rounded-lg shadow-lg">
        <ul class="bg-white lg:p-20 space-y-8 lg:space-y-16">

            @fields('content_sections')
                <li class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        @hassub('image')
                        <img src="@sub('image', 'url')" alt="@sub('image', 'alt')" class="w-full">
                    @endsub

                </div>
                <div>
                    @hassub('subheading')
                    <h3 class="mb-2">
                        @sub('subheading')
                        </h3>
                    @endsub
                    @hassub('content')
                    <div class="prose">
                        @sub('content')
                        </div>
                    @endsub

                </div>
            </li>
        @endfields
    </ul>
    @if(get_field('cta_heading') || get_field('cta_button'))
    <div class="bg-white flex flex-col pt-8 items-center pb-20 px-8 lg:px-32">
        @hasfield('cta_heading')
        <h2 class="text-center mb-8">
            @field('cta_heading')
        </h2>
        @endfield
        @hasfield('cta_button')
        @php($btn = get_field('cta_button'))
        <x-button-link link="{!! $btn['url']!!}">
           {!! $btn['title']!!}
        </x-button-link>
        @endfield
    </div>
    @endif
</div>
</section>
