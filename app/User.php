<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nama_belakang', 'nomor_hp', 'alamat', 'jenis_kelamin', 'agama', 'email', 'password', 'active', 'activation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function booking()
    {
        return $this->hasMany('App\Booking','user_id','id');
    }
    
    public function payment()
    {
        return $this->hasOne('App\Payment','user_id','id');
    }

    public function testimoni()
    {
        return $this->hasMany('App\Testimoni','user_id','id');
    }

}
