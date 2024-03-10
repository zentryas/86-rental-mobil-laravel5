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
        <div class="container-fluid mt-3 mb-3">
            <div class="row">
                <label for=""><strong>Keterangan : </strong>Laporan Tanggal {{$mulai}} sampai dengan {{$selesai}} dengan status {{$tipe}}</label>
            </div>
        </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Booking</th>
                <th>Penyewa</th>
                <th>Mobil</th>
                <th>Tanggal Mulai</th>
                <th>Durasi</th>
                <th>Paket Sewa</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
            $harga_total = 0;
        @endphp
        @foreach($cetakBooking as $cetak)
            
            <tr>
                <td>{{$no}}</td>
                <td>{{$cetak->kode_booking}}</td>
                <td>{{$cetak->user->name}} {{$cetak->user->nama_belakang}}</td>
                <td>{{$cetak->mobil->nama_mobil}}</td>
                <td>{{$cetak->tgl_mulai}}</td>
                <td>{{$cetak->durasi}} Hari</td>
                <td>
                    @if( $cetak->paket == "1")
                        Plus Sopir
                    @elseif( $cetak->paket == "0")
                        Lepas Kunci
                    @endif
                </td>
                <td>Rp. {{ number_format($cetak->jml_bayar) }}</td>
            </tr>         
            @php
                $no++;
                $harga_total += $cetak->jml_bayar;
            @endphp
        @endforeach	 
        <tr>
            <th colspan="7" class="text-center">Total Pemasukan</th>
            <td>Rp. {{ number_format($harga_total) }}</td>
        </tr>	
        </tbody>
    </table>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            
            </div>
            <div class="col-md-4">
            
            </div>
            <div class="col-md-4">
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