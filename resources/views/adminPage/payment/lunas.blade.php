@extends('layouts.backend')
@section('title','Informasi Pembayaran DP | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h5 class="m-0 text-dark"> <i class="fa fa-info-circle"></i> Informasi Pembayaran DP</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Data Pembayaran</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-body">
        <table class="table table-hover" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Mobil</th>
                    <th>Nopol</th>
                    <th>Nama Customer</th>
                    <th>Jumlah DP</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
            @endphp
            @foreach ($bayar as $pay)                                    
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$pay->booking->kode_booking}}</td>
                    <td><img src="{{ $pay->booking->mobil->getimg1()}}" alt="" width="80px"></td>
                    <td>{{ $pay->booking->mobil->nopol}}</td>
                    <td>{{$pay->user->name}} {{$pay->user->nama_belakang}}</td>
                    <td>Rp. {{number_format($pay->dp)}}</td>
                    <td>
                        @if( $pay->status == 'pending')
                            <span class="badge badge-warning">{{ $pay->status }}</span>
                        @elseif( $pay->status == 'success')
                            <span class="badge badge-success">Sudah dibayar</span>
                        @elseif( $pay->status == 'failed')
                            <span class="badge badge-danger">{{ $pay->status }}</span>
                        @elseif( $pay->status == 'expired')
                            <span class="badge badge-danger">{{ $pay->status }}</span>
                        @endif
                    </td>
                </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</section> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Form Tambah Data Merek</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/merek/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('nama_merek') ? 'has-error' : ''}}">
                        <label for="">Nama merek</label>
                        <input type="text" name="nama_merek" class="form-control" id="" aria-describedby="" placeholder="Masukan Nama merek" value="{{old('nama_merek')}}">
                        @if($errors->has('nama_merek'))
                        <span class="help-block">{{$errors->first('nama_merek')}}</span>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop