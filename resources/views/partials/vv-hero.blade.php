@php($labels = get_post_type_labels(get_post_type_object(get_post_type())))
{{-- if not logged in --}}
{{-- just the hero --}}
{{-- endif --}}
{{-- if logged in --}}
{{-- the hero and the content --}}
{{-- endif --}}
<section class="pt-32 pb-8 lg:pt-48">
    <div class="container">
        <div class="flex justify-center items-center space-x-2 mb-4">
            @if (has_term('', 'virtue'))
                <div class="bg-blue-50 rounded-full text-sm py-1 px-2">
                    @term('virtue', true)
                </div>
            @endif
            @if (get_post_type() == 'story')
                <div class="text-sm">@published('F, Y')</div>
            @elseif(get_field('story', get_the_ID()))
                @php($story_id = get_field('story', get_the_ID())->ID)
                <div class="text-sm">{!! get_the_date('F, Y', $story_id) !!}</div>
            @else
                <div class="text-sm">@published('F, Y')</div>
            @endif

        </div>
        <h1 class="text-center">
            {!! get_the_title() !!}
        </h1>
        <div class="flex justify-center divide-x divide-x-black">
            @if (get_post_type() == 'story' && get_field('author_name', get_the_ID()))
                <div class="px-2">
                    @include('partials.story-author', ['story_id' => get_the_ID()])
                </div>
            @elseif(get_field('story', get_the_ID()) && get_field('author_name', get_field('story', get_the_ID())->ID))
                <div class="px-2">
                    @include('partials.story-author', ['story_id' => get_field('story', get_the_ID())->ID])
                </div>
            @endif
            @if (get_post_type() == 'story')
                <div class="px-2">
                    @include('partials.story-purchase-link', ['story_id' => get_the_ID()])

                </div>
            @elseif(get_field('story', get_the_ID()))
                <div class="px-2">
                    @include('partials.story-purchase-link', [
                        'story_id' => get_field('story', get_the_ID())->ID,
                    ])
                </div>
            @endif
        </div>

    </div>
</section>
