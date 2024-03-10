@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Mobil Booking Detail')
@section('content')
<!--== Banner Area Start ==-->
<!-- <div class="container-fluid mt-5">
    <div class="row">
        <img src="{{ asset('frontend/img/banner/detail-booking.jpg')}}" class="banner" alt="...">
    </div>
</div> -->
<!--== Banner Area End ==-->

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5 mb-3">
            <div class="how-it-works d-flex">
                <div class="step1">
                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                    <span class="caption">Login </span>
                </div>
                <div class="step1">
                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                    <span class="caption">Pilih Mobil</span>
                </div>
                <div class="step2">
                    <span class="number"><span><i class="fa fa-refresh"></i></span></span>
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
        </div>

        <div class="col-md-12">
            <form action="/booking/{{$mobil->id}}/detail/create" method="post">
                @csrf
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <h5 class="mb-2">Detail Booking</h5>
                                <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i> PETUNJUK BOOKING <br>
                                    <ol>
                                        <li>Cek kembali booking mobil anda.</li>
                                        <li>Pelunasan biaya sewa dilakukan di Garasi 86Rentcar Yogyakarta yang beralamatkan di Jl. Tegal Melati No.59B, Jongkang, Sariharjo, Kec. Ngaglik, Kab. Sleman</li>
                                        <li>Silahkan klik tombol lanjutkan booking untuk menuju halaman pembayaran.</li>
                                        <li>Biaya pelunasan sebesar <span class="text-danger">Rp. {{ number_format($kekurangan) }}</span> </li>
                                    </ol>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="mobil_id" value="{{ $mobil->id }}" required>
                                            <tr>
                                                <th>Kode Booking</th>
                                                <td>:</td>
                                                <td>{{ $data['kode_booking'] }}</td>
                                                <input type="hidden" name="kode_booking" value="{{$data['kode_booking']}}">
                                                
                                                <th>Tanggal Booking</th>
                                                <td> : </td>
                                                <td>{{ $tanggal->format('d M Y')}}</td>
                                                <input type="hidden" name="tgl_booking" value="{{$tanggal}}" required>
                                            </tr>

                                            <tr>
                                                <th>Tanggal Mulai Sewa</th>
                                                <td> : </td>
                                                <td>{{ $tgl_mulai->format('d M Y') }}</td>
                                                <input type="hidden" name="tgl_mulai" value="{{$data['tgl_mulai']}}" required>

                                                <th>Tanggal Selesai Sewa</th>
                                                <td> : </td>
                                                <td>{{ $tgl_selesai->format('d M Y') }}</td>
                                                <input type="hidden" name="tgl_selesai" value="{{ $tgl_selesai }}" required>
                                            </tr>

                                            <tr>
                                                <th>Jam Mulai Sewa</th>
                                                <td> : </td>
                                                <td>{{ $tgl_mulai->format('H:i A') }}</td>
                                                <input type="hidden" name="tgl_mulai" value="{{$data['tgl_mulai']}}" required>

                                                <th>Jam Selesai Sewa</th>
                                                <td> : </td>
                                                <td>{{ $tgl_selesai->format('H:i A') }}</td>
                                                <input type="hidden" name="tgl_selesai" value="{{ $tgl_selesai }}" required>
                                            </tr>

                                            <tr>
                                                <th>Paket Sewa</th>
                                                <td> : </td>
                                                <td>
                                                    @if($data['paket'] == "0")
                                                        Lepas Kunci
                                                    @elseif($data['paket'] == "1")
                                                        Plus Sopir
                                                    @endif
                                                </td>
                                                <input type="hidden" name="paket" value="{{ $data['paket'] }}" required>

                                                <th>Tarif Sopir</th>
                                                <td> : </td>
                                                <td>
                                                    @if($data['paket'] == "0")
                                                        Rp. 0
                                                    @elseif($data['paket'] == "1")
                                                        Rp. {{ number_format($jml_sopir) }}
                                                    @endif
                                                </td>
                                            </tr> 
                                            
                                            <tr>
                                                <th>Durasi</th>
                                                <td> : </td>
                                                <td>{{ $data['durasi'] }} Hari</td>
                                                <input type="hidden" name="durasi" value="{{ $data['durasi'] }}" required>

                                                <th>Tarif Mobil {{ $data['durasi'] }} Hari</th>
                                                <td> : </td>
                                                <td>Rp. {{ number_format($jml_mobil) }}</td>
                                            </tr>                            
                                    
                                            <tr>
                                                <th>Total Bayar</th>
                                                <td> : </td>
                                                <td>Rp. {{ number_format($jml_bayar) }}</td>
                                                <input type="hidden" name="jml_bayar" value="{{ $jml_bayar }}" required>

                                                <th>Dp Minimum</th>
                                                <td> : </td>
                                                <td>Rp. {{ number_format($dp) }}</td>
                                                <input type="hidden" name="jml_dp" value="{{ $dp }}" required>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="container mb-5">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary text-center">Lanjutkan Booking <i class="fa fa-arrow-right"></i> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop