{{--   
  Title: VV - Form Content
  Description: Two column layout with text content on one side and a paragraph on the other
  Category: custom
  Icon: feedback
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}
@group('contact_us')
    <section class="py-20 ">
        <div class="container max-w-[1200px]">
            <div class="flex flex-wrap lg:flex-nowrap lg:-mx-4">
                <div class="w-full lg:w-1/3 mb-8 lg:px-4">
                    @hassub('heading')
                    <div>
                        <h2>
                            @sub('heading')
                            </h2>
                        </div>
                    @endsub
                    @hassub('paragraph')
                    <div class="richtext">
                        @sub('paragraph')
                    </div>
                    @endsub
                </div>
                @hassub('form')
                @php($formID = get_sub_field('form'))
                <div class="w-full lg:w-2/3 lg:px-4">
                    @shortcode('[gravityform id="'.$formID.'" title="false" description="false" ajax="true"]')
                </div>
                @endsub
            </div>
        </div>
    </section>
@endgroup
