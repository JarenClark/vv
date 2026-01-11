@extends('layouts.app')

@section('content')
    <x-hero text="Blog"></x-hero>

    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $perpage = get_option('posts_per_page');
    
    $args = [
        'post_type' => get_post_type(),
        'posts_per_page' => $perpage,
        'paged' => $paged,
    ];
    
    $posts = get_posts($args);
    $total_post_count = wp_count_posts();
    ?>

    <section>
        <div class="container py-8 lg:py-20">

            @if (count($posts) > 0)
                <?php $idx = 0; ?>
                <ul class="min-h-[300px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($posts as $post)
                        <li class="flex flex-col justify-between bg-lightgrey p-2.5 mx-0 mt-0 mb-0 leading-6 border border-solid  border-neutral-200  hover:border hover:border-solid hover:border-gray-200  rounded-[30px] transition duration-300 ease-in-out "
                            data-aos="fade-up" data-aos-delay="{!! ($idx % 4) * 50 !!}"
                            style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;">
                            <div class="mb-8">
                                <div class="overflow-hidden mb-6 rounded-[10px] bg-white">
                                    <a href="{!! get_the_permalink($post->ID) !!}"
                                        class="bg-transparent relative rounded-[10px] cursor-pointer transition duration-300  ease-in-out w-full aspect-video block  overflow-hidden group">
                                        @if (has_post_thumbnail($post->ID))
                                            <div class="transition duration-300 absolute inset-0 bg-cover bg-center scale-100 group-hover:scale-105"
                                                style="background-image: url(@thumbnail($post->ID, 'large', false))"></div>
                                        @else
                                            <div class="transition duration-300 absolute inset-0 bg-cover bg-center scale-100 group-hover:scale-105 flex items-center justify-center"
                                                style="background-image: url(@asset('/images/placeholder.png')))">
                                                @include('icons.tpa-logo')
                                            </div>
                                        @endif
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-blue-900/75 opacity-100 group-hover:opacity-0 transition duration-300">
                                        </div>
                                    </a>
                                </div>
                                <div class=" text-zinc-600">
                                    <h4
                                        class="p-0 mx-0 mt-0 mb-2 font-sans text-2xl font-bold xl:text-2xl text-blue-dark hover:text-blue-main transition duration-300 ease-in-out leading-[1.2]">
                                        <a href="{!! get_the_permalink($post->ID) !!}"
                                            class=" leading-7 bg-transparent cursor-pointer">{!! get_the_title($post->ID) !!}</a>
                                    </h4>
                                    @php($virtues = get_the_terms($post->ID, 'virtue'))
                                    @if ($virtues)
                                        <ul class="flex">

                                            @foreach ($virtues as $virtue)
                                                <li
                                                    class="rounded-full border text-blue-main border-blue-main py-0.5 px-2 text-xs mr-1 mb-1">
                                                    {{ $virtue->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                            </div>

                            <div class="p-0 m-0 mt-auto">
                                <a href="{!! get_the_permalink($post->ID) !!}"
                                    class="block hover:bg-blue-main hover:text-white py-3 px-2 m-0 text-sm font-medium leading-none text-center bg-white rounded-[10px] border border-gray-200 border-solid cursor-pointer text-neutral-500 bg-opacity-[0.1] transition duration-300 ease-in-out hover:bg-opacity-100">
                                    Read More</a>
                            </div>
                        </li>
                        <?php $idx++; ?>
                    @endforeach
                </ul>
            @endif
            <!-- pagination-->
            @if ($total_post_count->publish > $perpage)
                <div class="my-8 flex justify-center items-center space-x-2">
                    @include('partials.post-pagination', [
                        'paged' => $paged,
                        'per_page' => $perpage,
                        'total_post_count' => $total_post_count,
                    ])
                </div>
            @endif
        </div>
    </section>

    <script>
        console.log('views/home.blade.php')
    </script>
@endsection
