@if ($link)
    @php
        if (!isset($classes) || !$classes) {
            $classes = [];
            $classes[] = 'bg-blue-main hover:bg-blue-dark';
            $classes[] = 'text-white';
        }
        if(gettype($classes) === 'string') {
            $classes = explode(' ', $classes);
        }
if(!isset($target)) {
$target= '_self';
}
    @endphp
    <a target="{!! $target !!}" href="{!! $link !!}" style="cursor: pointer;" class="text-center px-8 py-3 leading-6  rounded-[10px] font-semibold {!! implode(' ', $classes) !!}">
        {!! $slot !!}
    </a>
@endif
