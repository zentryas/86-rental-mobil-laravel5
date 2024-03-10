<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use PDF;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
	}

    public function index(Request $request)
    {

    	if(!isset($_GET['type'])) {
	    	return view('adminPage.laporan.index');
    	} else {
			$data['data'] = $request->toArray();

    		switch ($request->type) {
                case 'all':
                    $data['bookings'] = Booking::whereBetween('tgl_booking', [$request['tgl_mulai'], $request['tgl_selesai']])
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
                    ->get();
    				break;
    			 case 'booking' :
    			 	$data['bookings'] = Booking::where('status_booking',"Booking")
                    ->whereBetween('tgl_booking', [$request['tgl_mulai'], $request['tgl_selesai']])
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
                    ->get();
    			 	break;
    			 case 'sewa' :
    			 	$data['bookings'] = Booking::where('status_booking',"Sewa")
                    ->whereBetween('tgl_booking', [$request['tgl_mulai'], $request['tgl_selesai']])
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
                    ->get();
    			 	break;
			 	case 'selesai' :
    			 	$data['bookings'] = Booking::where('status_booking',"Selesai")
                    ->whereBetween('tgl_booking', [$request['tgl_mulai'], $request['tgl_selesai']])
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
                    ->get();
			 	break;
			 	case 'batal' :
    			 	$data['bookings'] = Booking::where('status_booking',"Batal")
                    ->whereBetween('tgl_booking', [$request['tgl_mulai'], $request['tgl_selesai']])
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
                    ->get();
			 	break;
    		}
    		return view('adminPage.laporan.index', $data);
    	}
	}
	
	public function cetakPDF($data_mulai,$data_selesai,$type){
		$mulai = $data_mulai;
		$selesai = $data_selesai;
		$tipe = $type;
		$tanggalSekarang = Carbon::now();

		if($type == "all"){
			$cetakBooking= Booking::whereBetween('tgl_booking', [$data_mulai, $data_selesai])
			->join('users', 'users.id', '=', 'bookings.user_id')
			->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
			->get();
			$pdf = PDF::loadview('adminPage.laporan.cetak_PDF',compact('cetakBooking','mulai','selesai','tipe','tanggalSekarang'));
			// dd($cetakBooking);
			return $pdf->download('Laporan');
		}
		$cetakBooking= Booking::whereBetween('tgl_booking', [$data_mulai, $data_selesai])
		->where('status_booking', $type)
		->join('users', 'users.id', '=', 'bookings.user_id')
		->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
		->get();
		$pdf = PDF::loadview('adminPage.laporan.cetak_PDF',compact('cetakBooking','mulai','selesai','tipe','tanggalSekarang'));
		// dd($cetakBooking);
		return $pdf->download('Laporan');
	}

	public function cetak($data_mulai,$data_selesai,$type){
		$mulai = $data_mulai;
		$selesai = $data_selesai;
		$tipe = $type;
		$tanggalSekarang = Carbon::now();

		if($type == "all"){
			$cetakBooking= Booking::whereBetween('tgl_booking', [$data_mulai, $data_selesai])
			->join('users', 'users.id', '=', 'bookings.user_id')
			->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
			->get();
			return view('adminPage.laporan.cetak_print',compact('cetakBooking','mulai','selesai','tipe','tanggalSekarang'));
		}
		$cetakBooking= Booking::whereBetween('tgl_booking', [$data_mulai, $data_selesai])
		->where('status_booking', $type)
		->join('users', 'users.id', '=', 'bookings.user_id')
		->join('mobils', 'mobils.id', '=', 'bookings.mobil_id')
		->get();
		return view('adminPage.laporan.cetak_print',compact('cetakBooking','mulai','selesai','tipe','tanggalSekarang'));
	}
}
