@php($labels = get_post_type_labels(get_post_type_object(get_post_type())))
{{-- if not logged in --}}
{{-- just the hero --}}
{{-- endif --}}
{{-- if logged in --}}
{{-- the hero and the content --}}
{{-- endif --}}

<section>
    <div class="container max-w-[1200px]">
        <div class="w-full mx-auto max-w-[48rem]">
            @if (get_post_type() == 'story')
                @include('partials.story-hero', ['story_id' => get_the_ID()])
            @else
                @php($story = get_field('story', get_the_ID()))
                @if($story && has_post_thumbnail($story->ID))
                <div class="mx-auto flex items-start justify-center mb-8">
                    <img src="@thumbnail($story->ID,'large', false)" alt="" style="aspect-ratio: 16 / 9"
                        class="w-full object-cover ">
                </div>
                @endif
            @endif
        </div>
        <div class="prose mx-auto w-full max-w-[48rem]">
            @php(the_content())
        </div>

    </div>
</section>
{{-- More ${virtue} stories for age group --}}
{{-- More ${virtue} activities for age group --}}
{{-- All Virtues --}}