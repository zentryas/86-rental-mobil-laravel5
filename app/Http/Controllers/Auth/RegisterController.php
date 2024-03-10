<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Events\Auth\UserActivationEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required','string'],
            'jenis_kelamin' => ['required'],
            'agama' => ['required'],
            'nomor_hp' => ['required','min:9'],
            'alamat' => ['required','min:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Nama depan tidak boleh kosong!',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong!',
            'agama.required' => 'Agama tidak boleh kosong!',
            'nomor_hp.required' => 'Nomor hp tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.confirmed' => 'Password tidak sama!',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nama_belakang' => $data['nama_belakang'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'nomor_hp' => $data['nomor_hp'],
            'alamat' => $data['alamat'],

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => false,
            'activation_token' => str_random(255),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //mengirim email
        event(new UserActivationEmail($user));
        $this->guard()->logout();
        alert()->success('Silahkan cek email anda untuk melakukan aktivasi akun', 'Registrasi berhasil!');
        return redirect()->route('login');
    }
}
