@php($pt = get_post_type(get_the_ID()))
@if (!isset($story_id))
    @php($story_id = get_the_ID())
@endif
<ul class="bg-white p-4 divide-y-2 rounded-[10px] lg:border">
    {{-- @if ($pt != 'story')
        @php($video_embed_link = get_field('video_embed_link', $story_id))
        @if ($video_embed_link)
            <div class=" overflow-hidden">
                <iframe width="100%" style='aspect-ratio: 16 / 9' height="auto" src="{!! $video_embed_link !!}"
                    frameborder="0" referrerpolicy="strict-origin-when-cross-origin"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        @endif
    @endif --}}
    {{-- <li class="p-8 lg:p-4 lg:pt-8 text-center">
        @if ($pt == 'story')
            <h3 class="lg:text-left">
                {!! get_the_title($story_id) !!}
            </h3>
        @else
            <a href="{!! get_the_permalink($story_id) !!}">
                <h3 class="lg:text-left">
                    {!! get_the_title($story_id) !!}
                </h3>
            </a>
        @endif

    </li> --}}
    @if (get_field('author_name', $story_id))
        <li class=" post-author flex lg:flex-col justify-between p-8 lg:p-4">
            <b>By:</b>
            {{-- <i class="uil uil-user"></i> --}}
            @if (get_field('author_link', $story_id))
                <a href="{!! get_field('author_link', $story_id) !!}" target="_blank" class=" hover:text-blue-900">
                    <span><b></b> {!! get_field('author_name', $story_id) !!}</span>
                </a>
            @else
                <span class="">{!! get_field('author_name', $story_id) !!}
                </span>
                @endfield
        </li>
    @endif
    @if (has_term('', 'virtue', $story_id))
        <li class="flex justify-between p-8 lg:flex-col lg:p-4">
            <b>Virtue:</b>
            @term('virtue', $story_id, true)

        </li>
        @if (has_term('', 'grade-level', $story_id))
        @php($virtue = get_the_terms($story_id, 'virtue')[0])
        @php($grade_level = get_the_terms($story_id, 'grade-level')[0])
        <li class="flex justify-between lg:flex-col lg:p-4 p-8">
            <b>Grade Level:</b>
            <a href="{!! get_term_link($virtue->term_id) !!}?level={!!$grade_level->slug!!}">
                @term('grade-level', $story_id)
            </a>
            
        </li>
    @endif
    @endif

    @hasfield('author_name')

    @endfield
    @php($year = get_the_date('Y', $story_id))
    @if($year > 1600)
    <li class=" p-8 post-date flex lg:flex-col lg:p-4 justify-between">
        <b>Published:</b>
        {{-- <i class="uil uil-calendar-alt"></i> --}}
        <span>{!! get_the_date('F, Y', $story_id) !!}</span>
    </li>
   @endif
    @if(get_field('purchase_link', $story_id))
    <li class="p-8 lg:text-left lg:p-4 lg:pb-8 text-center">
        <p>
            <a href="{!! get_field('purchase_link', $story_id) !!}" target="_blank" class="hover:text-blue">
                Support the author!<br/>
                 Add this book to your library
            </a>
            </p>
    </li>
    @endif
    {{-- @if ($pt != 'story')
        <li class="p-8 flex justify-center">
            @php($link = get_the_permalink($story_id))
            <x-button-link link="{!! $link !!}">
                Back to story
            </x-button-link>
        </li>
    @endif --}}
</ul>
