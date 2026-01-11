@if (has_term('', 'virtue', get_the_ID()))
    {{-- && has_term('','grade-level', get_the_ID()) --}}
    @php($virtue = get_the_terms(get_the_ID(), 'virtue')[0])
    @php($grade_level = get_the_terms(get_the_ID(), 'grade-level')[0])
    @if (get_post_type() == 'story')
    @php($story_id = get_the_ID())
@elseif(get_field('story', get_the_ID()))
    @php($story = get_field('story', get_the_ID()))
    @php($story_id = $story->ID)
@endif
    @query([
        'post_type' => 'story',
        'posts_per_page' => 3,
        'post__not_in' => [$story_id],
        'tax_query' => [
            [
                'taxonomy' => 'virtue',
                'field' => 'slug',
                'terms' => $virtue->slug,
            ],
            [
                'taxonomy' => 'grade-level',
                'field' => 'slug',
                'terms' => $grade_level->slug,
            ],
        ],
    ])
    <section class="py-8 lg:py-20 bg-blue-50 mt-20 pdfcrowd-remove">
        <div class="container">
            <h2>@term('virtue')</h2>
            @if (term_description($virtue->term_id))
                <div class="max-w-xl">
                    <p>{!! term_description($virtue->term_id) !!}</p>
                </div>
            @endif
            @hasposts
                <div class="flex justify-between mt-8 mb-4">
                    <h3>More Stories about @term('virtue')</h3>
                    <x-button-link link="{!! get_term_link($virtue->term_id) !!}">
                        View All
                    </x-button-link>
                </div>
                <ul class=" grid grid-cols-1 mg:grid-cols-2 lg:grid-cols-3 gap-4">
                    @posts
                        @include('partials.story-card')
                    @endposts
                </ul>
            @endhasposts
        </div>
    </section>
@endif
