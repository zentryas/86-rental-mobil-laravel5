<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('backend/img/favicon.ico')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Laporan Cetak Print</title>
  </head>
  <body onload="window.print();" style="margin: 25px; background: #fff">
    <table>
        <tbody>
            <tr>
                <td rowspan="3" width="18%">
                    <img src="{{ asset('frontend/img/logo.png')}}" alt="logo" width="200px" height="60px" />
                </td>
                <td><h2 class="text-center">86RENTCAR YOGYAKARTA</h2></td>
            </tr>
            <tr>
                <td class="text-center">
                    Alamat : Jl. Tegal Melati No.59B, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581.
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    Nomor Hp/Wa : 0813 9111 4224 / 0813 9111 4224
                </td>
            </tr>
        </tbody>
    </table>
        <hr style="border: 2px solid #000;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <td>Nama Customer</td>
                        <td>:</td>
                        <td>{{ $booking->user->name }} {{ $booking->user->nama_belakang }}</td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <td>:</td>
                        <td>{{ $booking->user->nomor_hp }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Detail Sewa</h5>
                <hr>
            </div>
            <div class="col-md-6">
                <h5>Check List</h5>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <td>Kode Booking</td>
                        <td>:</td>
                        <td>{{ $booking->kode_booking }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Booking</td>
                        <td>:</td>
                        <td>{{ $booking->tgl_booking }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>:</td>
                        <td>{{ $booking->tgl_mulai }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>:</td>
                        <td>{{ $booking->tgl_selesai }}</td>
                    </tr>
                    <tr>
                        <td>Durasi Sewa</td>
                        <td>:</td>
                        <td>{{ $booking->durasi }} Hari</td>
                    </tr>
                    <tr>
                        <td>Jenis Mobil</td>
                        <td>:</td>
                        <td>{{ $booking->mobil->nama_mobil }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Polisi</td>
                        <td>:</td>
                        <td>{{ $booking->mobil->nopol }}</td>
                    </tr>
                    <tr>
                        <td>Biaya DP</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($booking->jml_dp) }}</td>
                    </tr>
                    <tr>
                        <td>Total Sewa</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($booking->jml_bayar+$booking->jml_dp) }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>
                            @if(empty($booking->status_pelunasan))
                                Belum Lunas
                            @endif
                            {{ $booking->status_pelunasan }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <td>KM Out .............................................................</td>
                        <td>KM In .............................................................</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> STNK</td>
                        <td><input type="checkbox" name=""> Dongkrak</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Radio Tape</td>
                        <td><input type="checkbox" name=""> Stang Dongkrak</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Speaker</td>
                        <td><input type="checkbox" name=""> Kunci Roda</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> AC</td>
                        <td><input type="checkbox" name=""> Kunci Pass</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Asbak</td>
                        <td><input type="checkbox" name=""> Kunci Lain</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Pemantik Api</td>
                        <td><input type="checkbox" name=""> Ban Cadangan</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Power Window</td>
                        <td><input type="checkbox" name=""> Karpet</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Sabuk Pengaman</td>
                        <td><input type="checkbox" name=""> Segitiga</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> Lp. Dashboard</td>
                        <td><input type="checkbox" name=""> Lp. Mundur</td>
                    </tr>
                </table>
            </div>
        </div>
        <h5>Cek Kondisi Kendaraan</h5>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <img src="{{ asset('backend/img/mb1.jpg')}}" alt="" class="w-100" height="200px">
            </div>
            <div class="col-md-3">
                <img src="{{ asset('backend/img/mb2.jpg')}}" alt="" class="w-100" height="200px">
            </div>
            <div class="col-md-3">
                <img src="{{ asset('backend/img/mb3.jpg')}}" alt="" class="w-100" height="200px">
            </div>
            <div class="col-md-3">
                <img src="{{ asset('backend/img/mb4.jpg')}}" alt="" class="w-100" height="200px">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mt-5 bg-light" style="font-size: 12px;">
                <table class="table table-borderless">
                    <tr>
                        <td colspan="4" class="text-danger">Nb: Jaminan Sewa</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name=""> STNK MOTOR</td>
                        <td><input type="checkbox" name=""> MOTOR</td>
                        <td><input type="checkbox" name=""> KTM</td>
                        <td><input type="checkbox" name=""> KTP</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-3 mt-5">
                <label for=""></label><br>
                <label for="">Customer</label><br><br><br>
                <label for="">{{ $booking->user->name }} {{ $booking->user->nama_belakang }}</label>
            </div>
            <div class="col-md-3 mt-5">
                <label for="">Yogyakarta, {{$tanggalSekarang->format('d M Y')}}</label><br>
                <label for="">Pemilik Usaha</label><br><br><br>
                <label for="">Aidri Ay Amrullah</label>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>