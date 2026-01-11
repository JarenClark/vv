{{--   
  Title: VV - Long Form Content
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: media-text
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}
<section class="py-20">
    <div class="container">
        @hasfield('heading')
        <h2> @field('heading')</h2>
        @endfield
        @hasfield('paragraph')
        <div class="prose">
          @field('paragraph')
        </div>
        @endfield
    </div>
</section>