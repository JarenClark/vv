<form role="search" method="get" class="search-form  w-full" action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>

    <input
    class="rounded-md border focus:border-blue bg-transparent py-1 px-4 w-full"
      type="search"
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>

  {{-- <button class="border rounded-[10px] px-4 py-2 font-medium">{{ _x('Search', 'submit button', 'sage') }}</button> --}}
</form>
