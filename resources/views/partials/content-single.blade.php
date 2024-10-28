<article @php(post_class('h-entry'))>
 <x-hero></x-hero>

  <div class="e-content container mb-8">
    @php(the_content())
  </div>

  @if ($pagination)
    <footer>
      <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
      </nav>
    </footer>
  @endif
<div class="container ">
  @php(comments_template())

</div>
</article>
