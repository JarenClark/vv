@query([
    'post_type' => 'story',
    'posts_per_page' => 3,
])

@hasposts
    <section class="py-20 bg-blue-grey">

        <div class="container max-w-[1200px]">
            <div class=" w-full flex-[0_0_auto]  max-w-full">
                <div class="flex items-end justify-between mb-8">
                    <h2 class="my-0 font-sans text-5xl font-semibold text-left ">
                        Latest Stories
                    </h2>
                    <x-button-link link="/virtues" classes="border border-blue-900 text-blue-900 bg-transparent hover:bg-blue-dark hover:text-white">Explore All Virtues</x-button-link>

                </div>

            </div>
@php($idx = 0)
            <ul class="mt-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 md:gap-2 lg:gap-6">
                @posts
                    @include('partials.story-card',['delay' => $idx])
                    @php($idx++)
                @endposts
            </ul>
        </div>
    </section>
@endhasposts
