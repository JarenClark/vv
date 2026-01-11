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
            <div class="bg-blue-50 rounded-full text-sm py-1 px-2">
                @term('virtue', true)
            </div>

            <div class="text-sm">@published('F, Y')</div>
        </div>
        <h1 class="text-center">
            {!! get_the_title() !!}
        </h1>
    </div>
</section>
<section>
    <div class="container max-w-[1200px]">
        <div class="w-full mx-auto max-w-[48rem]">
            @if (!get_post_type() == 'story')
                @include('partials.story-hero', ['story_id' => get_the_ID()])
            @else
                @php($story = get_field('story', get_the_ID()))
                <div class="mx-auto flex items-start justify-center mb-8">
                    <img src="@thumbnail('large', false)" alt="" style="aspect-ratio: 16 / 9"
                        class="w-full object-cover ">

                </div>
            @endif
        </div>
        <div class="prose flex flex-col items-center">
            @php(the_content())
        </div>
    </div>
</section>
{{-- More ${virtue} stories for age group --}}
{{-- More ${virtue} activities for age group --}}
{{-- All Virtues --}}