@php($virtues = get_terms(['taxonomy' => 'virtue', 'hide_empty' => true]))
<section>
    <div class="container max-w-[1200px] py-8 lg:py-20">
        <ul class="mt-6 grid grid-cols-2 md:grid-cols-3  gap-4 ">
            @foreach ($virtues as $virtue)
            <?php
            $tagline = get_field('tagline', $virtue->taxonomy . '_' . $virtue->term_id);
            $args = [
                'post_type' => 'story',
                'tax_query' => [
                    [
                        'taxonomy' => 'virtue',
                        'field' => 'slug',
                        'terms' => $virtue->slug,
                    ],
                ],
            ];
            $postTypes = new WP_Query($args);
            $story_count = $postTypes->found_posts;
            ?>
            <div class="">
                <a href="{!! get_term_link($virtue->term_id) !!}"
                    class="transition duration-300 h-full rounded-[10px] lg:rounded-[30px] pt-16 bg-gradient-to-br border border-blue-50 hover:border-blue-dark group abcbg-blue-600 abchover:bg-blue-main  flex flex-col justify-between p-4 pb-8">
                    <div>
                        <h3 class=" mb-0">{!! $virtue->name !!}</h3>
                        <p class="text-grey-500">{!! $tagline !!}</p>
                    </div>
                    <div class="text-grey-500 mt-8 group-hover:text-blue-900 flex items-center space-x-2">
                        
                        <span class="transition duration-300">{!! $story_count !!} Stories</span>
                        <span class="group-hover:translate-x-2 translate-x-0 transition-translate duration-300">
                            @include('icons.arrow-right')
                        </span>
                    </div>
                  
                </a>
            </div>
            @endforeach
        </ul>
    </div>
</section>
