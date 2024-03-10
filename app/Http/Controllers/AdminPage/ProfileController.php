<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Admin;
use Auth;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$data_admin = Admin::where('id', Auth::user()->id)->first();
    	return view('adminPage.profile.index', compact('data_admin'));
    }

    public function update(Request $request,$id)
    {
        $admin = Admin::find($id);
        $admin->update($request->all());
        
    	return redirect()->back()->withSuccess('Data Berhasil diupdate!');
    }
    
}
