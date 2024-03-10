@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Profile')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-body text-center">
                    @if($user->jenis_kelamin == "1")
                        <img src="{{asset('frontend/img/profile/male.png')}}" alt="" width="150px">
                    @elseif($user->jenis_kelamin == "0")
                        <img src="{{asset('frontend/img/profile/female.png')}}" alt="" width="150px">
                    @endif
                    <p class="mt-2">{{ $user->name }} {{ $user->nama_belakang }}</p>
                    <span class="btn btn-info btn-sm text-white" disable>customer</span>                
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <h4><i class="fa fa-user"></i> My Profile <span>
                    <a href="" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#lihat{{$user->id}}"><i class="fa fa-pencil"></i> Edit Profile</a>
                        <!-- Modal Edit Data -->
                        <div class="modal fade" id="lihat{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header pophead">
                                        <h3 class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil"></i> Form Edit </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body prfl">
                                        <form action="profile/{{$user->id}}/update" method="post" enctype="multipart/form-data">
									        {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Depan</label>
                                                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="form-control" id="">
                                                            <option value="1" @if($user->jenis_kelamin == '1') selected @endif>Laki-Laki</option>
                                                            <option value="0" @if($user->jenis_kelamin == '0') selected @endif>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nomor Hp</label>
                                                        <input type="number" name="nomor_hp" class="form-control" value="{{$user->nomor_hp}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Belakang</label>
                                                        <input type="text" name="nama_belakang" class="form-control" value="{{$user->nama_belakang}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Agama</label>
                                                        <input type="text" name="agama" class="form-control" value="{{$user->agama}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alamat Lengkap</label>
                                                        <textarea class="form-control" name="alamat" rows="3">{{$user->alamat}}</textarea>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span></h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Depan</td>
                                <td width="50">:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Nama Belakang</td>
                                <td width="50">:</td>
                                <td>{{ $user->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{ $user->nomor_hp }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>{{ $user->agama }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    @if($user->jenis_kelamin == "1")
                                        Laki-Laki
                                    @elseif($user->jenis_kelamin == "0")
                                        Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection