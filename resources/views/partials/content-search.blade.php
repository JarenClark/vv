@php($excerpt = get_field('content', get_the_ID()) ? get_field('content', get_the_ID()) : get_the_excerpt())
@php($excerpt = wp_trim_words($excerpt, 25, '...'))
<article @php(post_class())>
    @php($post_id = get_the_ID())

    <div class=" rounded-[10px] lg:rounded-[30px] border hover:shadow-2xl p-4 lg:p-8">
        <header>
            <div class="flex justify-between mb-4">
                <h3 class="entry-title hover:text-blue-main text-blue-dark">
                    <a href="{{ get_permalink() }}">
                        {!! $title !!}
                    </a>
                </h3>
                {{--  post type --}}
                @php($labels = get_post_type_labels(get_post_type_object(get_post_type($post_id))))
                @if($labels->singular_name)
                <div class="h-fit border rounded-full border-blue-main py-1 px-2 text-sm text-blue-main">
                    {!! $labels->singular_name !!}
                </div>
                @endif
                
            </div>

            {{-- @if (get_post_type() == 'story')
                <ul class="mt-2 mb-4 flex items-center space-x-2 text-sm">
                    @if(has_term('','virtue', $post_id))
                    @php($virtue = get_the_terms($post_id, 'virtue')[0])
                    <li>
                        <a href="{!! get_term_link($virtue) !!}" class=" hover:bg-blue-main hover:text-white px-3 py-1 border border-blue-main text-blue-main rounded-[10px]">
                            @term('virtue', get_the_ID())
                        </a>
                    </li>
                    @if(has_term('','grade-level', $post_id))
                    @php($level = get_the_terms($post_id, 'grade-level')[0])
                    <li>
                        <a href="{!! get_term_link($virtue) !!}?level={!! $level->slug !!}" class="hover:bg-blue-main hover:text-white rounded-[10px] px-3 py-1 border border-blue-main text-blue-main">
                            @term('grade-level', get_the_ID())
                        </a>
                    </li>
                    @endif
                    @endif


                </ul>
            @endif --}}
            <a href="{{ get_permalink() }}" class="block mb-4">
                <div class='hover:text-blue-main'>{!! $excerpt !!}</div>

            </a>
            
            {{-- @includeWhen(get_post_type() === 'post', 'partials.entry-meta') --}}
        </header>
        
        <ul class="flex items-center space-x-2 mt-6">
            <li>
                <a href="@permalink" class="group flex space-x-1 rounded-[10px]  text-sm">
                    <x-label>Read More</x-label>
                </a>
            </li>
            
        </ul>


        
        {{-- <div class="entry-summary">
            @php(the_excerpt())
        </div> --}}
    </div>
</article>
