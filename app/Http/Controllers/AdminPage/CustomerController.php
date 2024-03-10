<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$data_customer = \App\User::all();
    	return view('adminPage.customer.index',['data_customer' => $data_customer]);
    }

    public function delete($id)
    {
    	$customer = \App\User::find($id);
    	$customer->delete();
    	return redirect('/admin/customer')->with('sukses','Data Berhasil dihapus!');
    }
}
