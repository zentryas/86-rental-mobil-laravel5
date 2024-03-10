@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Mobil Booking')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="how-it-works d-flex mt-3">
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
                    <span class="caption">Booking</span>
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
        </div>

        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                <i class="fa fa-info-circle"></i> Informasi <br>
                <span>Sebelum menentukan tanggal mulai sewa, sangat disarankan untuk melihat jadwal mobil terlebih dahulu <a href="#" class="text-danger" data-toggle="modal" data-target="#lihatJadwal"> Klik disini</a> </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src=" {{ $mobils->getimg1() }}" alt="Image" width="80%">
                            <table class="table table-sm mt-2 text-primary">
                                <h5>{{ $mobils->nama_mobil }}, {{ $mobils->nopol }}</h5>
                                <tr>
                                    <td>Paket Sewa Lepas Kunci</td>
                                    <td>Rp. {{ number_format($mobils->tarif_mobil) }}</td>
                                </tr>
                                <tr>
                                    <td>Paket Sewa Plus Sopir</td>
                                    <td>Rp. {{ number_format($mobils->tarif_mobil+$mobils->tarif_sopir) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6">
                            <form action="/booking/{{$mobils->id}}/detail" method="post">
                                @csrf
                                <input type="hidden" name="mobil_id" value="{{ $mobils->id }}">
                                <div class="form-group">
                                    <label for="">Kode Booking</label>
                                    <input type="text" name="kode_booking" class="form-control" id="" aria-describedby="" value="B-{{ rand() }}" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal dan Jam Mulai</label>
                                            <div class="input-group date" data-target-input="nearest">
                                                <input id="datetime" type="text" name="tgl_mulai" class="form-control @if($errors->has('tgl_mulai')) is-invalid @endif datetimepicker-input" data-target="#datetime" autocomplete="off">
                                                <div class="input-group-append" data-target="#datetime" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @if($errors->has('tgl_mulai'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('tgl_mulai')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Durasi (Hari)</label>
                                            <input type="number" name="durasi" class="form-control @if($errors->has('durasi')) is-invalid @endif" id="durasi">
                                            @if($errors->has('durasi'))
                                                <div class="invalid-feedback">
                                                    {{$errors->first('durasi')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <label for="">Paket Sewa</label>
                                        @if( totalSopir() <= "0")
                                            <span class="text-danger" style="font-size: 10px;">Maaf! Sopir tidak tersedia</span>
                                        @elseif( totalSopir() >= "1")
                                            <span class="text-success" style="font-size: 10px;">Paket Plus Sopir tersedia</span>
                                        @endif
                                    <select name="paket" class="form-control @if($errors->has('durasi')) is-invalid @endif" id="">
                                        <option value="">-- Pilih Paket Sewa --</option>
                                            @if( totalSopir() <= "0")
                                                <option value="1" disabled>Plus Sopir</option>
                                            @elseif( totalSopir() >= "1")
                                                <option value="1">Plus Sopir</option>
                                            @endif
                                        <option value="0">Lepas Kunci</option>
                                    </select>
                                    @if($errors->has('paket'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('paket')}}
                                        </div>
                                    @endif
                                </div>

                                <button id="cek" type="submit" class="btn btn-warning btn-block"><i class="fa fa-check"></i> Lanjutkan </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function (){
        $('#durasi').change(function(){
            let date    = $('#datetime').val();
            let durasi  = $('#durasi').val();
            // console.log(durasi);
            $.ajax({
            url: '/cek/mobil',
            type: 'GET',
            data: {
                data :{date,durasi},
                mobil_id : '{{ Request::segment(2) }}'
            },
            success: function(msg) {
                console.log(msg);
                if(msg.data == 1)
                {
                    swal("Bisa disewa!", "Mobil tersedia di jam dan tanggal tersebut!", "success");
                    var btn = document.getElementById('cek').removeAttribute('disabled','disabled');
                }else{
                    swal("Oops!", "Mobil tidak tersedia di jam dan tanggal tersebut!", "warning");
                    var btn = document.getElementById('cek').setAttribute('disabled','disabled');
                    
                }
            },
            error: function(msg) {
                console.log(msg);
                // swal("ERORR!", "Mobil tidak tersedia di jam dan tanggal tersebut!", "error");
            }
            });
        });
    })
</script>

<!-- Modal -->
<div class="modal fade" id="lihatJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Jadwal Mobil {{ $mobils->nama_mobil }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info-circle"></i> INFO STATUS BOOKING <br>
                            <ol>
                                <li>Apabila kalender booking mobil belum muncul, Klik Tombol <span class="btn btn-light btn-sm">today</span></li>
                            </ol>
                        </div>
                        {!! $booking_detail->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection 
@section('jadwal')
    <!-- Penjadwalan -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $booking_detail->script() !!}
@stop