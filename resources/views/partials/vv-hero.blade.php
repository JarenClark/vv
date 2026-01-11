@php($labels = get_post_type_labels(get_post_type_object(get_post_type())))
{{-- if not logged in --}}
{{-- just the hero --}}
{{-- endif --}}
{{-- if logged in --}}
{{-- the hero and the content --}}
{{-- endif --}}

<section class="pt-32 pb-8 lg:pt-48">
	{{-- show logo on PDF --}}
	<div class="pdf-logo hidden print:block pb-8">
<div class="flex justify-center items-center">
	
                <a href="/" class="py-4 flex items-center z-[40] space-x-1 relative">
                    @include('icons.logo')
                </a>
	</div>
</div>
	
    <div class="container">
        <div class="flex justify-center items-center space-x-2 mb-4">
            @if (has_term('', 'virtue'))
                <div class="bg-blue-50 rounded-full text-sm py-1 px-2">
                    @term('virtue', true)
                </div>
            @endif
            @if (get_post_type() == 'story')
@php($levels = get_the_terms(get_the_ID(), 'grade-level'))
@foreach($levels as $level)
@if($loop->first)
                <div class="text-sm">{!! $level->name !!}</div>
@endif
@endforeach
            @elseif(get_field('story', get_the_ID()))
                @php($story_id = get_field('story', get_the_ID())->ID)
@php($levels = get_the_terms($story_id, 'grade-level'))
                @foreach($levels as $level)
@if($loop->first)
                <div class="text-sm">{!! $level->name !!}</div>
@endif
@endforeach
            @else
                <div class="text-sm">@published('F, Y')</div>
            @endif

        </div>
        <h1 class="text-center">
            {!! get_the_title() !!}
        </h1>
        <div class="flex justify-center divide-x divide-x-black items-center">
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
