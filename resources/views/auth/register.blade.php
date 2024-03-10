@extends('layouts.frontend')
@section('title','Register | 86Rentcar Yogyakarta')
@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 py-5">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <!-- @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-divider">
                    Data Pribadi
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label for="">Nama Depan <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="">Nama Belakang <span class="text-success">optional</span></label>
                        <input id="nama_belakang" type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" value="{{ old('nama_belakang') }}" autocomplete="nama_belakang" autofocus>
                        @error('nama_depan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="1" {{(old('jenis_kelamin') == '1') ? 'selected' : ''}} >Laki-Laki</option>
                            <option value="0" {{(old('jenis_kelamin') == '0') ? 'selected' : ''}} >Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="">Agama <span class="text-danger">*</span></label>
                        <select name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam" {{(old('agama') == 'Islam') ? 'selected' : ''}} >Islam</option>
                            <option value="Budha" {{(old('agama') == 'Budha') ? 'selected' : ''}} >Budha</option>
                            <option value="Kristen" {{(old('agama') == 'Kristen') ? 'selected' : ''}} >Kristen</option>
                            <option value="Hindu" {{(old('agama') == 'Hindu') ? 'selected' : ''}} >Hindu</option>
                            <option value="Katolik" {{(old('agama') == 'Katolik') ? 'selected' : ''}} >Katolik</option>
                            <option value="Konghuchu" {{(old('agama') == 'Konghuchu') ? 'selected' : ''}} >Konghuchu</option>
                        </select>
                        @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="">Nomor Telepon / WA <span class="text-danger">*</span></label>
                        <input id="nomor_hp" type="number" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" value="{{ old('nomor_hp') }}" autocomplete="nomor_hp" autofocus>
                        <small id="" class="form-text text-info"><i class="fa fa-info-circle"></i> contoh : +6285803xxxxxx</small>
                        @error('nomor_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus >{{ old('alamat') }}</textarea>
                        <small id="" class="form-text text-info"><i class="fa fa-info-circle"></i> Awali dengan nama dusun, RT/RW nama desa, nama kecamatan, nama kabupaten dan nama provinsi</small>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-divider">
                    Data Login
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label for="password" class="d-block">Password <span class="text-danger">*</span></label>
                        <!-- <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span> -->
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                        <small id="" class="form-text text-info"><i class="fa fa-info-circle"></i> Password minimal 8 karakter</small>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="password2" class="d-block">Konfirmasi Password <span class="text-danger">*</span></label>
                            <!-- <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span> -->
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        <small id="" class="form-text text-info"><i class="fa fa-info-circle"></i> Password minimal 8 karakter</small>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-user-plus"></i> Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop