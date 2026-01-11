@php
    if (!isset($label)) {
        if (get_field('alternate_title', get_the_ID()) && get_field('alternate_title', get_the_ID()) != '') {
            $label = get_the_title();
        }
    }
    if (!isset($text)) {
        $text = get_the_title();
        if (get_field('alternate_title', get_the_ID()) && get_field('alternate_title', get_the_ID()) != '') {
            $text = get_field('alternate_title', get_the_ID());
        }
        if (is_archive()) {
            $text = get_the_archive_title();
        }
    }
    if (!isset($subtitle)) {
        $subtitle = '';
    }
@endphp

<section class="bg-blue-grey text-blue-dark">
    <div class="container pb-8 lg:pb-20 pt-32 lg:pt-48">
        @if (isset($label))
            <div>
                <x-label>{!! $label !!}</x-label>
            </div>
        @endif

        <h1 class="text-center ">{!! $text !!}</h1>
    </div>
</section>

{{-- <section class="  pt-32 lg:pt-48  pb-8 lg:pb-20 bg-blue-50 relative">

    <div class="container  relative">
        <div class="max-w-2xl">

            @if (isset($label))
                <div>
                    <p class="text-blue-main mb-4">{!! $label !!}</p>

                </div>
            @endif
            <h1 class="lg:max-w-5xl mx-auto ">
                {!! $text !!}
            </h1>
            <div class="mx-auto flex flex-col items-center">
                <div class="lead max-w-2xl text-white opacity-50">
                    {!! $subtitle !!}
                </div>
            </div>
            <div>
                {!! $slot !!}
            </div>

        </div>
    </div>
</section> --}}
