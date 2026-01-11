@extends('layouts.app')

@section('content')

    @php
        if (get_query_var('level')) {
            $current_grade_level = get_term_by('slug', get_query_var('level'), 'grade-level');
            $tax_query = [
                [
                    'taxonomy' => 'virtue',
                    'field' => 'slug',
                    'terms' => get_queried_object()->slug,
                ],
                [
                    'taxonomy' => 'grade-level',
                    'field' => 'slug',
                    'terms' => get_query_var('level'),
                ],
            ];
        } else {
            $current_grade_level = null;
            $tax_query = [
                [
                    'taxonomy' => 'virtue',
                    'field' => 'slug',
                    'terms' => get_queried_object()->slug,
                ],
            ];
        }
        $virtue_id = get_queried_object()->term_id;
        // Get all grade levels
        $grade_levels = get_terms([
            'taxonomy' => 'grade-level',
            'hide_empty' => true,
            'orderby' => 'meta_value_num',
            'meta_key' => 'age',
        ]);
    @endphp


    @php($term = get_queried_object())
    @php($active_styles = ' text-white bg-blue-dark  pointer-events-none')
    @php($inactive_styles = ' bg-blue-main text-white')
    <x-hero label="Virtue" />
    {{-- <section class="bg-blue-grey">
        <div class="container py-20 lg:pt-48">
            <p class="text-blue-400 tracking-[0.08em] uppercase font-bold text-center mb-4">Virtue</p>
            <h1 class="text-center">{!! $term->name !!}</h1>
        </div>
    </section> --}}
    <section
        class="block md:hidden bg-blue-grey relative before:content-[''] before:absolute before:bg-white before:w-full before:h-1/2 before:left-0 before:bottom-0">
        <div class="relative md:shadow-lg container md:bg-white rounded-lg p-2">
            <div class="block md:hidden rounded-lg overflow-hidden mx-2 bg-white">

                <select name="grade-level" id="grade-level"
                    class="block border border-2 border-blue-main p-1 px-2 py-2 rounded-lg shadow-xl text-blue-dark text-lg w-full">

                    <option value="">All Ages</option>
                    @foreach ($grade_levels as $level)
                        <option value="{!! $level->slug !!}" {!! $current_grade_level && $current_grade_level->slug == $level->slug ? 'selected' : '' !!}>
                            {!! $level->name !!}
                        </option>
                    @endforeach
                </select>
            </div>
            <script>
                document.getElementById('grade-level').addEventListener('change', function() {
                    const gradeLevel = this.value;
                    if (gradeLevel) {
                        window.location.href = `/virtues/{!! get_queried_object()->slug !!}?level=${gradeLevel}`;
                    } else {
                        window.location.href = `/virtues/{!! get_queried_object()->slug !!}`;
                    }
                });
            </script>

        </div>
    </section>
    {{-- <x-hero label="Virtue">
        {!! get_field('tagline', $term->taxonomy . '_' . $term->term_id) !!}
    </x-hero> --}}

    {{-- Latest Stories for this virtue --}}
    <section class="py-8 lg:py-20 bg-white pb-40">
        <div class="container">
            {{-- <div class="grid grid-cols-1 lg:grid-cols-4">
<div class="col-span-1"></div>
<div class="col-span-1 lg:col-span-3"><h2 class="mb-8 mx-6">Stories about {!! $term->name !!}</h2></div>
            </div> --}}
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="order-2 lg:order-1">
                    <div class="lg:sticky lg:top-20 lg:pb-24">

                        {{-- Grade Level Listing --}}
                        <div class="bg-white p-4 lg:rounded-[10px] border  mb-4 hidden md:block">
                            <h4 class="mb-2">Grade Levels</h4>
                            <ul class="space-y-1 text-sm">
                                <li class="">
                                    <a href="/virtues/{!! get_queried_object()->slug !!}" class="{!! !get_query_var('level') ? 'font-bold pointer-events-none' : 'hover:text-blue' !!} ">
                                        All Ages
                                    </a>
                                </li>
                                @foreach ($grade_levels as $l)
                                    <li class="">
                                        <a href="/virtues/{!! get_queried_object()->slug !!}?level={!! $l->slug !!}"
                                            class="{!! get_query_var('level') && get_query_var('level') == $l->slug
                                                ? 'font-bold pointer-events-none'
                                                : 'hover:text-blue' !!} ">
                                            {!! $l->name !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if (get_the_archive_description())
                            <div class="border  border-neutral-200 rounded-[10px] p-4 mb-6 ">
                                <h4 class="mb-2">Definition</h4>
                                <div class="text ">
                                    {{-- @if ($current_grade_level)

                            @else
                            {!! get_the_archive_description() !!}
                            @endif --}}
                                    {!! get_the_archive_description() !!}

                                </div>
                            </div>
                        @endif

                        @query([
                            'post_type' => 'activity',
                            'posts_per_page' => -1,
                            'tax_query' => $tax_query,
                        ])
                        @hasposts
                            <div class="border  border-neutral-200 rounded-[10px] p-4 mb-6">
                                <h4 class="mb-4 ">Activities</h4>
                                <ul class="mb-4 flex flex-wrap">
                                    @posts
                                        <li class="mb-3 mr-3 border border-neutral-200 text-sm rounded-[10px]">
                                            <a href="@permalink" class="block p-2 px-3 hover:text-blue">
                                                @title
                                            </a>
                                        </li>
                                    @endposts
                                </ul>
                            </div>
                        @endhasposts
                        {{-- Search Bar --}}
                        <div class="bg-white p-4 rounded-[10px] border  mb-4 hidden lg:block">
                            {!! get_search_form(false) !!}
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3 order-1 lg:order-2">
                    <h2 class="mb-4 mx-4 block lg:hidden">Stories about {!! $term->name !!}</h2>
                    @query([
                        'post_type' => 'story',
                        'posts_per_page' => -1,
                        'tax_query' => $tax_query,
                    ])
                    @hasposts
                        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6">
                            @php($idx = 0)
                            @posts
                                @include('partials.story-card', ['delay' => $idx])
                                @php($idx++)
                            @endposts
                        </ul>
                    @endhasposts
                </div>

            </div>

        </div>
    </section>

    {{-- @if (get_the_archive_description())
    <section class="py-8">
        <div class="container">
            <div class="flex flex-wrap md:-mx-4">
                <div class="w-full md:w-1/3 px-4">
                    <h3>Definition:</h3>
                </div>
                <div class="w-full md:w-2/3 px-4">
                    <div class="prose">
                        <p>{!! get_the_archive_description() !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif --}}
    {{-- Activities for thsi virtue 
    @query([
        'post_type' => 'activity',
        'posts_per_page' => -1,
        'tax_query' => $tax_query,
    ])
    @hasposts
    <section class="py-20 pb-40">
        <div class="container ">

            <div class="block lg:flex flex-wrap justify-between items-center mb-8">
                <h2 class="my-0 font-sans text-5xl font-semibold text-left ">
                    {!! get_the_archive_title()!!} Activities
                </h2>
                <ul class="flex space-x-3 lg:space-x-4 overflow-x-scroll">
                    <li class='{!! get_query_var('level') ? $inactive_styles : $active_styles !!}'>
                        <a class="p-2 block whitespace-nowrap" href="/virtues/{!! get_queried_object()->slug !!}">All Ages</a>
                    </li>
                    @foreach ($grade_levels as $level)
                        <?php
                        $current_virtue = get_queried_object();
                        $args = [
                            'post_type' => 'activity',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'virtue',
                                    'field' => 'slug',
                                    'terms' => $current_virtue->slug,
                                ],
                                [
                                    'taxonomy' => 'grade-level',
                                    'field' => 'slug',
                                    'terms' => $level->slug,
                                ],
                            ],
                        ];
                        $postTypes = new WP_Query($args);
                        $activity_count = $postTypes->found_posts;
                        
                        ?>
                        @if ($activity_count > 0)
                            <li class=' {!! (get_query_var('level') != false) & (get_query_var('level') == $level->slug)
                                ? $active_styles
                                : $inactive_styles !!}'>
                                <a class="p-2 block whitespace-nowrap"
                                    href="/virtues/{!! get_queried_object()->slug !!}?level={!! $level->slug !!}">
                                    {!! $level->name !!}
                                   
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <ul class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                @posts
                <li> 
                    <a href="@permalink" class=" hover:-translate-y-1 border border-neutral-200 hover:border-blue-900 flex flex-col group justify-end">
                        <div class="p-8 pt-16 text-center flex flex-col items-center">
                            @include('icons.hand-heart')
                            <h3 class="mt-2 text-2xl">@title</h3>
                        </div>
                        <div class="py-4 p-8 text-center border-t bg-white transition duration-300 group-hover:border-blue-900 group-hover:bg-blue-dark group-hover:text-white ">
                            @term('grade-level')
                        </div>
                    </a>
                </li>
                @endposts
            </ul>
         
        </div>
    </section>
    @endhasposts
    --}}
    {{-- <ul class="hidden md:grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-1 overflow-x-scroll">
                <li class='rounded-l-lg {!! get_query_var('level') ? $inactive_styles : $active_styles !!}'>
                    <a class="p-2 block whitespace-nowrap text-center" href="/virtues/{!! get_queried_object()->slug !!}">All Ages</a>
                </li>
                @foreach ($grade_levels as $level)
                <?php
                $current_virtue = get_queried_object();
                $args = [
                    'post_type' => 'story',
                    'tax_query' => [
                        [
                            'taxonomy' => 'virtue',
                            'field' => 'slug',
                            'terms' => $current_virtue->slug,
                        ],
                        [
                            'taxonomy' => 'grade-level',
                            'field' => 'slug',
                            'terms' => $level->slug,
                        ],
                    ],
                ];
                $postTypes = new WP_Query($args);
                $story_count = $postTypes->found_posts;
                
                ?>
                @if ($story_count > 0)
                    <li class='last:rounded-r-lg {!! (get_query_var('level') != false) & (get_query_var('level') == $level->slug)
                        ? $active_styles
                        : $inactive_styles !!}'>
                        <a class="p-2 block whitespace-nowrap text-center"
                            href="/virtues/{!! get_queried_object()->slug !!}?level={!! $level->slug !!}">
                            {!! $level->name !!}
                            
                        </a>
                    </li>
                @endif
            @endforeach
        </ul> --}}


    <script>
        console.log('views/taxonomy-virtue.blade.php')
    </script>

@endsection











{{--
                        @php($post_id = get_the_ID())
                        <li class='card rounded-lg overflow-hidden shadow-lg'>
                            <a href="@permalink"
                                class="group rounded-2xl flex flex-col items-center  card bg-white  hover:shadow-2xl !shadow-[0_0.25rem_1.75rem_rgba(30,34,40,0.07)]">
                                <div class="relative h-60 w-full overflow-hidden">
                                    @if (has_post_thumbnail($post_id))
                                        <div class="absolute inset-0 bg-cover bg-center transition duration-100 scale-100 group-hover:scale-105"
                                            style="background-image: url('{!! get_the_post_thumbnail_url($post_id) !!}')">
                                        </div>
                                    @else
                                        <div class="absolute inset-0 bg-cover bg-center transition duration-100 scale-100 group-hover:scale-105"
                                            style="background-image: url(@asset('/images/placeholder.png')">
                                        </div>
                                    @endif

                                </div>
                                <div class="p-4 lg:p-8">
                                    <h3 class="text-center md:text-left">
                                        @title
                                    </h3>
                                    <p class="text-center md:text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Amet
                                        voluptatibus
                                        modi optio, similique debitis omnis!</p>
                                </div>
                            </a>
                        </li>



--}}
