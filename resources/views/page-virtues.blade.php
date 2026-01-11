@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        <script>
            console.log('views/page-virtues.blade.php')
        </script>

        <x-hero></x-hero>
        @includeFirst(['partials.content-page', 'partials.content'])
        @include('partials.virtue-listing')
    @endwhile
@endsection
