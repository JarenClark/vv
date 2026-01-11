{{--   
  Title: VV - Two Column Text
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: columns
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}

<section class="{!! $block['name'] !!} py-20">
    <div class="container max-w-5xl">
        @hasfield('label')
        <x-label>
            @field('label')
            </x-label>
        @endfield
        @hasfield('heading')
        <h2 class="text-center">
            @field('heading')
            </h2>
        @endfield
        @hasfields('section')
            <ul class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 ">
                @fields('section')
                    <div class="prose lg:text-2xl">
                        @sub('paragraph')
                    </div>
                @endfields
            </ul>
        @endhasfields
    </div>

</section>
