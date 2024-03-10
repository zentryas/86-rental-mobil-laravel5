<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merek;

class MerekController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$data_merek = Merek::all();
        return view('adminPage.merek.index', compact('data_merek'));
    }

   	public function create(Request $request)
    {
        if(empty($request->nama_merek)){
            alert()->warning('Field nama merek tidak boleh kosong!', 'Warning!');
        }
        
        $this->validate($request,[
            'nama_merek' => 'required',
        ], [
            'nama_merek.required' => 'Field nama merek tidak boleh kosong!',
        ]);
        
        $merek = Merek::create($request->all());
        alert()->success('Data merek berhasil ditambahkan', 'Sukses!');
    	return redirect('/admin/merek');
    }

    public function update(Request $request,$id)
    {
        if(empty($request->nama_merek)){
            alert()->warning('Nama merek tidak boleh kosong!', 'Warning!');
        }
        
        $this->validate($request,[
            'nama_merek' => 'required',
        ], [
            'nama_merek.required' => 'Nama merek tidak boleh kosong!',
        ]);

    	$merek = Merek::find($id);
        $merek->update($request->all());
        alert()->success('Data merek berhasil diupdate', 'Sukses!');
    	return redirect('/admin/merek');
    }

    public function delete($id)
    {
    	$merek = Merek::find($id);
    	$merek->delete();
    	return redirect('/admin/merek')->with('sukses','Data Berhasil dihapus!');
    }
}
