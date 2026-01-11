{{-- Single Story Content --}}
{{-- Hero --}}
@php($story_id = null)
@php($virtue = null)
@php($grade_level = null)
@php($labels = get_post_type_labels(get_post_type_object(get_post_type())))

@if (get_post_type() == 'story')
    @php($story_id = get_the_ID())
@elseif(get_field('story', get_the_ID()) != null)
    @php($story_id = get_field('story', get_the_ID())->ID)
@endif
@if ($story_id)
    @php($virtue = get_the_terms($story_id, 'virtue')[0])
    @php($grade_level = get_the_terms($story_id, 'grade-level')[0])
@endif

{{-- <x-hero label="{!! $labels->singular_name ?? null !!}"></x-hero> --}}

<section class="py-20 relative lg:pt-32 ">
    <style>
        .order-1 {
            order: 1;
        }

        .order-2 {
            order: 2;
        }

        @media (min-width: 1024px) {
            .lg\:order-1 {
                order: 1;
            }

            ..lg\:order-2 {
                order: 2;
            }
        }
    </style>
    <div class="container mt-8 lg:mt-0 mx-auto max-w-[1200px] relative md:bg-lightgrey ">
        {{-- <div class="grid grid-cols-1 lg:grid-cols-4">
            <div class="col-span-1"></div>
            <div class="col-span-1 lg:col-span-3 lg:px-8">
                <h1 class="h2 my-4">@title</h1>
            </div>
        </div> --}}
        <div class="grid grid-cols-1  lg:grid-cols-4 gap-6">


            <div class="col-span-1 order-2 lg:order-1">

                {{-- Search Bar --}}
                <div class="bg-white md:p-4 hidden lg:block rounded-[10px] md:border  mb-4">
                    {!! get_search_form(false) !!}
                </div>

                {{-- Virtue Listing --}}
                <div class="bg-white md:p-4 hidden lg:block lg:rounded-[10px] md:border  mb-4">
                    <h4 class="mb-2">Virtues</h4>
                    @php($all_virtues = get_terms(['taxonomy' => 'virtue', 'hide_empty' => false]))
                    <ul class="space-y-1 text-sm">
                        @foreach ($all_virtues as $v)
                            <li class="hover:text-blue ">
                                <a href="{!! get_term_link($v->term_id) !!}" class="">
                                    {!! $v->name !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{--  Stories in this virtue category --}}
                @if ($virtue)
                    @query([
                        'post_type' => 'story',
                        'posts_per_page' => 4,
                        'post__not_in' => [$story_id],
                        'tax_query' => [
                            [
                                'taxonomy' => 'virtue',
                                'field' => 'slug',
                                'terms' => $virtue->slug,
                            ],
                            [
                                'taxonomy' => 'grade-level',
                                'field' => 'slug',
                                'terms' => $grade_level->slug,
                            ],
                        ],
                    ])
                    @hasposts
                        <div class="bg-white md:p-4 rounded-[10px] md:border  mb-4">
                            <h4>{{-- !! get_post_type() == 'story' ? 'Other ' : null !! --}}More @term('virtue') Stories</h4>
                            <ul class="my-2 space-y-2">
                                @posts
                                    <li class="flex space-x-2">
                                        <a href="@permalink" class="flex space-x-2 text-sm">
                                            <div class="h-8 aspect-video rounded-sm overflow-hidden">
                                                <img src="@thumbnail(false)" alt="">
                                            </div>
                                            <p>@title</p>
                                        </a>
                                    </li>
                                @endposts
                            </ul>
                        </div>
                    @endhasposts
                @endif

                {{--  Activities in this virtue category --}}
                @if ($virtue)
                    @query([
                        'post_type' => 'activity',
                        'posts_per_page' => 4,
                        'post__not_in' => [$story_id, get_the_ID()],
                        'tax_query' => [
                            [
                                'taxonomy' => 'virtue',
                                'field' => 'slug',
                                'terms' => $virtue->slug,
                            ],
                            [
                                'taxonomy' => 'grade-level',
                                'field' => 'slug',
                                'terms' => $grade_level->slug,
                            ],
                        ],
                    ])
                    @hasposts
                        <div class="bg-white md:p-4 rounded-[10px] md:border  mb-4">
                            <h4>More @term('virtue') Activities</h4>
                            <ul class="my-2 space-y-2">
                                @posts
                                    <li class="flex space-x-2">
                                        <a href="@permalink" class="flex space-x-2 text-sm">
                                            <p>@title</p>
                                        </a>
                                    </li>
                                @endposts
                            </ul>
                        </div>
                    @endhasposts
                @endif
                {{-- <div class="sticky top-16 grid grid-cols-1 gap-6">

                </div> --}}

            </div>

            <div class="col-span-1 lg:col-span-3 order-1 lg:order-2">
