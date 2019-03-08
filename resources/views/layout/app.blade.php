<!DOCTYPE html>
<html style="background-color: #ffffff;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>IBPH/GRÁFICOS</title>
    <meta name="description" content="Instituto Brasileiro da Performance Humana">
    <link rel="stylesheet" href="{{ asset('assets/wheel/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/Company-desc---img-on-right.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/divider-text-middle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/Features-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/Footer-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/Highlight-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/ibph.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/Registration-Form-with-Photo.css') }}">    
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/Swipe-Slider-6.css') }}">-->
    <link rel="stylesheet" href="{{ asset('assets/wheel/css/styles.css') }}">

    @yield('css') 
    
</head>

    
    <body class="text-dark">
        
        @yield('content')

    </body>

    <script src="{{ asset('assets/wheel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/wheel/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/wheel/js/chart.js') }}"></script>
    <script src="{{ asset('assets/wheel/js/roda-1.js') }}"></script>
    <script src="{{ asset('assets/wheel/js/roda-2.js') }}"></script>
    <script src="{{ asset('assets/wheel/js/roda-3.js') }}"></script>
    <script src="{{ asset('assets/wheel/js/Swipe-Slider-6.js') }}"></script>
    
    @yield('script') 

</html>
