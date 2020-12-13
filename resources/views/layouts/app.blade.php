<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('partials.favicon')
    @include('partials.fonts')
    @include('partials.css')

</head>
<body>
    <div class="main-wrapper">
		<div class="horizontal-menu">
           @include('partials.topnav')
            @guest
            
            @else
            @include('partials.subnav')
            @endguest

        </div>
            <!-- partial -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- breadcrumb here -->
                @include('partials.alerts')
                @yield('content')

            </div>
        </div>
    </div>
    @include('partials.javascripts')
     @yield('custom_scripts')
</body>
</html>
