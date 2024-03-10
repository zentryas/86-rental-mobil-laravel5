@extends('layouts.backend')
@section('title','Transaksi Sewa | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Transaksi Sewa</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Transaksi Sewa</li>
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
                    <th>Tgl & Jam Mulai</th>
                    <th>Durasi</th>
                    <th>Bayar DP</th>
                    <th>Pelunasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
            @endphp
            @foreach ($booking as $bk)                                    
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $bk->kode_booking }}</td>
                    <td><img src="{{ $bk->mobil->getimg1()}}" alt="" width="80px"></td>
                    <td>{{ date("d F Y H:i A", strtotime($bk->tgl_mulai)) }}</td>
                    <td>{{ $bk->durasi }} hari</td>
                    <td><span class="badge badge-success">Lunas</span></td>
                    <td>
                        @if($bk->status_pelunasan == "Lunas")
                            <span class="badge badge-success">Lunas</span>
                        @elseif($bk->status_pelunasan == "Belum Lunas")
                            <span class="badge badge-danger">Belum Lunas</span>
                        @endif
                    </td>
                    <td>
                        
                        <div class="btn-group">
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihat{{$bk->id}}"> <i class="fa fa-eye"></i></a>
                            <!-- Modal View -->
                            <div class="modal fade" id="lihat{{$bk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="invoice p-3 mb-3">
                                                <!-- title row -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>
                                                            <img src="{{ asset('/backend/img/crew.png')}}" width="20%">
                                                            <small class="float-right" style="font-size: 16px;">Tanggal booking: {{ date("d F Y", strtotime($bk->tgl_booking)) }}</small>
                                                        </h4>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- info row -->
                                                
                                                <div class="row invoice-info">
                                                    <div class="col-sm-4 invoice-col">
                                                        Identitas Customer
                                                        <address>
                                                            <strong>{{ $bk->user->name }}, {{ $bk->user->nama_belakang }}</strong><br>
                                                            {{ $bk->user->alamat }}<br>
                                                            Phone: {{ $bk->user->nomor_hp }}<br>
                                                            Email: {{ $bk->user->email }}
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        Data mobil
                                                        <address>
                                                            <strong>{{ $bk->mobil->nama_mobil }}</strong><br>
                                                                Nopol: {{ $bk->mobil->nopol }}<br>
                                                                Jenis Transmisi: {{ $bk->mobil->transmisi }}<br>
                                                                Jumlah Seat: {{ $bk->mobil->seat }} seat<br>
                                                            Bahan bakar: {{ $bk->mobil->bb }}
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        <br>
                                                        <img src="{{ $bk->mobil->getimg1()}}" alt="" class="w-100">
                                                    </div>
                                                    <!-- /.col -->
                                                  </div>
                                                <!-- /.row -->
    
                                                <!-- Table row -->
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode Booking</th>
                                                                    <th>Paket Sewa</th>
                                                                    <th>Biaya DP</th>
                                                                    <th>Biaya Pelunasan</th>
                                                                    <th>Total Biaya</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $bk->kode_booking }}</td>
                                                                    <td>
                                                                        @if($bk->paket == "0")
                                                                            Lepas Kunci
                                                                        @elseif($bk->paket == "1")
                                                                            Plus Sopir
                                                                        @endif
                                                                    </td>
                                                                    <td>Rp. {{ number_format($bk->jml_dp) }}</td>
                                                                    <td>Rp. {{ number_format($bk->jml_bayar-$bk->jml_dp) }}</td>
                                                                    <td>Rp. {{ number_format($bk->jml_bayar) }}</td>
                                                                </tr>
                                    
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if($bk->status_pelunasan == "Lunas")
                                <a href="/admin/booking/print/{{ $bk->id }}" class="btn btn-light btn-sm" target="_blank"> <i class="fas fa-print"></i> Print</a>
                            @elseif($bk->status_pelunasan == "Belum Lunas")
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ambil{{$bk->id}}"><i class="fa fa-level-up-alt"></i> Ambil</a>
                                <!-- Modal Ambil-->
                                <div class="modal fade" id="ambil{{$bk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title" id="exampleModalLabel">Pengambilan Unit Booking {{ $bk->kode_booking }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/booking/{{$bk->id}}/updateStatus" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="">Status Pelunasan</label>
                                                        <select name="status_pelunasan" class="form-control @if($errors->has('status_pelunasan')) is-invalid @endif">
                                                            <option value="">--Pilih Status Pelunasan --</option>
                                                            <option value="Belum Lunas" @if($bk->status_pelunasan == 'Belum Lunas') selected @endif>Belum Lunas</option>
                                                            <option value="Lunas" @if($bk->status_pelunasan == 'Lunas') selected @endif>Lunas</option>
                                                        </select>
                                                        @if($errors->has('status_pelunasan'))
                                                            <div class="invalid-feedback">
                                                                {{$errors->first('status_pelunasan')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-check"></i> Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#kembali{{$bk->id}}"><i class="fa fa-level-down-alt"></i> Kembali</a>
                            <!-- Modal Kembali-->
                            <div class="modal fade" id="kembali{{$bk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="exampleModalLabel">Pengembalian Unit Booking {{ $bk->kode_booking }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/booking/{{$bk->id}}/update" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                                <div class="form-group">
                                                    <label for="">Status Transaksi</label>
                                                    <select name="status_booking" class="form-control @if($errors->has('status_booking')) is-invalid @endif">
                                                        <option value="Sewa" @if($bk->status_booking == 'Sewa') selected @endif>Sewa</>
                                                        <option value="Selesai" @if($bk->status_booking == 'Selesai') selected @endif>Selesai</option>
                                                    </select>
                                                    @if($errors->has('status_booking'))
                                                        <div class="invalid-feedback">
                                                            {{$errors->first('status_booking')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-check mt-2 mb-2">
                                                    <input name="tgl_kembali" class="form-check-input @if($errors->has('tgl_kembali')) is-invalid @endif" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Hitung Keterlambatan Waktu
                                                    </label>
                                                    @if($errors->has('tgl_kembali'))
                                                        <div class="invalid-feedback">
                                                            {{$errors->first('tgl_kembali')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-check"></i> Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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

@stop