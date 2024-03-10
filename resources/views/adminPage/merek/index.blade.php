@extends('layouts.backend')
@section('title','Data Merek | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid mt-3">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Data Merek</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Data Merek</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="" data-toggle="modal" data-target="#addMerek" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merek Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                    @endphp
                    @foreach ($data_merek as $merek)                                    
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $merek->nama_merek }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#edit{{$merek->id}}"><i class="fas fa-pencil-alt"></i></a>
                                    
                                    <!-- Modal Edit Data -->
                                    <div class="modal fade" id="edit{{$merek->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <label class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil-alt"></i> Edit Data Merek </label>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/merek/{{$merek->id}}/update" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Nama Merek</label>
                                                                    <input type="text" name="nama_merek" class="form-control @if($errors->has('nama_merek')) is-invalid @endif" value="{{$merek->nama_merek}}">
                                                                    @if($errors->has('nama_merek'))
                                                                        <div class="invalid-feedback">
                                                                            {{$errors->first('nama_merek')}}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>                                            
                                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan Perubahan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <a href="#" class="btn btn-danger btn-sm delete" 
                                        merek-id="{{$merek->id}}"
                                        merek-nama="{{$merek->nama_merek}}">                        
                                        <i class="fa fa-trash"></i>
                                    </a>
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
    </div>
</section> 

<!-- Modal Tambah Data Merek -->
<div class="modal fade" id="addMerek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <label class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-square"></i> Tambah Data Merek</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/merek/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama Merek</label>
                        <input type="text" name="nama_merek" class="form-control @if($errors->has('nama_merek')) is-invalid @endif" placeholder="Masukan Nama merek" value="{{old('nama_merek')}}">
                        @if($errors->has('nama_merek'))
                            <div class="invalid-feedback">
                                {{$errors->first('nama_merek')}}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('sweetAlert')
    <script type="text/javascript">
        $('.delete').click(function()
        {
            var id = $(this).attr('merek-id');
            var nama = $(this).attr('merek-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data merek "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/merek/"+id+"/delete";
              }
            });
        });
    </script>
@stop