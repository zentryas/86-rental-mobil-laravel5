<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Events\Auth\UserActivationEmail;

class ActivationResendController extends Controller
{
    public function showResendForm()
    {
    	return view('auth.activate.resend');
    }

    public function resend(Request $request)
    {
    	$this->validateResendRequest($request);

    	$user = User::where('email', $request->email)->first();

		event(new UserActivationEmail($user));
		alert()->success('Silahkan cek email anda untuk melakukan aktivasi kembali', 'Pengiriman aktivasi email berhasil!');
    	return redirect()->route('login');
    }

    protected function validateResendRequest(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email|exists:users,email'
    	], [
    		'email.exists' => 'Email anda tidak ditemukan!'
    	]);
    }
}
