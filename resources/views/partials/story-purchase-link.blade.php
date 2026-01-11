@if (get_field('purchase_link', $story_id))
<x-button-link link="{!! get_field('purchase_link', $story_id) !!}" target="_blank" classes="flex space-x-2 items-center bg-blue-main hover:bg-blue-dark text-white">
	           
				    <span>
                Purchase Here
            </span>
            <span class="block w-3 h-3">
                @include('icons.external-link', ['class' => 'w-3 h-3'])
            </span>

</x-button-link>

    <p class="hidden post-author text-sm text-center ">
        <a target="_blank" class="hover:text-blue flex items-center space-x-1" href="{!! get_field('purchase_link', $story_id) !!}">
            <span>
                Purchase Here
            </span>
            <span class="block w-3 h-3">
                @include('icons.external-link', ['class' => 'w-3 h-3'])
            </span>
*
        </a>
    </p>
@endif
