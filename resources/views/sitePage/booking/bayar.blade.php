@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Pembayaran DP')
@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5 mb-3">
            <div class="how-it-works d-flex">
                <div class="step1">
                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                    <span class="caption">Login </span>
                </div>
                <div class="step1">
                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                    <span class="caption">Pilih Mobil</span>
                </div>
                <div class="step1">
                    <span class="number"><span><i class="fa fa-check"></i></span></span>
                    <span class="caption">Booking Detail</span>
                </div>
                <div class="step1">
                    <span class="number"><span><i class="fa fa-refresh"></i></span></span>
                    <span class="caption">Pembayaran</span>
                </div>
                <div class="step">
                    <span class="number"><span><i class="fa fa-times"></i></span></span>
                    <span class="caption">Selesai</span>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="alert alert-info kecil-alert" role="alert">
                <label><i class="fa fa-info-circle"></i> Petunjuk Pembayaran</label>
                <ol>
                    <li>Sebelum menekan tombol "Bayar Sekarang" Lihat dahulu info pembayaran online yang kami sediakan dan perhatikan batas waktu pelunasan DP</li>
                    <li>Pelunasan biaya sewa sebesar Rp. {{ number_format($kekurangan) }} dibayarkan pada saat pengambilan unit sewa</li>
                    <li>Jadi total biaya yang anda keluarkan yaitu sebesar Rp. {{ number_format($data->jml_bayar) }}</li>
                </ol>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ $data->getimg1()}}" alt="" width="100%">
                    <p>{{ $data->mobil->nama_mobil }}</p>
                </div>
            </div>
        </div> -->
        
        <div class="col-md-9 mb-3">
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
            <label class="text-danger">*Nb : Apabila transaksi booking anda sampai disini tanpa melakukan pembayaran, maka dibatalkan secara otomatis</label>
        </div>
        <div class="col-md-3">
            <form onsubmit="return submitForm();">
                <input type="hidden" name="booking_id" id="booking_id" value="{{ $data->id }}">
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="kekurangan" id="kekurangan" value="{{ $kekurangan }}">
                <div class="card mt-4 mb-2">
                    <div class="card-header bg-primary">
                        <h5 class="text-white"><i class="fa fa-info-circle"></i> Info pembayaran DP</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center bayarkan">
                                <h5>Biaya DP</h5>
                                <h2 class="text-success">Rp. {{ number_format($data->jml_dp) }}</h1>
                                <p>Nb : dibayarkan sekarang</p>
                                <input type="hidden" name="dp" id="dp" value="{{ $data->jml_dp }}">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <button id="submit" class="btn btn-warning mb-3"> <i class="fa fa-paper-plane"></i> Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>


<script
    src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('services.midtrans.clientKey') }}">
</script>

<script>
    function submitForm() {
        // Kirim request ajax
        $.post("{{ route('pembayaran.dp') }}", {
                _method: 'POST',
                _token: '{{ csrf_token() }}',
                booking_id: $('input#booking_id').val(),
                user_id: $('input#user_id').val(),
                dp: $('input#dp').val(),
                kekurangan: $('input#kekurangan').val(),
            },
            function (data, status) {
                snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function (result) {
                        // location.reload();
                        window.location.href = "http://86rentalmobil.online/riwayat-transaksi";
                    },
                    // Optional
                    onPending: function (result) {
                        window.location.href = "http://86rentalmobil.online/riwayat-transaksi";
                    },
                    // Optional
                    onError: function (result) {
                        location.reload();
                    }
                });
            });
        return false;
    }

</script>
@endsection
