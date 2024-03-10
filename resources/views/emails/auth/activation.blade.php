@component('mail::message')
# Silahkan Aktivasi Akun Anda

Terimakasih telah membuat akun customer di 86Rentcar Yogyakarta, silahkan tekan tombol aktivasi untuk melakukan proses selanjutnya

@component('mail::button', ['url' => route('auth.activate', [
            'token' => $user->activation_token,
            'email' => $user->email,
        ])
    ]
)
Aktivasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
