@php($post_id = get_the_ID())
@if (!isset($delay))
    @php($delay = 0)
@endif



<li class="flex flex-col justify-between bg-lightgrey p-2.5 mx-0 mt-0 mb-0 leading-6 border border-solid  border-neutral-200  hover:border hover:border-solid hover:border-gray-200  rounded-[30px] transition duration-300 ease-in-out "
    data-aos="fade-up" data-aos-delay="{!! ($delay % 4) * 50 !!}" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;">
    <div>
        <div class="overflow-hidden mb-6 rounded-[10px] bg-white">
            <a href="@permalink"
                class="bg-transparent relative rounded-[10px] cursor-pointer transition duration-300  ease-in-out w-full aspect-video block  overflow-hidden group">
                @if (has_post_thumbnail($post_id))
                    <div class="transition duration-300 absolute inset-0 bg-cover bg-center scale-100 group-hover:scale-105"
                        style="background-image: url(@thumbnail('large', false))"></div>
                @else
                    <div class="transition duration-300 absolute inset-0 bg-cover bg-center scale-100 group-hover:scale-105 flex items-center justify-center"
                        style="background-image: url(@asset('/images/placeholder.png')))">
                        @include('icons.tpa-logo')
                    </div>
                @endif
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/75 opacity-100 group-hover:opacity-0 transition duration-300">
                </div>
            </a>
        </div>
        <div class=" text-zinc-600">
            <h4
                class="p-0 mx-0 mt-0 mb-2 font-sans text-2xl font-bold xl:text-2xl text-blue-dark hover:text-blue-main transition duration-300 ease-in-out leading-[1.2]">
                <a href="@permalink" class=" leading-7 bg-transparent cursor-pointer">@title</a>
            </h4>
            <ul class="flex">
                @php($virtues = get_the_terms($post_id, 'virtue'))
                @foreach ($virtues as $virtue)
                    <li class="rounded-full border text-blue-main border-blue-main py-0.5 px-2 text-xs mr-1 mb-1">
                        {{ $virtue->name }}
                    </li>
                @endforeach
                @php($levels = get_the_terms($post_id, 'grade-level'))
                @foreach ($levels as $level)
                    <li class="rounded-full border text-blue-main border-blue-main py-0.5 px-2 text-xs mr-1 mb-1">
                        {!! $level->name !!}
                    </li>
                @endforeach
            </ul>
            <ul class="mt-2 mb-8">
                @php(
    $activities = new WP_Query([
        'post_type' => 'activity',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'story',
                'value' => $post_id,
            ],
        ]
    ])
)
                @php(
    $companion_content = new WP_Query([
        'post_type' => 'companion-content',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'story',
                'value' => $post_id,
            ],
        ]
    ])
)
                @if ($activities->found_posts > 0 && 1 > 2)
                    <li class="flex items-center  justify-between space-x-2">
                        <div>
                            Activity;
                        </div>
                        <div class="w-3 h-3 {!! $activities->found_posts > 0 ? 'text-green-500' : 'text-red-500' !!}">
                            @includeWhen($activities->found_posts > 0, 'icons.circle-check', [
                                'classes' => 'w-4 h-4',
                            ])
                            @includeWhen($activities->found_posts == 0, 'icons.circle-x', [
                                'classes' => 'w-4 h-4',
                            ])
                        </div>
                    </li>
                @endif

            </ul>
            {{-- <div class="p-0 mx-0 mt-0 mb-4 font-sans text-sm font-normal text-stone-500">
                @excerpt()
            </div> --}}


        </div>

    </div>
	@if($companion_content->found_posts > 0)
	<div class="p-0 m-0 mt-auto mb-2">
		@foreach($companion_content->posts as $cc)
		@if($loop->first)
		<a href="@permalink($cc)"
		   class="block hover:bg-blue-main hover:text-white py-3 px-2 m-0 text-sm font-medium leading-none text-center bg-white rounded-[10px] border border-gray-200 border-solid cursor-pointer text-neutral-500 bg-opacity-[0.1] transition duration-300 ease-in-out hover:bg-opacity-100">
			Guiding Questions</a>
		@endif
		@endforeach
	</div>
	@endif
	
    <div class="p-0 m-0 {!! $companion_content->found_posts > 0 ? null : 'mt-auto'!!}">
        <a href="@permalink"
            class="block hover:bg-blue-main text-white py-3 px-2 m-0 text-sm font-medium leading-none text-center bg-blue-main rounded-[10px] border border-gray-200 border-solid cursor-pointer text-neutral-500 bg-opacity-75 transition duration-300 ease-in-out hover:bg-opacity-100">
            Story</a>
    </div>
</li>
