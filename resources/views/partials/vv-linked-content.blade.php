@if (get_post_type() == 'story')
    @php($story_id = get_the_ID())
@elseif(get_field('story', get_the_ID()))
    @php($story = get_field('story', get_the_ID()))
    @php($story_id = $story->ID)
@endif

@if (isset($story_id))
    <?php
    $companion_content_args = [
        'post_type' => 'companion-content',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'story',
                'value' => $story_id,
            ],
        ],
    ];
    $activity_content_args = [
        'post_type' => 'activity',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'story',
                'value' => $story_id,
            ],
        ],
    ];
    $ccs = get_posts($companion_content_args);
    $as = get_posts($activity_content_args);
    $cc_count = count($ccs);
    $a_count = count($as);
    
    $count = $cc_count + $a_count;
    
    $btn_classes = ['', 'border border-blue-main bg-white text-blue-main hover:bg-blue-main hover:text-white'];
    ?>
    <div class="container">

        <div
            class="mx-auto w-full max-w-[48rem] mt-8 lg:mt-16 flex flex-col md:flex-row md:justify-center mb-8 lg:mb-16  space-y-2 md:space-y-0 md:space-x-4">
            @php($idx = 0)
            @if (get_post_type() != 'story')
                <x-button-link link="{{ get_permalink($story_id) }}" class="{!! $btn_classes[$idx] !!}">
                    Story
                </x-button-link>
                @php($idx++)
            @endif
            @if (get_post_type() != 'activity')
                @foreach ($as as $a)
                    <x-button-link link="{{ get_permalink($a) }}" classes="{!! $btn_classes[$idx] !!}">
                        Begin Activity
                    </x-button-link>
                    @php($idx++)
                @endforeach
            @endif
            @if (get_post_type() != 'companion-content')
                @foreach ($ccs as $c)
                    <x-button-link link="{{ get_permalink($c) }}" classes="{!! $btn_classes[$idx] !!}">
                        Guiding Questions
                    </x-button-link>
                    @php($idx++)
                @endforeach
            @endif
        </div>
    </div>

{{-- Amazon Disclaimer --}}
@if (get_field('purchase_link', $story_id))
<p class="text-center my-4">
	<i>* As an Amazon Associate, Values and Virtues earns from qualifying purchases from our links.</i>
</p>
@endif
@endif
