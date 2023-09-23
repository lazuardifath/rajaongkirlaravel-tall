<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @include('partials.styles')
        @livewireStyles
        @livewireScripts
    </head>
    <body class="flex flex-col min-h-screen bg-gray-900 dark:bg-gray-900 text-black dark:text-white">
        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')

        @include('partials.scripts')
    </body>
    <body>

    </body>
</html>
