@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Tarif PPN')
@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h5 class="justify-content-center mb-4">Terima pembayaran online (cash-in) dari Anda. </h5>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bank Transfer</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">E-Wallet</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="mt-3">Bank Transfer</h5>
                                <p class="mt-2">Pembayaran Transfer baik melalui ATM, mobile, atau internet banking.</p>
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td> <h5>Metode Pembayaran</h5> </td>
                                        <td> <h5>Biaya Per Transaksi</h5> </td>
                                        <td> <h5>Batas Waktu</h5> </td>
                                    </tr>
                                    <tr>
                                        <td>Virtual Account(Semua ATM di Indonesia)</td>
                                        <td><span class="text-primary">Rp 4.000/transaksi</span></td>
                                        <td>1 Jam</td>
                                    </tr>
                                    <tr>
                                        <td>Mandiri Bill Payment</td>
                                        <td><span class="text-primary">Rp 4.000/transaksi</span></td>
                                        <td>1 Jam</td>
                                    </tr>
                                    <tr>
                                        <td>BCA Virtual Account</td>
                                        <td><span class="text-primary">Rp 4.000/transaksi</span></td>
                                        <td>1 Jam</td>
                                    </tr>
                                    <tr>
                                        <td>BNI Virtual Account</td>
                                        <td><span class="text-primary">Rp 4.000/transaksi</span></td>
                                        <td>1 Jam</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="mt-3">e-Wallet</h5>
                                <p class="mt-2">Pembayaran dengan sistem e-Wallet dari akun/nomor/PIN ponsel pelanggan.</p>
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td> <h5>Metode Pembayaran</h5> </td>
                                        <td> <h5>Biaya Per Transaksi</h5> </td>
                                        <td> <h5>Batas Waktu</h5> </td>
                                    </tr>
                                    <tr>
                                        <td>GoPay</td>
                                        <td><span class="text-primary">2%/transaksi*</span> *terdapat perbedaan harga untuk industri-industri tertentu</td>
                                        <td>1 Jam</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection