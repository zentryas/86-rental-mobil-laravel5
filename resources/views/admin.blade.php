@extends('layouts.backend')
@section('title','Dashboard | 86Rentcar Yogyakarta')
@section('content')
<style>
    .fc-title {
    color: #fff;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">            
            <div class="col-md-12">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail Menu</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Jadwal Pembookingan</a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-lg-3">
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{totalUser()}}</h3>

                                        <p>Customer</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                    <a href="/admin/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                    <h3>{{totalMerek()}}</h3>

                                    <p>Merek</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-help-buoy"></i>
                                    </div>
                                    <a href="/admin/merek" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                    <h3>{{totalMobil()}}</h3>

                                    <p>Mobil</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-model-s"></i>
                                    </div>
                                    <a href="/admin/mobil" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                    <h3>{{totalBooking()}}</h3>

                                    <p>Booking</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-archive"></i>
                                    </div>
                                    <a href="/admin/booking" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                    <h3>{{totalPayment()}}</h3>

                                    <p>Pembayaran</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-card"></i>
                                    </div>
                                    <a href="/admin/payment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                    <h3>{{totalSopir()}}</h3>

                                    <p>Sopir</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-android-contacts"></i>
                                    </div>
                                    <a href="/admin/sopir" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Note:</h5>
                                    <ol style="font-size: 14px;">
                                        <li>Jika pada kode booking terdapat status "Booking" berarti transaksi tersebut belum membayar biaya DP</li>
                                        <li>Jika pada kode booking terdapat status "Booking" kemungkinan dibatalkan oleh sistem secara otomatis apabila melewati batas waktu pembayaran yang sudah ditentukan</li>
                                        <li>jika pada kode booking terdapat status "Sewa" berarti transaksi tersebut sudah melunasi biaya DP</li>
                                    </ol>
                                </div>
                                {!! $booking_detail->calendar() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('jadwal')
<!-- Penjadwalan -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $booking_detail->script() !!}
@stop
