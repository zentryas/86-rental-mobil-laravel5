@extends('layouts.backend')
@section('title','Data Laporan Per Mobil | 86Rentcar Yogyakarta')
@section('content')

@if(!isset($_GET['type']))
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Laporan Transaksi Selesai Permobil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Laporan Transaksi Selesai Permobil</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-body">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai" placeholder="Start Date">
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" placeholder="End Date">
                    </div>
                    <div class="col-md-4" style="display: none !important;">
                        <label for="">Tentukan Status</label>
                        <select name="type" class="form-control">
                            <!-- <option value="all">All</option>
                            <option value="booking">Booking</option>
                            <option value="sewa">Sewa</option> -->
                            <option value="selesai" selected>Selesai</option>
                            <!-- <option value="batal">Batal</option> -->
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>  

@else

<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Laporan Transaksi  {{ $data['tgl_mulai'] }} sampai {{ $data['tgl_selesai'] }} dengan status ' {{ $data['type'] }} '</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Laporan Transaksi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Tgl & Jam Mulai </th>
                        <th>Nama</th>
                        <th>Mobil</th>
                        <th>Durasi</th>
                        <th>Tgl Kembali</th>
                        <th>Denda</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $row)
                    <tr>
                        <td>{{ $row['kode_booking'] }}</td>
                        <td>{{ date("d F Y H:i A", strtotime($row['tgl_mulai'])) }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['nama_mobil'] }}</td>
                        <td>{{ $row['durasi'] }} hari</td>
                        <td>{{ date("d F Y H:i A", strtotime($row['tgl_kembali'])) }}</td>
                        <td>Rp. {{number_format($row['denda']) }}</td>
                        <td>Rp. {{number_format($row['jml_bayar']) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="btn-group mb-3">
        <a href="/admin/laporan/PDF/{{$data['tgl_mulai']}}/{{$data['tgl_selesai']}}/{{$data['type']}}" class="btn btn-danger"> <i class="fas fa-book"></i> PDF</a>
        <a href="/admin/laporan/print/{{$data['tgl_mulai']}}/{{$data['tgl_selesai']}}/{{$data['type']}}" class="btn btn-secondary" target="_blank"> <i class="fas fa-print"></i> Print</a>
    </div>
        
</section>
@endif
@stop