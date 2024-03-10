<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- Fonts Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <!-- loader -->
    <div class="preloader">
        <div class="loading">
            <img src="{{ asset('frontend/img/logo.png')}}" width="100%">
        </div>
    </div>
    <section class="section">
        <div class="container mt-3">
            <div class="row">
                <!-- MAIN -->
                @yield('content')
                <!-- END MAIN -->                    
            </div>
        </div>
    </section>
</div>

<!-- Scripts Js -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- SweeatAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

<script>
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('fa-eye');
            $(this).find('i').removeClass('fa-eye-slash');
            showPass = 0;
        }
        
    });
    $(document).ready(function () {
    $(".preloader").fadeOut();
});
</script>

</body>
</html>