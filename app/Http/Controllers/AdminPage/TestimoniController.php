<?php

namespace App\Http\Controllers\AdminPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Testimoni;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$testimoni = Testimoni::all();
    	return view('adminPage.testimoni.index', compact('testimoni'));
    }

    public function delete($id)
    {
    	$testimoni = Testimoni::find($id);
        $testimoni->delete();
        alert()->success('Data testimoni berhasil dihapus!', 'Sukses!');
    	return redirect('/admin/testimoni');
    }
}
