{{-- Single Story Content --}}

@include('partials.vv-hero')
@if (pmpro_hasMembershipLevel([1, 2, 3]))
    @include('partials.vv-content')
@else
    <div class="container max-w-[48rem]">
        @include('partials.login-or-join')
    </div>
@endif

@include('partials.vv-linked-content')
@include('partials.vv-more')



