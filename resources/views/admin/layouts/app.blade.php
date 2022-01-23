<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('public/favicon.png')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('links')
    <title>Gravity Education :: Admin | @yield('title')</title>

    <script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


    <script type="text/javascript" async src="https://example.com/mathjax/MathJax.js?config=MML_CHTML"></script>

</head>
<body>
    <div class="dashboard-main-wrapper">
       @yield('headers')
       @yield('sidebar')
        <div class="dashboard-wrapper">
            @yield('content')
            @yield('footer')
        </div>
    </div>
    @yield('script')
</body>
</html>
