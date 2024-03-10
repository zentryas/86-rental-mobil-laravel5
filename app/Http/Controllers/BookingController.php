<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use App\Mobil;
use App\Booking;
use App\Testimoni;
use Calendar;
use Alert;
use App\Events\FormSubmitted;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $mobils = Mobil::where('id', $id)->first();
        $booking = Booking::where('mobil_id', $id)
                            ->whereIn('status_booking', ['Booking', 'Sewa'])
                            ->get();
        $booking_list = [];
        foreach ($booking as $key => $event)
        {
            $booking_list[] = Calendar::event(
                $event->status_booking,
                true,
                new \DateTime($event->tgl_mulai),
                new \DateTime($event->tgl_selesai.'+1 day')
            );
        }
        $booking_detail = Calendar::addEvents($booking_list);
        // dd($booking_detail);
        return view('sitePage.booking.index', compact('mobils','booking_detail'));
    }

    public function cek_mobil (Request $request){
        // return $request->data["date"];
        $dur = $request->data["durasi"];
        // memfilter tgl mulai
        $hari =  intval(Carbon::parse($request->data["date"])->format('d'));
        $bulan =  Carbon::parse($request->data["date"])->format('m');
        $tahun =  Carbon::parse($request->data["date"])->format('Y');
        // memfilter tgl selesai
        $hari_end = intval(Carbon::parse($request->data["date"])->addDays($dur)->format('d'));
        $kondisi = 1;
        
        $getBulan = Booking::whereMonth('tgl_mulai',$bulan)->whereYear('tgl_mulai',$tahun)
                    ->whereIn('status_booking', ['Booking', 'Sewa'])
                    ->where('mobil_id', $request->mobil_id)
                    ->get();
        foreach ($getBulan as $value) {
            $mulai=intval(Carbon::parse($value->tgl_mulai)->format('d'));
            $selesai=intval(Carbon::parse($value->tgl_selesai)->format('d'));
            if($hari>=$mulai && $hari<=$selesai){
                $kondisi= 0;
            }
            if($hari_end>=$mulai && $hari_end<=$selesai){
                $kondisi =0;
            }
        }
        return response([
            'status' => 200,
            'data' => $kondisi,
            'message' => 'success'
        ], 200);
    }

    public function detail(Request $request, $id)
    {
        $this->validate($request,[
            'kode_booking' => 'required','unique:booking',
            'tgl_mulai' => 'required',
            'durasi' => 'required',
            'paket' => 'required',
        ], [
            'tgl_mulai.required' => 'Tanggal & Jam mulai tidak boleh kosong!',
            'durasi.required' => 'Durasi tidak boleh kosong!',
            'paket.required' => 'Paket sewa tidak boleh kosong!',
        ]);
        
        //get tanggal sekarang 
        $tanggal = Carbon::now();

        //get input 
        $data = $request->toArray();

        //get tanggal selesai
        $dr = $request->durasi;
        $tgl_mulai = Carbon::parse($request->tgl_mulai);
        $tgl_selesai = date('Y-m-d H:i', strtotime('+'.$dr.' days', strtotime($tgl_mulai)));
        $tgl_selesai = Carbon::parse($tgl_selesai);

        //get tarif sopir
        $mobil = Mobil::where('id', $id)->first();
        if($request->paket == "1"){
            $jml_sopir = $mobil->tarif_sopir*$request->durasi;
        }elseif($request->paket == "0"){
            $jml_sopir = $mobil->tarif_sopir;
        };

        //get tarif mobil
        if($request->paket == "1"){
            $jml_mobil = $mobil->tarif_mobil*$request->durasi;
        }elseif($request->paket == "0"){
            $jml_mobil = $mobil->tarif_mobil*$request->durasi;
        };

        //get total harga
        if($request->paket == "1"){
            $jml_bayar = $mobil->tarif_mobil*$request->durasi+$mobil->tarif_sopir*$request->durasi;
        }elseif($request->paket == "0"){
            $jml_bayar = $mobil->tarif_mobil*$request->durasi;
        };

        //get dp minimum (30% from the price total)
        $dp = ($jml_bayar * 30) / 100;
        //biaya kekurangan
        $kekurangan = $jml_bayar-$dp;
        
        //post pesan ke admin
        // $text = $request->pesan;
        // event(new FormSubmitted($text));

        // alert()->info('Cek kembali transaksi booking anda!', 'Detail Booking');
        return view('sitePage.booking.detail', compact('mobil','data','tgl_mulai','tgl_selesai','jml_bayar','dp','tanggal','jml_sopir','jml_mobil','kekurangan'));
    }

    public function create(Request $request, $id)
    {
        $simpan = Booking::create([
            'kode_booking' => $request->kode_booking,
            'user_id' => $request->user_id,
            'mobil_id' => $request->mobil_id,
            'tgl_booking' => $request->tgl_booking,
            'tgl_mulai' => Carbon::parse($request->tgl_mulai)->format('Y-m-d H:i'),
            'tgl_selesai' => $request->tgl_selesai,
            'status_booking' => 'Batal',
            'status_pelunasan' => 'Belum Lunas',
            'status_pengambilan' => 'Belum',
            'paket' => $request->paket,
            'durasi' => $request->durasi,
            'jml_bayar' => $request->jml_bayar,
            'jml_dp' => $request->jml_dp,
        ]);
        
        return redirect('pembayaran/'.$simpan->id);
    }

    public function pembayaran($id)
    {
        $data = Booking::where('id', $id)
        ->where('user_id', Auth::user()->id)
        ->first();
        //membuat waktu mundur 15 menit
        $tanggal=date('Y-m-d');
        $waktu = date('H:i:s');
        $pecah = explode(':',$waktu);
        $jam=$pecah[0];
        $menit=$pecah[1];
        $waktu_tunggu=15;
        $hitung=intval($menit)+$waktu_tunggu;
        if($hitung>60){
            $hitung=60-intval($menit);
            $waktu_tunggu=$waktu_tunggu-$hitung;
            $menit=$waktu_tunggu;
            $jam=$jam+1;
        }else{
            $menit=$hitung;
        }
        $detik=$pecah[2];
        $digit=strlen($menit);
        if($digit<2){
            $menit='0'.$menit;
        }
        $gabung_waktu=$tanggal.' '.$jam.':'.$menit.':'.$detik;
        $kekurangan = $data->jml_bayar-$data->jml_dp;
        // dd($gabung_waktu);
        return view('sitePage.booking.bayar',compact('data','kekurangan','gabung_waktu'));
    }

    public function update_status_booking(Request $request){
        $booking = Booking::find($request->booking_id)->update([
            'status_booking' => 'Batal'
        ]);
        return response('Berhasil Update',200);
    }

    public function riwayatTransaksi()
    {
        $pay = Payment::where('user_id', Auth::user()->id)->get();
        $testi = Testimoni::where('user_id', Auth::user()->id)->get();
        $booking = Booking::where('user_id', Auth::user()->id)->get();
        $booking_list = [];
        foreach ($booking as $key => $event)
        {
            $merk=$event->kode_booking;
            $nopol = $event->status_booking;
            $data = $merk.' '.$nopol;
            $booking_list[] = Calendar::event(
                $data,
                true,
                new \DateTime($event->tgl_mulai),
                new \DateTime($event->tgl_selesai)
            );
        }
        $booking_detail = Calendar::addEvents($booking_list);
    	return view('sitePage.riwayatTransaksi',compact('booking','booking_detail','testi','pay'));
    }

}
