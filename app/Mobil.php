<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'merek_id', 
        'nama_mobil',
        'nopol',
        'tahun', 
        'seat', 
        'transmisi', 
        'bb',
        'status_mobil', 
        'tarif_mobil', 
        'tarif_sopir', 
        'img1',
    ];

    public function getimg1()
    {
        if(!$this->img1){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->img1);
    }

    public function booking()
    {
        return $this->hasMany('App\Booking','mobil_id','id');
    }

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'merek_id', 'id');
    }
}
