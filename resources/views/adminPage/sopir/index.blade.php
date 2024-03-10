@extends('layouts.backend')
@section('title','Data Sopir | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Data Sopir</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Data Sopir</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sopir</th>
                        <th>Status Sopir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                @endphp
                @foreach ($sopir as $row)                                    
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $row->nama_sopir }}</td>
                        <td>
                            @if($row->status_sopir == "0")
                                <span class="badge badge-danger">Tidak Tersedia</span>
                            @elseif($row->status_sopir == "1")
                                <span class="badge badge-success">Tersedia</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fas fa-pencil-alt"></i></a>
                                    
                                    <!-- Modal Edit Data -->
                                    <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <label class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil-alt"></i> Edit Data Sopir </label>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/sopir/{{$row->id}}/update" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Nama Sopir</label>
                                                                    <input type="text" name="nama_sopir" class="form-control @if($errors->has('nama_sopir')) is-invalid @endif" value="{{$row->nama_sopir}}">
                                                                    @if($errors->has('nama_sopir'))
                                                                        <div class="invalid-feedback">
                                                                            {{$errors->first('nama_sopir')}}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Status Sopir<span class="text-danger">*</span></label>
                                                                    <select name="status_sopir" class="form-control">
                                                                        <option value="0" @if($row->status_sopir == '0') selected @endif>Tidak Tersedia</option>
                                                                        <option value="1" @if($row->status_sopir == '1') selected @endif>Tersedia</option>
                                                                    </select>
                                                                    @if($errors->has('status_mobil'))
                                                                        <div class="invalid-feedback">
                                                                            {{$errors->first('status_mobil')}}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>                                            
                                                        <button type="submit" class="btn btn-success btn-block float-right"> <i class="fa fa-check"></i> Simpan Perubahan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <a href="#" class="btn btn-danger btn-sm delete" 
                                    sopir-id="{{$row->id}}"
                                    sopir-nama="{{$row->nama_sopir}}">                        
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
</section> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <label class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-square"></i> Tambah Data Sopir</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/sopir/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nama Sopir</label>
                        <input type="text" name="nama_sopir" class="form-control @if($errors->has('nama_sopir')) is-invalid @endif"" placeholder="Masukan Nama Sopir" value="{{old('nama_sopir')}}">
                        @if($errors->has('nama_sopir'))
                            <div class="invalid-feedback">
                                {{$errors->first('nama_sopir')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Status Sopir <span class="text-danger">*</span></label>
                        <select name="status_sopir" class="form-control @if($errors->has('status_sopir')) is-invalid @endif">
                            <option value="">-- Pilih Status Sopir --</option>
                            <option value="1" {{(old('status_sopir') == '1') ? 'selected' : ''}} >Tersedia</option>
                            <option value="0" {{(old('status_sopir') == '0') ? 'selected' : ''}} >Tidak Tersedia</option>
                        </select>
                        @if($errors->has('status_sopir'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_sopir')}}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success btn-block float-right"> <i class="fa fa-check"></i> Simpan</button>
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
            var id = $(this).attr('sopir-id');
            var nama = $(this).attr('sopir-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data sopir "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/sopir/"+id+"/delete";
              }
            });
        });
    </script>
@stop