@if(pmpro_hasMembershipLevel([1, 2, 3]))


@shortcode("[block_save_as_pdf_pdfcrowd \
    output_name='".get_the_title()."_".get_post_type().".pdf' \
    button_text='Download just this section as PDF' \
    page_size='letter' \
    button_background_color='green' \
    button_alignment='left']
<div>
    save this as pdf?
</div>
[/block_save_as_pdf_pdfcrowd]")

@endif

                <div class="lg:p-8 md:p-4 rounded-[10px] md:border  bg-white">
                    <div class="flex flex-col md:flex-row justify-between lg:mt-4 mb-2">
                        <h1 class="h2 mb-0">@title</h1>
                        @if ($story_id)
                        @include('partials.story-subnav', ['story_id' => $story_id])

                        @endif
                    </div>


                    @if ($story_id)
                        @include('partials.story-info', ['story_id' => $story_id])

                        @if (get_field('purchase_link', $story_id))
                            <p class="mb-4">Support the author. <a target="_blank" class="text-blue-main underline"
                                    href="{!! get_field('purchase_link', $story_id) !!}">Purchase here</a></p>
                        @endif
                    @elseif(get_field('resource', get_the_ID()))
                        <div>
                            <a href="{!! esc_attr(get_field('resource', get_the_ID())) !!}" target="_blank" class="flex items-center space-x-2">
                                <h4>View Resource</h4>
                                <span>@include('icons.external-link')</span>
                            </a>

                        </div>
                    @endif
                    {{-- <div class="my-4 border"></div> --}}
                    {!! $slot !!}
					@if (pmpro_hasMembershipLevel([1, 2, 3]))
						<div class="mt-8">
							@shortcode('[save_as_pdf_pdfcrowd]')
						</div>
					@endif
                </div>
            </div>
        </div>

    </div>
</section>


{{-- @if (1 > 2 && $story_id)

    @php($p = get_the_date('Y-m-d H:i:s', $story_id))
    @query([
        'post_type' => 'story',
        'posts_per_page' => 3,
        'post__not_in' => [$story_id],
        // 'orderby' => 'date',
        // 'order' => 'DESC',
        // 'date_query' => [
        //     [
        //         'before' => get_the_date('Y-m-d H:i:s', $story_id),
        //     ],
        // ],
        'tax_query' => [
            [
                'taxonomy' => 'virtue',
                'field' => 'slug',
                'terms' => $virtue->slug,
            ],
            [
                'taxonomy' => 'grade-level',
                'field' => 'slug',
                'terms' => $grade_level->slug,
            ],
        ],
    ])
    @hasposts
        <section class=" py-20 bg-white border-t">
            <div class="container">

                <div class="flex justify-between">
                    <h2>More @term('virtue', $story_id) Stories</h2>
                    <x-button-link link="{!! get_term_link($virtue->term_id) !!}">View All</x-button-link>
                </div>
                <ul class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6">

                    @posts
                        @include('partials.story-card')
                    @endposts
                </ul>
            </div>
        </section>
    @endhasposts
@endif --}}
