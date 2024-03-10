<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $booking = Booking::where('status_booking','Booking')->get();
        
        return view('adminPage.booking.index',compact('booking'));
    }

    public function ambil()
    {
		$booking = Booking::where('status_booking','Sewa')->whereIn('status_pengambilan',['Belum','Sudah'])->get();
        return view('adminPage.booking.ambil',compact('booking'));
    }

    public function kembali()
    {
		$booking = Booking::where('status_booking','Sewa')->where('status_pengambilan','Sudah')->get();
        return view('adminPage.booking.kembali',compact('booking'));
    }

    // public function sewa()
    // {
	// 	$booking = Booking::where('status_booking','Sewa')->get();
    //     return view('adminPage.booking.sewa',compact('booking'));
    // }

    public function cetak($id)
    {
        $tanggalSekarang = Carbon::now();
        $booking = Booking::find($id);
    	return view('adminPage.booking.cetak',compact('booking','tanggalSekarang'));
    }

    public function updateStatus(Request $request,$id)
    {
        //menampilkan alert field kosong
        if(empty($request->status_pelunasan)){
            alert()->warning('Field status pelunasan tidak boleh kosong!', 'Peringatan!');
        }
        //validasi input status pelunasan
        $this->validate($request,[
            'status_pelunasan' => 'required',
        ], [
            'status_pelunasan.required' => 'Field status pelunasan tidak boleh kosong!',
        ]);
        //update status pelunasan berdasarkan id
        $booking = Booking::find($id);
        $booking->update([
            'status_pelunasan' => $request->status_pelunasan,
            'status_pengambilan' => 'Sudah',
        ]);
        alert()->success('Status pelunasan berhasil diupdate!', 'Sukses!');
        return redirect('/admin/booking/pengambilan');
    }

    public function updateKembali(Request $request,$id)
    {
        //validasi input status booking
        $this->validate($request,[
            'status_booking' => 'required',
            'tgl_kembali' => 'required',
        ], [
            'status_booking.required' => 'Field status booking tidak boleh kosong!',
            'tgl_kembali.required' => 'Checkbox tidak boleh kosong!',
        ]);
        
        // dd($request);
        $booking = Booking::find($id);
        if($request->tgl_kembali >= $booking->tgl_selesai)
        {
            // $tanggal = date("Y-m-d H:i:s");
            $tanggal = $request->tgl_kembali;
            // dd($tanggal);
            
            $awal  = strtotime($tanggal); //waktu awal
            $akhir = strtotime($booking->tgl_selesai); //waktu akhir
            $diff  = $awal-$akhir;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);
            $flor  = floor( $menit / 60 );
            
            // dd('Waktu Tersisa tinggal: ' . $jam .  ' jam, ' . $flor . ' menit');
            if($jam<0){
                //tidak ada denda
                $hitung = 0;
                // dd($hitung);
                $booking->update([
                    'tgl_kembali' => $tanggal,
                    'denda' => $hitung,
                    'status_booking' => $request->status_booking,
                ]);
                alert()->success('Mobil sudah kembali!', 'Sukses!');
                return redirect('/admin/booking/selesai');
                
            }elseif($jam>=0){
                // dd($jam);
                $pecah  = explode('-',$jam);
                // dd($pecah);
                $hitung = intval($pecah[0])*25000;
                // dd($hitung);
                // simpan denda ke database
                $booking->update([
                    'tgl_kembali' => $tanggal,
                    'denda' => $hitung,
                    'status_booking' => $request->status_booking,
                ]);
                alert()->success('Mobil sudah kembali!', 'Sukses!');
                return redirect('/admin/booking/selesai');
            }
        } 
        else
        {
            alert()->warning('Tanggal kembali lebih kecil dari tanggal selesai!', 'Oops!');
            return redirect('/admin/booking/pengembalian');
        }
        
    }

    public function selesai()
    {
		$booking = Booking::where('status_booking','Selesai')->get();
        return view('adminPage.booking.selesai',compact('booking'));
    }
    
    public function batal()
    {
		$booking = Booking::where('status_booking','Batal')->get();
        return view('adminPage.booking.batal',compact('booking'));
    }
}
