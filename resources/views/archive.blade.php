@extends('layouts.app')

@section('content')
<script>
  console.log('views/archive.blade.php')
</script>
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-'.get_post_type().'', 'partials.content'])
  @endwhile
@endsection
