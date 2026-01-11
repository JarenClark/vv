@extends('layouts.app')

@section('content')

    <x-hero></x-hero>
    <section class="py-20">

        <div class="container">
            @query([
                'taxonomy' => 'virtue',
                'posts_per_page' => -1,
            ])
            @hasposts
                <ul class="grid grid-cols-2 md:grid-cols-3 gap-6">

                    @posts
                        @php($post_id = get_the_ID())
                        <li class=''>
                            <a href="@permalink" class="p-4 rounded-2xl flex flex-col items-center text-center card bg-white  hover:shadow-2xl !shadow-[0_0.25rem_1.75rem_rgba(30,34,40,0.07)]">
                                <h3>
                                    @title
                                </h3>
                                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptatibus modi optio, similique debitis omnis!</p>
                            </a>
                        </li>
                    @endposts
                </ul>
            @endhasposts
        </div>
    </section>
    <script>
        console.log('views/taxonomy-grade-level.blade.php')
    </script>
@endsection
