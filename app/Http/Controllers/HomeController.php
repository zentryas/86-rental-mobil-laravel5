<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\Merek;
use App\Testimoni;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mobil = Mobil::orderBy('nama_mobil', 'asc')->get();
        $testi = Testimoni::all();
        return view('welcome', compact('mobil','testi'));
    }

    public function mobil()
    {
        $mobil = Mobil::orderBy('nama_mobil', 'asc')->get();
        $mobilManual = Mobil::orderBy('nama_mobil', 'asc')->where('transmisi','Manual')->get();
        $mobilMatic = Mobil::orderBy('nama_mobil', 'asc')->where('transmisi','Matic')->get();
        $testi = Testimoni::all();
        return view('sitePage.mobil', compact('mobil','mobilManual','mobilMatic','testi'));
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
    
        // mengambil data dari table mobil sesuai pencarian data
        $mobil = Mobil::where('nama_mobil','like',"%".$cari."%")->get();
        $mobilManual = Mobil::where('nama_mobil','like',"%".$cari."%")->where('transmisi','Manual')->get();
        $mobilMatic = Mobil::where('nama_mobil','like',"%".$cari."%")->where('transmisi','Matic')->get();
        $testi = Testimoni::all();
        // mengirim data pegawai ke view index
        return view('sitePage.mobil', compact('mobil','mobilManual','mobilMatic','testi'));
    }

    public function terms()
    {
        return view('sitePage.terms');
    }

    public function reservasi()
    {
        return view('sitePage.reservasi');
    }

    public function tarifPPN()
    {
        return view('sitePage.tarifPajak');
    }

}
