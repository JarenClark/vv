@extends('layouts.app')

@section('content')
<script>
  console.log('views/single.blade.php')
</script>
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile
@endsection
