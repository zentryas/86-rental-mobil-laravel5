<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$bayar = \App\Payment::where('status','pending')->get();
        return view('adminPage.payment.index',['bayar' => $bayar]);
    }

    public function lunas()
    {
    	$bayar = \App\Payment::where('status','success')->get();
        return view('adminPage.payment.lunas',['bayar' => $bayar]);
    }

    public function expired()
    {
    	$bayar = \App\Payment::where('status','expired')->get();
        return view('adminPage.payment.expired',['bayar' => $bayar]);
    }
}
