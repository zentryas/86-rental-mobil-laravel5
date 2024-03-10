<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();

        $user->update([
            'active' => true,
            'activation_token' => null
        ]);
        Auth::LoginUsingId($user->id);
        alert()->success('Selamat ya', 'Aktivasi Email Anda Berhasil!');
        return redirect()->route('welcome');
    }
}
