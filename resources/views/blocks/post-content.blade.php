{{--   
  Title: VV - Post Content
  Description: Single column layout with repeating sections of different content types.
  Category: custom
  Icon: editor-ol
  Keywords: content image heading post single column buttons
  Mode: auto
  Align: center
  PostTypes: post
  SupportsAlign: center
--}}

<section  data-block-name="{!! $block['name'] !!}" data-block-id="{!! $block['id'] !!}">


    <div class=" space-y-4 lg:space-y-8">
        @layouts('sections')
        {{--  heading --}}
            @layout('heading_section')
                @hassub('heading')
                <?php
                $heading = get_sub_field('heading');
                ?>
                <h2>
                    {!! $heading !!}
                </h2>
                @endsub
            @endlayout

        {{--  paragraph--}}
            @layout('paragraph_section')
                @hassub('paragraph')
                <?php
                $paragraph = get_sub_field('paragraph');
                ?>
                <div class="richtext ">
                    {!! $paragraph !!}
                </div>
                @endsub
            @endlayout


            {{--  image--}}
            @layout('image_section')
                @hassub('image')
                <img src="@sub('image', 'url')" alt="@sub('image', 'alt')" class="">
                @endsub
            @endlayout

            {{--  button link --}}
            @layout('button_link_section')
                @hassub('button_link')
                <div>
                    <x-button-link link="@sub('button_link', 'url')">@sub('button_link', 'title')</x-button-link>

                </div>
                @endsub
            @endlayout
        @endlayouts
    </div>
</section>
