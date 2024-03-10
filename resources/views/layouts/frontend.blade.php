
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
     <!--=== Favicon ===-->
     <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico')}}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('frontend/css/aos.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!-- Datetime -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <!-- PENJADWALAN -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body>
    <!-- loader -->
    <div class="preloader">
        <div class="loading">
            <img src="{{ asset('frontend/img/logo.png')}}" width="100%">
        </div>
    </div>

    <div id="app">
        {{-- header --}}
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center pt-2">
                        <img src="{{ asset('frontend/img/logo.png') }}" class="logo" alt="">
                    </div>
                    <div class="col-md-3 pt-2"></div>
                    <div class="col-md-3 pt-2">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="{{ asset('frontend/img/mail.png') }}" alt="Mail" width="50">
                              <div class="media-body">
                                <h5 class="mt-0 mb-1">FOR SUPPORT MAIL US :</h5>
                                jogja86rencar@gmail.com
                              </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 pt-2">
                        <ul class="list-unstyled">
                            <li class="media">
                              <img class="mr-3" src="{{ asset('frontend/img/call.png') }}" alt="Call" width="50">
                              <div class="media-body">
                                <h5 class="mt-0 mb-1">FOR SERVICES CALL US:</h5>
                                +62-853-2911-1919
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- navbar --}}
        <nav class="navbar navbar-expand-md" style="background-color: black">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                   
                </a>
                <button type="button" class="btn btn-outline-secondary text-white navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="/" class="nav-link text-white">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a href="/daftar-mobil" class="nav-link text-white">DAFTAR MOBIL</a>
                        </li>
                        <li class="nav-item">
                            <a href="/syarat-&-ketentuan" class="nav-link text-white">SYARAT & KETENTUAN </a>
                        </li>
                        <li class="nav-item">
                            <a href="/reservasi" class="nav-link text-white">CARA BOOKING </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-outline-secondary text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle-o"></i> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <i class="fa fa-sign-in"></i> Login
                                    </a>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <i class="fa fa-user-plus"></i> Register
                                    </a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-outline-secondary text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle-o"></i> {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        <i class="fa fa-user-circle"></i> Akun
                                    </a>
                                    <a class="dropdown-item" href="/riwayat-transaksi">
                                    <?php
                                        $transaksi = \App\Payment::where('user_id', Auth::user()->id)->get();
                                    ?>
                                        <i class="fa fa-folder-open-o"></i> Riwayat Transaksi <span class="badge badge-danger badge-pill">{{ $transaksi->count() }}</span>
                                    </a>
                                    <a class="dropdown-item" href="/users/logout">
                                        <i class="fa fa-sign-out"></i> Keluar
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <div class="sticky-new">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hubungi CS Kami">
                <a href="https://api.whatsapp.com/send?phone=6281391114224" target="_blank">
                    <img src="{{ asset('frontend/img/wa.png')}}" alt="" class="w-100">
                </a>
            </span>
        </div>

        <!--== Scroll Top Area Start ==-->
        <div class="backTop">
            <img src="{{asset('frontend')}}/img/top.png" alt="JSOFT">
        </div>
        <!--== Scroll Top Area End ==-->

        <!-- Footer Widget Start -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-footer-widget">
                            <h2>86Rentcar Yogyakarta</h2>
                                <div class="widget-body">
                                <ul class="get-touch">
                                    <li> <a href="/">Home</a> </li>
                                    <li> <a href="/daftar-mobil">Daftar Mobil</a> </li>
                                    <li> <a href="/syarat-&-ketentuan">Syarat & Ketentuan</a> </li>
                                    {{-- <li> <a href="#faq">FAQ</a> </li> --}}
                                    <li> <a href="#tentang">Tentang</a> </li>
                                    <li> <a href="/reservasi">Reservasi</a> </li>
                                    {{-- <li> <a href="/tarif-PPN">Tarif Pajak Bank</a> </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-footer-widget">
                            <h2>Call Center</h2>
                            <div class="widget-body">
                                <ul class="get-touch">
                                    <li>Customer Services WhatsApp</li>
                                    <li><i class="fa fa-whatsapp"></i> CS 1 : +6285329111919</li>
                                    <li><i class="fa fa-whatsapp"></i> CS 2 : +6281391114224</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="single-footer-widget">
                            <h2>Alamat Kami</h2>
                            <div class="widget-body">
                                <ul class="get-touch">
                                    <li><i class="fa fa-map-marker"></i> Jl. Tegal Melati No.59B, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia</li>
                                    <li><a href="https://www.google.com/maps/place/86+Rentcar/@-7.7480615,110.3715556,15z/data=!4m2!3m1!1s0x0:0xcd425618591bdd18?sa=X&ved=2ahUKEwitpKKEgfTpAhVLmqQKHfO1DJoQ_BIwGHoECA8QCw" class="btn btn-warning btn-sm mt-2" target="_blank"><i class="fa fa-paper-plane"></i>  Lihat Lokasi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->
                </div>
            </div>
        </div>
        <!-- Footer Widget End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <hr style="border: 0.1px solid;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 86Rentcar Yogyakarta
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <!-- <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script> -->
    
    <!-- Scripts Datetimepicker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- get tanggal dan jam -->
    <script type="text/javascript">
        $(function () {
            $('#datetime').datetimepicker({
                minDate: new Date().setHours(0,0,0,0),
            });
        });
    </script>
    
    <!-- SweeatAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    @yield('jadwal')

</body>
</html>
