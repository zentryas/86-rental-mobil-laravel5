<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'mobil_id',
        'kode_booking',
        'tgl_booking',
        'tgl_mulai',
        'tgl_selesai',
        'status_booking',
        'durasi',
        'paket',
        'jml_bayar',
        'jml_dp',
        'tgl_kembali',
        'denda',
        'status_pelunasan',
        'status_pengambilan',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function mobil()
    {
        return $this->belongsTo('App\Mobil', 'mobil_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment', 'booking_id', 'id');
    }
    
    public function getimg1()
    {
        if(!$this->mobil->img1){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->mobil->img1);
    }
}
