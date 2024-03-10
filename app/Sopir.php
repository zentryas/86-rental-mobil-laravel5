<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    protected $fillable = [
        'nama_sopir', 'status_sopir',
    ];
}
