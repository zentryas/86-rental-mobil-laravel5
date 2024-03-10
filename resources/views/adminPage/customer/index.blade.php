@extends('layouts.backend')
@section('title','Data Customer | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Data Customer</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Data Customer</li>
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
                    <th>Nama</th>
                    <th>Alamat Email</th>
                    <th>Status Aktivasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
            @endphp
            @foreach ($data_customer as $customer)                                    
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
                        @if($customer->active == "0")
                            <span class="badge badge-danger">Non Activated</span>
                        @elseif($customer->active == "1")
                            <span class="badge badge-success">Activated</span>
                        @endif           
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="/{{ $customer->id }}" data-toggle="modal" data-target="#lihat{{$customer->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                
                            <!-- Modal -->
                            <div class="modal fade" id="lihat{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-light">
                                            <label class="modal-title" id="exampleModalLabel"> <i class="fa fa-info-circle"></i> Info Lainnya</label>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th> Nama Lengkap</th>
                                                        <td>:</td>
                                                        <td>{{ $customer->name }} {{ $customer->nama_belakang }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat Email</th>
                                                        <td>:</td>
                                                        <td>{{ $customer->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Hp</th>
                                                        <td>:</td>
                                                        <td>{{ $customer->nomor_hp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <td>:</td>
                                                        <td>
                                                        @if($customer->jenis_kelamin == 1)
                                                            Laki-laki
                                                        @elseif($customer->jenis_kelamin == 0)
                                                            Perempuan
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Agama</th>
                                                        <td>:</td>
                                                        <td>{{ $customer->agama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td>:</td>
                                                        <td>{{ $customer->alamat }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-danger btn-sm delete" 
                            customer-id="{{$customer->id}}"
                            customer-nama="{{$customer->name}}">                        
                            <i class="fa fa-trash"></i></a>
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

@section('sweetAlert')
    <script type="text/javascript">
        $('.delete').click(function()
        {
            var id = $(this).attr('customer-id');
            var nama = $(this).attr('customer-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data customer "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/customer/"+id+"/delete";
              }
            });
        });
    </script>
@stop