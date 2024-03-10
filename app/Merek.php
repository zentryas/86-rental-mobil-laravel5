<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $fillable = [
        'nama_merek',
    ];

    public function mobil()
    {
        return $this->hasMany('App\Mobil','merek_id','id');
    }
}
