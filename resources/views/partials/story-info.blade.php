@php($pt = get_post_type(get_the_ID()))
{{-- @if (!isset($story_id))
    @php($story_id = get_the_ID())
@endif --}}
<ul class="flex space-x-2 lg:space-x-4 mb-4">
    @if (get_field('author_name', $story_id))
        <li class=" post-author  ">
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


    @php($year = get_the_date('Y', $story_id))
    @if($year > 1600)
    <li class=" post-date ">
        <b>Published:</b>
        {{-- <i class="uil uil-calendar-alt"></i> --}}
        <span>{!! get_the_date('F, Y', $story_id) !!}</span>
    </li>
   @endif
    @if(1 > 2 && get_field('purchase_link', $story_id))
    <li class="lg:text-left   text-center">
        <p>
            <a href="{!! get_field('purchase_link', $story_id) !!}" target="_blank" class="hover:text-blue">
                Support the author!<br/>
                 Add this book to your library
            </a>
            </p>
    </li>
    @endif

</ul>
