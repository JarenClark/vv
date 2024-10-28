@extends('layouts.app')

@section('content')
    <script>
        console.log('views/search.blade.php')
    </script>
    <x-hero text="Search Results for: '{{ get_search_query() }}'"></x-hero>
    @if (!have_posts())
        <div class="container py-8 lg:py-20 flex flex-col items-center justify-center">
            <h2 class="text-center mb-4">Sorry, no results were found</h2>

            {!! get_search_form(false) !!}
        </div>
    @endif
    <div class="container py-20">
        <ul class="space-y-4 max-w-2xl">
            @while (have_posts())
                @php(the_post())
                <li>
                    @include('partials.content-search')
                </li>
            @endwhile
        </ul>
    </div>


    {!! get_the_posts_navigation() !!}
    @include('sections.pre-footer')
@endsection
