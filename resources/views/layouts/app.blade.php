<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gravity Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/favicon.png')}}">
    <title>@yield('title','Gravity Education')</title>

    <script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


    <script type="text/javascript" async src="https://example.com/mathjax/MathJax.js?config=MML_CHTML"></script>

@yield('style')
@yield('links') 

</head>

<body>
 
    @yield('header') 
    @yield('body')
    @yield('footer')

@yield('scripts')    
</body>

</html>
