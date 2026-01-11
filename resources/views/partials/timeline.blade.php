<section>
    <div class="container py-20">
        @foreach ($timeline as $event)
        <li class="-translate-x-[1px]">
            <a href="{!! get_term_link($virtue->term_id) !!}"
                class="translate-y-0 hover:-translate-y-1 group flex flex-col justify-end abcrounded-[20px] relative visible  pt-8  mx-0 mt-0 mb-6 leading-6 bg-transparent  border border-gray-200 border-solid cursor-pointer  hover:border-blue-900">
                <div class="px-8 flex flex-col justify-center items-center">
                    <div class=" cursor-pointer">
                        <span
                            class=" rounded-[10px] inline-flex items-center justify-center p-0 mx-0 mt-0 mb-6 w-10 h-10 leading-10 text-center bg-lightblue text-blue-900">
                            
                        </span>
                    </div>
                    <h3 class="text-2xl">
                        {!! $virtue->name !!}
                    </h3>
                </div>

                <div
                    class="border-t mt-8 px-8 py-4 group-hover:border-t-bottle-green bg-white group-hover:bg-blue-dark group-hover:text-white">
                    <p class="text-center font-sans text-lg font-normal cursor-pointer transition duration-300">
                        {!! $story_count !!} {!! $story_count == 1 ? 'Story' : 'Stories' !!}
                    </p>
                </div>

            </a>
        </li>
        @endforeach
    </div>
</section>