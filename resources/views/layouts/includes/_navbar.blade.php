<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
            <?php
                $booking = \App\Booking::where('status_booking', "Sewa")->get();
            ?>
            <a class="nav-link" data-toggle="dropdown" href="/admin/booking/sewa">
                <i class="far fa-bell text-success"></i>
                <span class="badge badge-success navbar-badge">{{ $booking->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header text-success">{{ $booking->count() }} Booking melunasi DP</span>
                <div class="dropdown-divider"></div>
                @foreach($booking as $notif)
                <a href="/admin/booking/pengambilan" class="dropdown-item">
                    <i class="fas fa-info-circle mr-2 text-success"></i> {{ $notif->kode_booking }}
                    <span class="float-right text-muted text-sm">{{ $notif->created_at->diffForHumans() }}</span>
                </a>
                @endforeach
            </div>
        </li>
        <li class="nav-item dropdown">
            <?php
                $booking = \App\Booking::where('status_booking', "Booking")->get();
            ?>
            <a class="nav-link" data-toggle="dropdown" href="/admin/booking">
                <i class="far fa-bell text-danger"></i>
                <span class="badge badge-warning navbar-badge">{{ $booking->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ $booking->count() }} Booking Mobil</span>
                <div class="dropdown-divider"></div>
                @foreach($booking as $notif)
                <a href="/admin/booking" class="dropdown-item">
                    <i class="fas fa-info-circle mr-2"></i> {{ $notif->kode_booking }}
                    <span class="float-right text-muted text-sm">{{ $notif->created_at->diffForHumans() }}</span>
                </a>
                @endforeach
            </div>
        </li>
        <li class="nav-item dropdown ml-5">
            <a href="#" id="navbarDropdown" class="btn btn-outline-secondary btn-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{asset('frontend')}}/img/favicon.ico" width="20px"> {{ Auth::user()->name }}<span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/admin/profile">
                    <i class="fa fa-user"></i> My Profile
                </a>

                <a class="dropdown-item" href="/admin/logout">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>

            </div>
        </li>
    </ul>
</nav>