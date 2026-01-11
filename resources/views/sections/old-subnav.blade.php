<ul class="flex  gap-2 overflow-x-scroll md:overflow-x-auto">
    {{-- @if (get_post_type() != 'story') --}}
    <li>
        <a class="py-2 block whitespace-nowrap {!! get_post_type() == 'story' ? 'opacity-100 pointer-events-none' : 'opacity-50 hover:opacity-100' !!}" href="@permalink($story_id)">
            Story</a>
    </li>
    {{-- @endif --}}
    {{-- @if (get_post_type() != 'companion-content') --}}
    @foreach ($ccs as $cc)
        <li>
            <a class="py-2 block whitespace-nowrap {!! get_post_type() == 'companion-content' ? 'opacity-100 pointer-events-none' : 'opacity-50 hover:opacity-100' !!}" href="@permalink($cc->ID)">
                Companion Content</a>
        </li>
    @endforeach
    {{-- @endif --}}
    {{-- @if (get_post_type() != 'activity') --}}
    @foreach ($as as $a)
        <li>
            <a class="py-2 block whitespace-nowrap {!! get_post_type() == 'activity' ? 'opacity-100 pointer-events-none' : 'opacity-50 hover:opacity-100' !!}" href="@permalink($a->ID)">
                Activity</a>
        </li>
    @endforeach
    {{-- @endif --}}
    {{-- <li class='{!! get_post_type() == 'story' ? $active_styles : $inactive_styles !!}'>
        <a class="p-2 block whitespace-nowrap text-center" href="@permalink($story_id)">
            Story</a>
    </li> --}}

</ul>