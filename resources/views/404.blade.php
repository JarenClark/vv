@extends('layouts.app')

@section('content')
  <x-hero text="404<br/>Page Not Found"></x-hero>
  <script>
    console.log('views/404.blade.php')
  </script>
  @if (! have_posts())
  <div class="container py-20">

    <p class="text-center lg:text-lg mb-16">
      Sorry, but the page you are trying to view does not exist.
    </p>
    {{-- <x-alert type="warning">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
    </x-alert> --}}

    {!! get_search_form(false) !!}
  </div>
  @endif
@endsection
