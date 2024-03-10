<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('sitePage.profile.index', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->update($request->all());
        
    	return redirect()->back()->withSuccess('Data Berhasil diupdate!');
    }

}