@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @php(the_content())
        <script>
            console.log('views/front-page.blade.php')
        </script>
    @endwhile
@endsection
