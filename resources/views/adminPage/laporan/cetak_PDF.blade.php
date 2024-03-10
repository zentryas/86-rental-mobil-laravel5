<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('backend/img/favicon.ico')}}">
    <title>Laporan Cetak PDF</title>
    <style type="text/css">
        table {
            font-family: sans-serif;
            font-size: 12px;
            color: #000;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        
        table, th, td {
            border: 1px solid #999;
            padding: 5px 10px;
        }
    </style>
  </head>
  <body>
    <table>
        <tr>
            <td rowspan="2" width="30%"><img src="{{url('/frontend/img/logo.png')}}" alt="logo" width="100%"></td>
            <td width="70%">
                <h1>86RENTCAR YOGYAKARTA</h1>
                <p>Alamat : Jl. Tegal Melati No.59B, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581, Indonesia</p>
            </td>
        </tr>
    </table>
    <hr style="border: 2px solid #000;">
    <div class="container" style="margin-top: 15px;">
        <label for=""><strong>Keterangan : </strong>Laporan Tanggal {{$mulai}} sampai dengan {{$selesai}} dengan status {{$tipe}}</label>
    </div>
    <table>
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

    <div class="container">
        <label for="">Yogyakarta, {{$tanggalSekarang->format('d M Y')}}</label><br>
        <label for="">Pemilik Usaha</label><br><br><br>
        <label for="">Aidri Ay Amrullah</label>
    </div>

  </body>
</html>