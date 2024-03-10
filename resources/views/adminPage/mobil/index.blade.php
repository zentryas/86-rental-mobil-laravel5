@extends('layouts.backend')
@section('title','Data Mobil | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid mt-3">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Data Mobil</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Data Mobil</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"> 
                <a href="" data-toggle="modal" data-target="#addMobil" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Data</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto 1</th>
                            <th>Nama Mobil</th>
                            <th>Nopol</th>
                            <!-- <th>Status Mobil</th> -->
                            <th>Tarif Lepas Kunci</th>
                            <th>Tarif Plus Sopir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    
                    @foreach ($data_mobil as $mobil)                                    
                        <tr>
                            <td>{{$no}}</td>
                            <td><img src="{{ $mobil->getimg1()}}" alt="" width="80px"></td>
                            <td>{{ $mobil->nama_mobil }}</td>
                            <td>{{ $mobil->nopol }}</td>
                            <!-- <td>
                                @if($mobil->status_mobil == "0")
                                    <span class="badge badge-danger">Tidak Tersedia</span>
                                @elseif($mobil->status_mobil == "1")
                                    <span class="badge badge-success">Tersedia</span>
                                @endif                                       
                            </td> -->
                            <td>Rp. {{number_format($mobil->tarif_mobil)}}/hari</td>
                            <td>Rp. {{number_format($mobil->tarif_sopir+$mobil->tarif_mobil)}}/hari</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/{{ $mobil->id }}" data-toggle="modal" data-target="#lihat{{$mobil->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <!-- Modal View -->
                                        <div class="modal fade" id="lihat{{$mobil->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <label class="modal-title" id="exampleModalLabel"> <i class="fa fa-info-circle"></i> Info Lainnya</label>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th>Nomor Polisi</th>
                                                                <td>:</td>
                                                                <td>{{ $mobil->nopol }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tahun Keluaran</th>
                                                                <td>:</td>
                                                                <td>{{ $mobil->tahun }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Jenis Transmisi</th>
                                                                <td>:</td>
                                                                <td>{{ $mobil->transmisi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kapasitas Tempat Duduk</th>
                                                                <td>:</td>
                                                                <td>{{ $mobil->seat }} seat</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Jenis Bahan Bakar</th>
                                                                <td>:</td>
                                                                <td>{{ $mobil->bb }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$mobil->id}}"><i class="fas fa-pencil-alt"></i></a>
                                        <!-- Modal Edit Data -->
                                        <div class="modal fade" id="edit{{$mobil->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <label class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil-alt"></i> Edit Data Mobil </label>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/admin/mobil/{{$mobil->id}}/update" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Mobil<span class="text-danger">*</span></label>
                                                                            <input type="text" name="nama_mobil" class="form-control @if($errors->has('nama_mobil')) is-invalid @endif"  value="{{$mobil->nama_mobil}}">
                                                                            @if($errors->has('nama_mobil'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('nama_mobil')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Nomor Polisi<span class="text-danger">*</span></label>
                                                                            <input type="text" name="nopol" class="form-control @if($errors->has('nopol')) is-invalid @endif"  value="{{$mobil->nopol}}">
                                                                            @if($errors->has('nopol'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('nopol')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Tarif Mobil/hari <span class="text-danger">*</span></label>
                                                                            <input type="text" name="tarif_mobil" class="form-control @if($errors->has('tarif_mobil')) is-invalid @endif"  value="{{$mobil->tarif_mobil}}">
                                                                            @if($errors->has('tarif_mobil'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('tarif_mobil')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Status Mobil<span class="text-danger">*</span></label>
                                                                            <select name="status_mobil" class="form-control">
                                                                                <option value="0" @if($mobil->status_mobil == '0') selected @endif>Tidak Tersedia</option>
                                                                                <option value="1" @if($mobil->status_mobil == '1') selected @endif>Tersedia</option>
                                                                            </select>
                                                                            @if($errors->has('status_mobil'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('status_mobil')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Tipe Transmisi <span class="text-danger">*</span></label>
                                                                            <select name="transmisi" class="form-control" id="">
                                                                                <option value="Matic" @if($mobil->transmisi == 'Matic') selected @endif>Matic</option>
                                                                                <option value="Manual" @if($mobil->transmisi == 'Manual') selected @endif>Manual</option>
                                                                            </select>
                                                                            @if($errors->has('transmisi'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('transmisi')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Kapasitas Tempat Duduk <span class="text-danger">*</span></label>
                                                                            <input type="text" name="seat" class="form-control @if($errors->has('seat')) is-invalid @endif"  value="{{$mobil->seat}}">
                                                                            @if($errors->has('seat'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('seat')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Tahun Keluaran <span class="text-danger">*</span></label>
                                                                            <input type="text" name="tahun" class="form-control @if($errors->has('tahun')) is-invalid @endif"  value="{{$mobil->tahun}}">
                                                                            @if($errors->has('tahun'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('tahun')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Tarif Sopir/hari <span class="text-danger">*</span></label>
                                                                            <input type="text" name="tarif_sopir" class="form-control @if($errors->has('tarif_sopir')) is-invalid @endif"  value="{{$mobil->tarif_sopir}}">
                                                                            @if($errors->has('tarif_sopir'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('tarif_sopir')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Jenis Bahan Bakar <span class="text-danger">*</span></label>
                                                                            <select name="bb" class="form-control" id="">
                                                                                <option value="Bensin" @if($mobil->bb == 'Bensin') selected @endif>Bensin</option>
                                                                                <option value="Solar" @if($mobil->bb == 'Solar') selected @endif>Solar</option>
                                                                            </select>
                                                                            @if($errors->has('bb'))
                                                                                <div class="invalid-feedback">
                                                                                    {{$errors->first('bb')}}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Foto Mobil<span class="text-danger">*</span></label>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <img src="{{ $mobil->getimg1()}}" alt="" width="64px">
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <div class="custom-file mb-3">
                                                                                        <input type="file" name="img1" class="custom-file-input @if($errors->has('img1')) is-invalid @endif" value="{{old('img1')}}">
                                                                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                                                        @if($errors->has('img1'))
                                                                                            <div class="invalid-feedback">
                                                                                                {{$errors->first('img1')}}
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                        mobil-id="{{$mobil->id}}"
                                        mobil-nama="{{$mobil->nama_mobil}}">                        
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

<!-- Modal Tambah Data Mobil -->
<div class="modal fade" id="addMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <label class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus-square"></i> Tambah Data Mobil</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/mobil/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Mobil<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_mobil" class="form-control @if($errors->has('nama_mobil')) is-invalid @endif" placeholder="Masukan nama mobil" value="{{old('nama_mobil')}}">
                                    @if($errors->has('nama_mobil'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('nama_mobil')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Polisi<span class="text-danger">*</span></label>
                                    <input type="text" name="nopol" class="form-control @if($errors->has('nopol')) is-invalid @endif" placeholder="Masukan nomor polisi" value="{{old('nopol')}}">
                                    @if($errors->has('nopol'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('nopol')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tarif Mobil/hari <span class="text-danger">*</span></label>
                                    <input type="text" name="tarif_mobil" class="form-control @if($errors->has('tarif_mobil')) is-invalid @endif" placeholder="Masukan Harga Sewa" value="{{old('tarif_mobil')}}">
                                    @if($errors->has('tarif_mobil'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('tarif_mobil')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Merek<span class="text-danger">*</span></label>
                                    <select name="merek_id" class="form-control @if($errors->has('merek_id')) is-invalid @endif">
                                        <option value="">-- Pilih Merek --</option>
                                        @foreach($data_merek as $mrk)
                                            <option value="{{$mrk->id}}">{{$mrk->nama_merek}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('merek_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('merek_id')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tipe Transmisi <span class="text-danger">*</span></label>
                                    <select name="transmisi" class="form-control @if($errors->has('transmisi')) is-invalid @endif" id="">
                                        <option value="">-- Pilih Tipe Transmisi --</option>
                                        <option value="Matic" {{(old('transmisi') == 'Matic') ? 'selected' : ''}} >Matic</option>
                                        <option value="Manual" {{(old('transmisi') == 'Manual') ? 'selected' : ''}} >Manual</option>
                                    </select>
                                    @if($errors->has('transmisi'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('transmisi')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kapasitas Tempat Duduk <span class="text-danger">*</span></label>
                                    <input type="text" name="seat" class="form-control @if($errors->has('seat')) is-invalid @endif" placeholder="Masukan Jumlah Tempat Duduk" value="{{old('seat')}}">
                                    @if($errors->has('seat'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('seat')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Keluaran <span class="text-danger">*</span></label>
                                    <input type="text" name="tahun" class="form-control @if($errors->has('tahun')) is-invalid @endif" placeholder="Masukan Tahun" value="{{old('tahun')}}">
                                    @if($errors->has('tahun'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('tahun')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tarif Sopir/hari <span class="text-danger">*</span></label>
                                    <input type="text" name="tarif_sopir" class="form-control @if($errors->has('tarif_sopir')) is-invalid @endif" placeholder="Masukan Tarif Sopir" value="{{old('tarif_sopir')}}">
                                    @if($errors->has('tarif_sopir'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('tarif_sopir')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Bahan Bakar <span class="text-danger">*</span></label>
                                    <select name="bb" class="form-control @if($errors->has('bb')) is-invalid @endif" id="">
                                        <option value="">-- Pilih Tipe Bahan Bakar --</option>
                                        <option value="Bensin" {{(old('bb') == 'Bensin') ? 'selected' : ''}} >Bensin</option>
                                        <option value="Solar" {{(old('bb') == 'Solar') ? 'selected' : ''}} >Solar</option>
                                    </select>
                                    @if($errors->has('bb'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('bb')}}
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Foto mobil <span class="text-danger">*</span></label>
                                    <input type="file" name="img1" class="form-control @if($errors->has('img1')) is-invalid @endif" value="{{old('img1')}}">
                                    @if($errors->has('img1'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('img1')}}
                                        </div>
                                    @endif
                                </div
                            </div>
                        </div>
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
            var id = $(this).attr('mobil-id');
            var nama = $(this).attr('mobil-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data mobil "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/mobil/"+id+"/delete";
              }
            });
        });
    </script>
@stop