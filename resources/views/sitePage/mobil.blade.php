@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Daftar Mobil')
@section('content')
<!--== Car List Area Start ==-->
<section id="car-list-area" class="mt-5">
    <div class="container bg-link">
        <div class="row">
            <div class="col-md-12 mt-5">
                @guest 
                <div class="how-it-works d-flex mt-3">
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Login </span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Pilih Mobil</span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Booking Detail</span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Pembayaran</span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Selesai</span>
                    </div>
                </div>
                @else
                <div class="how-it-works d-flex mt-3">
                    <div class="step1">
                        <span class="number"><span><i class="fa fa-check"></i></span></span>
                        <span class="caption">Login </span>
                    </div>
                    <div class="step2">
                        <span class="number"><span><i class="fa fa-refresh"></i></span></span>
                        <span class="caption">Pilih Mobil</span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Booking Detail</span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Pembayaran</span>
                    </div>
                    <div class="step">
                        <span class="number"><span><i class="fa fa-times"></i></span></span>
                        <span class="caption">Selesai</span>
                    </div>
                </div>
                @endguest
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 adab mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-widget search-widget">
                        <h4 class="title">Cari Mobil</h4>
                            <form action="/daftar-mobil-cari" method="GET" class="example" style="margin:auto;max-width:300px">
                                <input name="cari" type="text" placeholder="Avanza">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>								
                        </div>
                    </div>
                        
                    <div class="col-md-12">
                        <div class="single-widget category-widget display-sm">
                            <h4 class="title">{{ $mobilManual->count() }} Transmisi Manual</h4>
                            <ul>
                                @foreach($mobilManual as $manual)
                                <li><a href="booking/{{$manual->id}}"  class="justify-content-between align-items-center d-flex"><h6>{{ $manual->nama_mobil}}</h6> <span>{{ $manual->nopol}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="single-widget category-widget display-sm">
                            <h4 class="title">{{ $mobilMatic->count() }} Transmisi Matic</h4>
                            <ul>
                                @foreach($mobilMatic as $matic)
                                <li><a href="booking/{{$matic->id}}"  class="justify-content-between align-items-center d-flex"><h6>{{ $matic->nama_mobil}}</h6> <span>{{ $matic->nopol}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Area End -->

            <div class="col-lg-9 mt-5">
                @if(count($mobil))
                <div class="row">
                    @foreach($mobil as $mb)
                        <div class="col-lg-4 col-md-4 col-12">
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
            </div>
        </div>
    </div>
</section>
<!--== Car List Area End ==-->

<!--== Testimoni Area Start ==-->
<div class="container-fluid pt-5 pb-5">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12 pt-5">
                <div class="section-title text-center">
                    <h2>Testimoni Customer</h2>
                    <p>Testimoni customer mengenai layanan sewa mobil di 86Rentcar Yogyakarta</p>
                </div>
            </div>
            <!-- Section Title End -->
        </div>
        <div id="carouselTestimoni" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($testi->take(5) as $tes)
                <div class="carousel-item @if($loop->first) active @endif">
                    <div class="container">
                        <div class="row justify-content-center text-primary">
                            <div class="col-lg-7">
                                <div class="card mt-4" style="border-radius: 1%;">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="media mb-2">
                                                @if($tes->user->jenis_kelamin == "1")
                                                    <img src="{{asset('frontend/img/profile/male.png')}}" class="mr-3 display-sm" alt="..." width="32px">
                                                @elseif($tes->user->jenis_kelamin == "0")
                                                    <img src="{{asset('frontend/img/profile/female.png')}}" class="mr-3 display-sm" alt="..." width="32px">
                                                @endif
                                                <div class="media-body">
                                                        <h5 class="mt-0">{{ $tes->user->name }} {{ $tes->user->nama_belakang }}</h5>
                                                        {{ $tes->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center text-center">
                                                <i class="fa fa-quote-left"></i> <p class="mt-1" style="font-size: 22px;">{{$tes->testimoni}}</p> <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--== Testimoni Area End ==-->

@stop