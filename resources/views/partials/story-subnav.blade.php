@if (get_post_type() == 'story')
    @php($story_id = get_the_ID())
@else
    @php($story = get_field('story', get_the_ID()))
    @php($story_id = $story->ID)
@endif

@if ($story_id)

    @php(
    $companion_content_args = [
        'post_type' => 'companion-content',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'story',
                'value' => $story_id,
            ],
        ]
    ]
)
    @php(
    $activity_content_args = [
        'post_type' => 'activity',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'story',
                'value' => $story_id,
            ],
        ]
    ]
)
    @php($ccs = get_posts($companion_content_args))
    @php($as = get_posts($activity_content_args))

    @php($cc_count = count($ccs))
    @php($a_count = count($as))

    @php($count = $cc_count + $a_count)

    @php($active_styles = ' text-white bg-blue-main  pointer-events-none')
    @php($inactive_styles = ' bg-blue-dark text-white')
    @if ($count > 0)

                @if ($story_id)
                    <select name="related_content" class="text-blue  h-fit  tracking-wide text-sm py-1 px-2 pr-8" id="related_content">
                        <option {!! get_post_type() == 'story' ? 'selected' : null !!} value="@permalink($story_id)">
                            Story
                        </option>
                        @foreach ($ccs as $cc)
                            <option  {!! get_post_type() == 'companion-content' ? 'selected' : null !!} value="@permalink($cc->ID)">
                                Guiding Questions
                            </option>
                        @endforeach
                        @foreach ($as as $a)
                            <option  {!! get_post_type() == 'activity' ? 'selected' : null !!} value="@permalink($a->ID)">
                                Activity
                            </option>
                        @endforeach
                    </select>
                    <style>
                        @media(max-width: 767px) {
                            #related_content {
                                margin-top: 8px;
                            }
                        }
                    </style>
                    <script>
                        document.getElementById('related_content').addEventListener('change', function() {
                            const link = this.value;
                            window.location.href = link;
                            // if (gradeLevel) {
                            //     window.location.href = `/virtues/{!! get_queried_object()->slug !!}?level=${gradeLevel}`;
                            // } else {
                            //     window.location.href = `/virtues/{!! get_queried_object()->slug !!}`;
                            // }
                        });
                    </script>
                @endif

    @endif
@endif
