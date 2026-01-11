@extends('layouts.app')

@section('content')
    <script>
        console.log('views/archive-story.blade.php')
    </script>
    <x-hero></x-hero>
    <section class="bg-blue-50 py-20">
        <div class="container">
            <ul class="mt-6 grid grid-cols-2 md:grid-cols-3  gap-6">
                @posts
                    @include('partials.story-card')
                @endposts
            </ul>
        </div>
    </section>

    {{-- @while (have_posts())
        @php(the_post())
        @include('partials.story-card')
        @includeFirst(['partials.content-' . get_post_type() . '', 'partials.content'])
    @endwhile --}}
@endsection
