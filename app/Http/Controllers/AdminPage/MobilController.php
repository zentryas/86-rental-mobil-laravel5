<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Mobil;
use App\Merek;

class MobilController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$data_mobil = Mobil::all();
        $data_merek = Merek::all();
    	return view('adminPage.mobil.index', compact('data_mobil','data_merek'));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_mobil' => 'required',
            'nopol' => 'required|unique:mobils',
            'merek_id' => 'required',
            'seat' => 'required|numeric',
            'tahun' => 'required|numeric',
            'transmisi' => 'required',
            'bb' => 'required',
            'tarif_mobil' => 'required|numeric',
            'tarif_sopir' => 'required|numeric',
            'img1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_mobil.required' => 'Field nama mobil tidak boleh kosong!',
            'nopol.required' => 'Field nomor polisi tidak boleh kosong!',
            'merek_id.required' => 'Field nama merek tidak boleh kosong!',
            'seat.required' => 'Field tempat duduk tidak boleh kosong!',
            'tahun.required' => 'Field tahun tidak boleh kosong!',
            'transmisi.required' => 'Field jenis transmisi tidak boleh kosong!',
            'bb.required' => 'Field jenis bahan bakar tidak boleh kosong!',
            'tarif_mobil.required' => 'Field tarif mobil tidak boleh kosong!',
            'tarif_sopir.required' => 'Field tarif sopir tidak boleh kosong!',
            'img1.required' => 'Field foto tidak boleh kosong!',
            'seat.numeric' => 'Field tempat duduk tidak boleh huruf!',
            'tahun.numeric' => 'Field tahun tidak boleh huruf!',
        ]);
        
    	$mobil = Mobil::create($request->all());
    	if($request->hasFile('img1')){
            $request->file('img1')->move('images/',$request->file('img1')->getClientOriginalName());
            $mobil->img1 = $request->file('img1')->getClientOriginalName();
            $mobil->save();
        }
    	return redirect('/admin/mobil')->with('sukses','Data Berhasil disimpan!');
    }

    public function update(Request $request,$id)
    {
        $mobil = Mobil::find($id);
        $mobil->update($request->all());
        if($request->hasFile('img1')){
            $request->file('img1')->move('images/',$request->file('img1')->getClientOriginalName());
            $mobil->img1 = $request->file('img1')->getClientOriginalName();
            $mobil->save();
        }
    	return redirect()->back()->with('sukses','Data Berhasil diupdate!');
    }

    public function delete($id)
    {
    	$mobil = Mobil::where('id',$id)->first();
        File::delete('images/'.$mobil->img1);
        Mobil::where('id',$id)->delete();

        return redirect('/admin/mobil')->with('sukses','Data Berhasil dihapus!');
    }

}
