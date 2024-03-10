<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SopirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
		$sopir = \App\Sopir::all();
        return view('adminPage.sopir.index',['sopir' => $sopir]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_sopir' => 'required',
            'status_sopir' => 'required',
        ], [
            'nama_sopir.required' => 'Field nama sopir tidak boleh kosong!',
        ]);

    	$sopir = \App\Sopir::create($request->all());
    	alert()->success('Data Berhasil disimpan!', 'Sukses!');
    	return redirect('/admin/sopir');
    }


    public function edit($id)
    {
    	$sopir = \App\Sopir::find($id);
    	return view('adminPage.sopir.edit',['sopir' => $sopir]);
    }

    public function update(Request $request,$id)
    {
    	$sopir = \App\Sopir::find($id);
    	$sopir->update($request->all());
    	alert()->success('Data Berhasil diupdate!', 'Sukses!');
    	return redirect('/admin/sopir');
    }

    public function delete($id)
    {
    	$sopir = \App\Sopir::find($id);
    	$sopir->delete();
    	alert()->success('Data Berhasil dihapus!', 'Sukses!');
    	return redirect('/admin/sopir');
    }
}
