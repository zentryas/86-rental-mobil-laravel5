<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Payment;
use App\Booking;
use App\Mobil;
use App\User;
use \Midtrans\Config;
use \Midtrans\Snap;
use \Midtrans\Notification;
use Auth;
use App\Events\FormSubmitted;

class PaymentController extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
 
    /**
     * Class constructor.
     *
     * @param \Illuminate\Http\Request $request User Request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
      
        $this->request = $request;
 
       \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
       \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
       \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
       \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }
     
    /**
     * Submit pembayaran dp.
     *
     * @return array
     */
    public function submitDp()
    {
        \DB::transaction(function(){
          // Save transaction ke database
            $payment = Payment::create([
                'booking_id' => $this->request->booking_id,
                'user_id' => $this->request->user_id,
                'dp' => floatval($this->request->dp),
                'kekurangan' => $this->request->kekurangan,
            ]);
            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $payment->id,
                    'gross_amount'  => $payment->dp,
                ],
                 'customer_details' => [
                     'first_name'    => Auth::user()->name,
                     'email'         => Auth::user()->email,
                     'phone'         => Auth::user()->nomor_hp,
                     'address'       => Auth::user()->alamat,
                ],
                // 'item_details' => [
                //     [
                //         'id'       => $payment->id,
                //         'price'    => $payment->dp,
                //         'quantity' => $payment->booking->durasi,
                //         'name'     => ucwords(str_replace('_', ' ', $payment->booking->kode_booking))
                //     ]
                // ]
            ];
            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $payment->snap_token = $snapToken;
            $payment->save();
 
            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
  
        });
        
        return response()->json($this->response);

    }
 
    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $notif = new \Midtrans\Notification();
        \DB::transaction(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $payment = Payment::findOrFail($orderId);
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                
                $payment->setPending();
                $booking = Booking::find($payment->booking_id)->update([
                  'status_booking'=>'Booking'
                ]);
    
                //post pesan ke admin
                $text = "Terdapat customer yang melakukan booking mobil, Silahkan cek pada halaman booking. Terimakasih";
                event(new FormSubmitted($text));
              } else {
                
                $payment->setSuccess();
                $booking = Booking::find($payment->booking_id)->update([
                  'status_booking'=>'Sewa'
                ]);
    
                //post pesan ke admin
                $text = "Terdapat customer yang melakukan pelunasan DP, Silahkan cek halaman transaksi sewa. Terimakasih";
                event(new FormSubmitted($text));
              }
 
            }
 
          } elseif ($transaction == 'settlement') {
 
            $payment->setSuccess();
            $booking = Booking::find($payment->booking_id)->update([
              'status_booking'=>'Sewa'
            ]);

            //post pesan ke admin
            $text = "Terdapat customer yang melakukan pelunasan DP, Silahkan cek halaman transaksi sewa. Terimakasih";
            event(new FormSubmitted($text));
 
          } elseif($transaction == 'pending'){
 
            $payment->setPending();
            $booking = Booking::find($payment->booking_id)->update([
              'status_booking'=>'Booking'
            ]);

            //post pesan ke admin
            $text = "Terdapat customer yang melakukan booking mobil, Silahkan cek pada halaman booking. Terimakasih";
            event(new FormSubmitted($text));
 
          } elseif ($transaction == 'deny') {
 

          } elseif ($transaction == 'expire') {
 
            $payment->setExpired();
            $booking = Booking::find($payment->booking_id)->update([
              'status_booking'=>'Batal'
            ]);
 
          } elseif ($transaction == 'cancel') {
 
            $payment->setFailed();
            $booking = Booking::find($payment->booking_id)->update([
              'status_booking'=>'Batal'
            ]);
 
          }
 
        });
 
        return;
    }

}