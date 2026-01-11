{{-- Single Activity Content --}}
@include('partials.vv-hero')
@if (pmpro_hasMembershipLevel([1, 2, 3]))


    @if (pmpro_hasMembershipLevel(['Premium']))
        <div class="mb-8">
            @shortcode("[save_as_pdf_pdfcrowd output_name='Values_and_Virtues_" . get_the_title() . '_' . get_post_type() . ".pdf']")
        </div>
    @else
        <div class="mb-8 flex justify-center">
            <x-button-link link="/membership-levels/" classes="bg-blue-dark/30 hover:bg-blue-dark text-white">
                <div class="flex space-x-1">
                    @include('icons.lock')
                    <span>Upgrade to "Premium" to download as PDF</span>
                </div>
            </x-button-link>
        </div>
    @endif
    @include('partials.vv-content')
@else
    <div class="container max-w-[48rem]">
        @include('partials.login-or-join')
    </div>

@endif
@include('partials.vv-linked-content')
@include('partials.vv-more')
