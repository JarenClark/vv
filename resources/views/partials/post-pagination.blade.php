@php
    // Extract count if $total_post_count is an object (from wp_count_posts())
    if (is_object($total_post_count)) {
        $total_count = isset($total_post_count->publish) ? (int) $total_post_count->publish : 0;
    } else {
        $total_count = (int) $total_post_count;
    }
    
    // Ensure $per_page is valid and not zero
    $per_page = max(1, (int) $per_page);
    
    // Ensure $paged is valid
    $paged = max(1, (int) $paged);
    
    // Calculate total pages
    $total_pages = $total_count > 0 ? ceil($total_count / $per_page) : 0;
    
    // Ensure $paged doesn't exceed total pages
    $paged = min($paged, max(1, $total_pages));
    
    // Get base URL for pagination links - use WordPress functions
    $base_url = get_pagenum_link(1, false);
    
    // Helper function to get page URL
    $get_page_url = function($page_num) use ($base_url) {
        return get_pagenum_link($page_num, false);
    };
    
    // Calculate page range to show
    $show_pages = 5; // Number of page numbers to show
    $half = floor($show_pages / 2);
    $start_page = max(1, $paged - $half);
    $end_page = min($total_pages, $paged + $half);
    
    // Adjust if we're near the start or end
    if ($end_page - $start_page < $show_pages - 1) {
        if ($start_page == 1) {
            $end_page = min($total_pages, $start_page + $show_pages - 1);
        } else {
            $start_page = max(1, $end_page - $show_pages + 1);
        }
    }
@endphp

@if ($total_pages > 1)
    <nav class="flex justify-center items-center space-x-2 my-8" aria-label="Pagination">
        {{-- Previous Button --}}
        @if ($paged > 1)
            <a 
                href="{{ $get_page_url($paged - 1) }}" 
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                aria-label="Previous page"
            >
                Previous
            </a>
        @else
            <span 
                class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed"
                aria-disabled="true"
            >
                Previous
            </span>
        @endif

        {{-- Page Numbers --}}
        @if ($total_pages <= 10)
            {{-- Show all pages if 10 or fewer --}}
            @for ($i = 1; $i <= $total_pages; $i++)
                @if ($i == $paged)
                    <span 
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-main border border-blue-main rounded-md"
                        aria-current="page"
                    >
                        {{ $i }}
                    </span>
                @else
                    <a 
                        href="{{ $get_page_url($i) }}" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                        aria-label="Go to page {{ $i }}"
                    >
                        {{ $i }}
                    </a>
                @endif
            @endfor
        @else
            {{-- Show first page --}}
            @if ($start_page > 1)
                <a 
                    href="{{ $get_page_url(1) }}" 
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                    aria-label="Go to page 1"
                >
                    1
                </a>
                @if ($start_page > 2)
                    <span class="px-2 text-gray-500">...</span>
                @endif
            @endif

            {{-- Show page range --}}
            @for ($i = $start_page; $i <= $end_page; $i++)
                @if ($i == $paged)
                    <span 
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-main border border-blue-main rounded-md"
                        aria-current="page"
                    >
                        {{ $i }}
                    </span>
                @else
                    <a 
                        href="{{ $get_page_url($i) }}" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                        aria-label="Go to page {{ $i }}"
                    >
                        {{ $i }}
                    </a>
                @endif
            @endfor

            {{-- Show last page --}}
            @if ($end_page < $total_pages)
                @if ($end_page < $total_pages - 1)
                    <span class="px-2 text-gray-500">...</span>
                @endif
                <a 
                    href="{{ $get_page_url($total_pages) }}" 
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                    aria-label="Go to page {{ $total_pages }}"
                >
                    {{ $total_pages }}
                </a>
            @endif
        @endif

        {{-- Next Button --}}
        @if ($paged < $total_pages)
            <a 
                href="{{ $get_page_url($paged + 1) }}" 
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                aria-label="Next page"
            >
                Next
            </a>
        @else
            <span 
                class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed"
                aria-disabled="true"
            >
                Next
            </span>
        @endif
    </nav>
@endif

