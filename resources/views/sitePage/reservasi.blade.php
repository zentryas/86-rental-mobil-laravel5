@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Cara Booking')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-5">Cara Booking</h3>
            <p>Berikut merupakan cara melakukan pembookingan mobil secara online</p>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td><h5>1.</h5></td>
                        <td width="50%">
                            <div class="how-it-works d-flex">
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Login </span>
                                </div>
                            </div>
                        </td>
                        <td><h5>Melakukan Login Ke sistem</h5></td>
                        <td>
                            <p>Apabila belum mempunyai akun untuk login silahkan klik <a href="/register"> Daftar</a> terlebih dahulu.</p>
                        </td>
                    </tr>
                    <tr>
                        <td><h5>2.</h5></td>
                        <td>
                            <div class="how-it-works d-flex">
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Login </span>
                                </div>
                                <div class="step2">
                                    <span class="number"><span><i class="fa fa-refresh"></i></span></span>
                                    <span class="caption">Pilih Mobil </span>
                                </div>
                            </div>
                        </td>
                        <td><h5>Pilih mobil sesuai dengan kebutuhan anda</h5></td>
                        <td>
                            <p>Silahkan pilih mobil pada menu halaman <a href="/daftar-mobil">Daftar Mobil</a> lalu klik "Booking"</p>
                        </td>
                    </tr>
                    <tr>
                        <td><h5>3.</h5></td>
                        <td>
                            <div class="how-it-works d-flex">
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Login </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Pilih Mobil </span>
                                </div>
                                <div class="step2">
                                    <span class="number"><span><i class="fa fa-refresh"></i></span></span>
                                    <span class="caption">Booking</span>
                                </div>
                            </div>
                        </td>
                        <td><h5>Menentukan Waktu dan Paket Sewa</h5></td>
                        <td>
                            <p>Pada halaman ini anda menentukan waktu dan paket sewa. Pada halaman ini juga terdapat kalender mobil untuk mengecek aktivitas pembookingan atau penyewaan pada mobil tersebut</p>
                        </td>
                    </tr>
                    <tr>
                        <td><h5>4.</h5></td>
                        <td>
                            <div class="how-it-works d-flex">
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Login </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Pilih Mobil </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Booking</span>
                                </div>
                                <div class="step2">
                                    <span class="number"><span><i class="fa fa-refresh"></i></span></span>
                                    <span class="caption">Detail Booking</span>
                                </div>
                            </div>
                        </td>
                        <td><h5>Halaman Detail Booking</h5></td>
                        <td>
                            <p>Halaman ini berfungsi untuk mengecek kembali transaksi pembookingan yang telah dibuat, apakah sudah sesuai atau belum</p>
                        </td>
                    </tr>
                    <tr>
                        <td><h5>5.</h5></td>
                        <td>
                            <div class="how-it-works d-flex">
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Login </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Pilih Mobil </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Booking</span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Detail Booking</span>
                                </div>
                                <div class="step2">
                                    <span class="number"><span><i class="fa fa-refresh"></i></span></span>
                                    <span class="caption">Pembayaran</span>
                                </div>
                            </div>
                        </td>
                        <td><h5>Melakukan Pembayaran Booking</h5></td>
                        <td>
                            <p>Pada halaman ini customer harus melakukan pembayaran booking dengan cara menekan tombol "Bayar Sekarang" pada halaman ini. Apabila berhenti dihalaman ini tanpa menekan tombol tersebut. maka pembookingan dibatalkan secara otomatis oleh sistem</p>
                        </td>
                    </tr>
                    <tr>
                        <td><h5>5.</h5></td>
                        <td>
                            <div class="how-it-works d-flex">
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Login </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Pilih Mobil </span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Booking</span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Detail Booking</span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Pembayaran</span>
                                </div>
                                <div class="step1">
                                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                                    <span class="caption">Selesai</span>
                                </div>
                            </div>
                        </td>
                        <td><h5>Halaman selesai transaksi</h5></td>
                        <td>
                            <p>Setelah selesai melakukan pembayaran maka akan redirect ke halaman riwayat transaksi anda. Apabila belum melakukan pembayaran maka bisa diselesaikan dengan klik "Complete Payment" <span class="text-danger">Perhatikan Batas Akhir Pembayaran</span></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection