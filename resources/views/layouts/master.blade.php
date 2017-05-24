<!DOCTYPE html>
<html {{ language_attributes() }} prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="{{ get_bloginfo('charset') }}">
        <meta name="description" content="{{ get_bloginfo('description') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{ get_the_title() }}</title>

        <link rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="{{ get_template_directory_uri() }}/assets/style.css">

        {{ wp_head() }}
    </head>
    <body>

        {{-- Header --}}
        <header class="header layout-header">
            <a href="{{ home_url('/') }}">
                <h1 class="header-logo">{{ bloginfo('name') }}</h1>
            </a>
        </header>

        {{-- Content --}}
        <div class="layout-container">
            @yield('content')
        </div>

        {{-- Footer --}}
        @include('includes.footer')

        @include('includes.scrolltop')

        {{-- Scripts --}}
        <script src="{{ get_template_directory_uri() }}/assets/app.js"></script>
        {{ wp_footer() }}

    </body>
</html>
