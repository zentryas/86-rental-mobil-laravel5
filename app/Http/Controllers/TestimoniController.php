<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Testimoni;
use \App\Payment;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post(Request $request)
    {
        $this->validate($request,[
            'testimoni' => 'required',
        ]);
        
        // dd($request);
        
        $bayar = Payment::find($request->id);
        $bayar->status_post = 'Sudah';
        $bayar->save();
        
    	$testi = Testimoni::create([
    	    'user_id' => $request->user_id,
    	    'testimoni' => $request->testimoni,
    	]);
        
    	alert()->success('Testimoni anda berhasil dikirimkan!', 'Berhasil!');
    	return redirect('/riwayat-transaksi');
    }
}
