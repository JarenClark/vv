@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <script>
    console.log('views/page.blade.php')
  </script>
    @if (!is_front_page())
    <x-hero />
    @endif
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
@endsection
