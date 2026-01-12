<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
    </style>
    {{-- <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
    </style> --}}
</head>


<body @php(body_class())>
    @php(wp_body_open())

    <div id="app" class="">

        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content') }}
        </a>

        @include('sections.header')
        @php($pts = ['story', 'companion-content', 'activity'])
        <main id="main" class="main min-h-[80vh] ">
            @yield('content')



        </main>

        @hasSection('sidebar')
            <aside class="sidebar">
                @yield('sidebar')
            </aside>
        @endif

        @include('partials.login-button')
        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
