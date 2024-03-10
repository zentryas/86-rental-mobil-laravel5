
@extends('layouts.auth')
@section('title','Login Admin | 86Rentcar Yogyakarta')
@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="login-brand">
        <a href="/admin/login"><img src="{{asset('backend/img/crew.png')}}" width="200px" alt="" loading="lazy"></a>
    </div>
    <div class="card">

        <div class="card-header">
            <h4 class="text-dark">Admin Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="contoh@gmail.com" autofocus>

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
                            <a href="{{ route('admin.password.request') }}" class="text-small">
                            Lupa Password?
                            </a>
                        </div>
                    </div>
                    
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="********">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark" tabindex="4">
                    <i class="fa fa-sign-in"></i>
                    Login
                    </button>
                </div>

            </form>
        </div>
    </div>
    
    <div class="simple-footer">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 86Rentcar Yogyakarta
    </div>

</div>

@stop