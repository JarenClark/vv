@if (get_field('author_name', $story_id))
<p class=" post-author text-sm text-center ">
    <b>By:</b>
    {{-- <i class="uil uil-user"></i> --}}
    @if (get_field('author_link', $story_id))
        <a href="{!! get_field('author_link', $story_id) !!}" target="_blank" class=" hover:text-blue">
            <span><b></b> {!! get_field('author_name', $story_id) !!}</span>
        </a>
    @else
        <span class="">{!! get_field('author_name', $story_id) !!}
        </span>
        @endfield
    </p>
@endif