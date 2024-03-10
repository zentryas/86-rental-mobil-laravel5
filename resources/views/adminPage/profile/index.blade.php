@extends('layouts.backend')
@section('title','Profile | 86Rentcar Yogyakarta')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                <h4><i class="fa fa-user"></i> My Profile <span>
                    <a href="" class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#lihat{{$data_admin->id}}"><i class="fa fa-pencil-alt"></i> Edit Profile</a>
                        <!-- Modal -->
                        <div class="modal fade" id="lihat{{$data_admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header pophead">
                                        <h3 class="modal-title" id="exampleModalLabel"> <i class="fa fa-pencil"></i> Form Edit Data</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body prfl">
                                        <form action="profile/{{$data_admin->id}}/update" method="post" enctype="multipart/form-data">
									        {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama</label>
                                                        <input type="text" name="name" class="form-control" value="{{$data_admin->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" class="form-control" value="{{$data_admin->email}}">
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
                                <td>Nama</td>
                                <td width="50">:</td>
                                <td>{{ $data_admin->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td width="50">:</td>
                                <td>{{ $data_admin->email }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop