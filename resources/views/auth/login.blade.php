@extends('layouts.frontend')
@section('title','Login Customer | 86Rentcar Yogyakarta')
@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 py-5">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <div class="d-block">
                        <label for="email" class="control-label">Email</label>
                        <div class="float-right">
                            <a href="{{ route('auth.activate.resend') }}" class="text-small">
                            Aktivasi Email?
                            </a>
                        </div>
                    </div>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="user@gmail.com" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                            Lupa Password?
                            </a>
                        </div>
                    </div>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" tabindex="4">
                        <i class="fa fa-sign-in"></i> Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-5 text-muted text-center">
        Belum mempunyai akun? <a href="/register">Daftar sekarang!</a>
    </div>

</div>

@stop