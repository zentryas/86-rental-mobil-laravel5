@extends('layouts.frontend')
@section('title','Selamat Datang di 86Rentcar Yogyakarta')
@section('content')

<!--== Slider Area Start ==-->
<div id="prevBanner" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#prevBanner" data-slide-to="0" class="active"></li>
        <li data-target="#prevBanner" data-slide-to="1"></li>
        <li data-target="#prevBanner" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('frontend/img/slider/slider-1.jpg') }}" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/img/slider/slider-2.jpg') }}" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontend/img/slider/slider-3.jpg') }}" class="d-block" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#prevBanner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#prevBanner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--== Slider Area End ==-->

<!--== Our Services Start ==-->
<div class="container mt-3 mb-5">
    <div class="row">
        <!-- Section Title Start -->
        <div class="col-lg-12 mt-5">
            <div class="section-title  text-center">
                <h2>Mengapa memilih kami?</h2>
                <p>Alasan mengapa anda memilih sewa mobil di 86Rentcar Yogyakarta</p>
            </div>
        </div>
        <!-- Section Title End -->
    </div>
    <div class="row" data-aos="zoom-in-up" data-aos-duration="300">
        <div class="col-lg-4 col-4">
            <div class="service-1">
                <span class="service-1-icon">
                    <span> <i class="fa fa-key"></i> </span>
                </span>
                <div class="service-1-contents">
                <h3>Lepas Kunci</h3>
                <p class="display-sm">Kami menyediakan layanan sewa mobil lepas kunci. Untuk mendukung fleksibilitas Anda saat bepergian</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="service-1">
                <span class="service-1-icon">
                    <span> <i class="fa fa-cog"></i> </span>
                </span>
                <div class="service-1-contents">
                    <h3>Matic & Manual Harga Sama</h3>
                    <p class="display-sm">86Rentcar Yogyakarta menyediakan unit mobil dengan jenis transmisi matic dan manual dengan tarif sewa sama</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="service-1">
                <span class="service-1-icon">
                    <span> <i class="fa fa-money"></i> </span>
                </span>
                <div class="service-1-contents">
                <h3>30% Biaya Booking</h3>
                <p class="display-sm">Booking mobil hanya 30% dari total biaya sewa, selanjutnya pelunasan di garasi, mudah dan murah kan</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Our Services End ==-->

<!--== Preview Mobil Area Start ==-->
<div class="container"> 
    <div class="col-lg-12">
        @if(count($mobil))
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12 mt-3">
                <div class="section-title  text-center">
                    <h2>Preview Unit Mobil</h2>
                    <p>Sesuaikan kebutuhan rental mobil anda, hanya di 86Rentcar Yogyakarta</p>
                </div>
            </div>
            <!-- Section Title End -->
            @foreach($mobil->take(4) as $mb)
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-popular-car">
                        <div class="p-car-thumbnails">
                            <a class="car-hover" href="{{ $mb->getimg1() }}">
                                <img src="{{ $mb->getimg1() }}" alt="JSOFT">
                            </a>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center nama">
                                    <a href="#" class="text-center">{{ $mb->nama_mobil }}</a>
                                </div>
                            </div>
                        </div>
    
                        <div class="container mb-3">
                            <div class="row">
                                <div class="col-lg-12 text-center paket pt-3">
                                    <a href="">Lepas Kunci Rp. {{number_format($mb->tarif_mobil)}}/Hari</a> <br>
                                    <a href="">Plus Sopir Rp. {{number_format($mb->tarif_mobil+$mb->tarif_sopir)}}/Hari</a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="p-car-content">
                            @if($mb->status_mobil == "0")
                                <span class="text-danger" disabled> <i class="fa fa-exclamation"></i> Tidak Tersedia</span>
                            @elseif($mb->status_mobil == "1")
                                <a href="booking/{{$mb->id}}" class="genric-btn medium danger-border circle">Booking</a>
                            @endif 
                            <a href="/{{ $mb->id }}" data-toggle="modal" data-target="#lihat{{$mb->id}}" class="genric-btn medium info-border circle">Detail</a>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="lihat{{$mb->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header pophead">
                                        <h3 class="modal-title" id="exampleModalLabel">Detail Mobil {{ $mb->nama_mobil }} </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Nomor Polisi</td>
                                                <td>:</td>
                                                <td>{{ $mb->nopol }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Transmisi</td>
                                                <td>:</td>
                                                <td>{{ $mb->transmisi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah tempat duduk</td>
                                                <td>:</td>
                                                <td>{{ $mb->seat }} seat</td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Keluaran</td>
                                                <td>:</td>
                                                <td>{{ $mb->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tipe Bahan Bakar</td>
                                                <td>:</td>
                                                <td>{{ $mb->bb }}</td>
                                            </tr>
                                        </table>    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle"></i> Maaf! Mobil belum tersedia. Terimakasih
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <a href="/daftar-mobil" class="btn btn-primary">Selengkapnya <i class="fa fa-arrow-circle-right"></i> </a>
        </div>
    </div>

</div>
<!--== Preview Mobil Area End ==-->

<!--== Tentang Area Start ==-->
<div id="tentang" class="container-fluid mt-5" style="background-image: linear-gradient(to left, rgba(0,0,0,0.1), rgb(0,0,0.6)),url({{ asset('frontend/img/home.jpg')}}); background-size: cover; height: 100%;">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-5 bg-transparent text-white">
                <div class="card-body text-justify">
                <p>
                    <span class="ml-5">Kami</span> telah berada di dunia Transportasi khususnya Sewa Mobil di Yogyakarta sejak tahun 2012, pengalaman kami di bidang Sewa Mobil telah mendarah daging sejak awal didirikan
                    Kami telah melayani berbagai jenis customer dari anak anak muda hingga Instansi besar, Kami tidak pernah tebang pilih dalam melayani customer Kami, kepuasan dan kenyamanan Anda adalah salah satu Prioritas Kami
                    </p>
                    <p>Atas dasar inilah Kami mengukuhkan diri sebagai Perusahaan Sewa Mobil dengan Pelayanan yang lebih baik dari para kompetitor Kami
                    Kami menjamin kepuasan Anda saat menggunakan jasa Kami dengan berbagai Layanan Unggulan dan Kemudahan yang Kami tawarkan Kepada Anda</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Tentang Area End ==-->

@stop
