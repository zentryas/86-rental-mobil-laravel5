@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Riwayat')
@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"> <i class="fa fa-retweet"></i> Riwayat Transaksi
                    <?php
                        $payment = \App\Payment::where('user_id', Auth::user()->id)->get();
                    ?>
                    <span class="badge badge-warning badge-pill">{{ $payment->count() }}</span>
                </a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"> <i class="fa fa-calendar"></i> Kalender Sewa</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"> <i class="fa fa-comments-o"></i> Testimoni Anda
                    <?php
                        $testi = \App\Testimoni::where('user_id', Auth::user()->id)->get();
                    ?>
                    <span class="badge badge-info badge-pill text-white">{{ $testi->count() }}</span>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i> Informasi
                                <ol>
                                    <li>Apabila transaksi booking anda mempunyai status <span class="badge badge-warning">Tertunda</span> maka anda harus menyelesaikan pembayaran terlebih dahulu dengan menekan tombol "Bayarkan"</li>
                                    <li>Perhatikan batas akhir pembayaran pada Pop-Up Pembayaran, Ketika anda menekan tombol "Bayarkan"</li>
                                    <li>Apabila mempunyai status <span class="badge badge-success">DP Lunas</span> silahkan klik "Info Selanjutnya"</li>
                                </ol>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="myTable">
                                    <thead class="thead-light text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Booking</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Jam Mulai</th>
                                            <th>Durasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($pay as $row)
                                        <tr>
                                            <td>{{ $no}}</td>
                                            <td>{{ $row->booking->kode_booking }}</td>
                                            <td>{{ date('d F Y', strtotime($row->booking->tgl_mulai)) }}</td>
                                            <td>{{ date('H:i A', strtotime($row->booking->tgl_mulai)) }}</td>
                                            <td>{{ $row->booking->durasi }} hari</td>
                                            <td>
                                                @if($row->status == "pending")
                                                    <span class="badge badge-warning">Tertunda</span>
                                                @elseif($row->status == "success")
                                                    <span class="badge badge-success">DP Lunas</span>
                                                @elseif($row->status == "failed")
                                                    <span class="badge badge-danger">Gagal</span>
                                                @elseif($row->status == "expired")
                                                    <span class="badge badge-danger">Kadaluarsa</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->status == 'pending')
                                                    
                                                        <button class="btn btn-warning btn-sm" onclick="snap.pay('{{ $row->snap_token }}')"><i class="fa fa-location-arrow"></i> Bayarkan</button>
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#detail{{$row->id}}" class="btn btn-light btn-sm"> <i class="fa fa-info-circle"></i> Detail</a>
                                                    
                                                @elseif ($row->booking->status_booking == 'Selesai')
                                                        @if(empty($row->status_post))
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#post{{$row->id}}" class="btn btn-danger btn-sm"> <i class="fa fa-location-arrow"></i> Post Testimoni</a>
                                                        @endif
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#detail{{$row->id}}" class="btn btn-light btn-sm"> <i class="fa fa-info-circle"></i> Detail</a>
                                                    
                                                @elseif ($row->booking->status_booking == 'Sewa')
                                                    
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#info{{$row->id}}" class="btn btn-primary btn-sm"> <i class="fa fa-random"></i> Info Selanjutnya</a>
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#detail{{$row->id}}" class="btn btn-light btn-sm"> <i class="fa fa-info-circle"></i> Detail</a>
                                                
                                                @elseif ($row->status == 'failed')
                                                    
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#detail{{$row->id}}" class="btn btn-light btn-sm"> <i class="fa fa-info-circle"></i> Detail</a>
                                                    
                                                @elseif ($row->status == 'expired')
                                                    
                                                        <a href="/{{ $row->id }}" data-toggle="modal" data-target="#detail{{$row->id}}" class="btn btn-light btn-sm"> <i class="fa fa-info-circle"></i> Detail</a>
                                                    
                                                @endif

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="detail{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header pophead">
                                                                <h3 class="modal-title" id="exampleModalLabel"> <i class="fa fa-info-circle"></i> Info Transaksi Detail <span class="text-info">{{ $row->booking->kode_booking }}</span></h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="color: #000; font-size: 12px;">
                                                                <div class="alert alert-info" role="alert">
                                                                    <label><i class="fa fa-info-circle"></i> Informasi</label>
                                                                    <ol>
                                                                        <li>Biaya pembayaran DP anda sebesar Rp. {{ number_format($row->booking->jml_dp) }}.</li>
                                                                        <li>Biaya pelunasan sewa anda sebesar Rp. {{ number_format($row->booking->jml_bayar-$row->booking->jml_dp) }}</li>
                                                                    </ol>
                                                                </div>
                                                                <div class="media mt-3 mb-3">
                                                                    <img src="{{ $row->booking->mobil->getimg1() }}" class="mr-3" alt="..." width="100px">
                                                                      <div class="media-body">
                                                                            <h5 class="mt-0">{{ $row->booking->mobil->nama_mobil }}, {{ $row->booking->mobil->nopol }}</h5>
                                                                            Mobil ini mempunyai kapasitas tempat duduk sebanyak {{ $row->booking->mobil->seat }} kursi, menggunakan bahan bakar {{ $row->booking->mobil->bb }}, dengan transmisi {{ $row->booking->mobil->transmisi }}
                                                                            <table class="w-100 table-borderless table-sm">
                                                                                <tr>
                                                                                    <th>Kode Booking</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ $row->booking->kode_booking }}</td>
                                                                                    </tr>
                                                                                <tr>
                                                                                    <th>Tanggal Mulai</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ date('d F Y', strtotime($row->booking->tgl_mulai)) }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Jam Mulai</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ date('H:i A', strtotime($row->booking->tgl_mulai)) }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Durasi</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ $row->booking->durasi }} hari</td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <th>Tanggal Booking</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ date('d F Y', strtotime($row->booking->tgl_booking)) }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Tanggal Selesai</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ date('d F Y', strtotime($row->booking->tgl_selesai)) }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Jam Selesai</th>
                                                                                    <td>:</td>
                                                                                    <td>{{ date('H:i A', strtotime($row->booking->tgl_selesai)) }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Paket Sewa</th>
                                                                                    <td>:</td>
                                                                                    <td>    
                                                                                        @if($row->booking->paket == "1")
                                                                                            Plus Sopir
                                                                                        @elseif($row->booking->paket == "0")
                                                                                            Lepas Kunci
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Post Testimoni -->
                                                <div class="modal fade" id="post{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header pophead">
                                                                <h3 class="modal-title" id="exampleModalLabel">Kirim Testimony untuk kode sewa {{ $row->booking->kode_booking }}</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/post-testimoni" method="POST" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                    <input type="hidden" name="id" id="" value="{{ $row->id }}">
                                                                    <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                                                                    <div class="form-group">
                                                                        <label for="">Tuliskan Testimoni Anda</label>
                                                                        <textarea name="testimoni" class="form-control @if($errors->has('testimoni')) is-invalid @endif" id="" rows="3"></textarea>
                                                                        @if($errors->has('testimoni'))
                                                                            <div class="invalid-feedback">
                                                                                {{$errors->first('testimoni')}}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Kirim</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Modal Info Selanjutnya -->
                                                <div class="modal fade" id="info{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header pophead">
                                                                <h3 class="modal-title" id="exampleModalLabel">Info selanjutnya untuk kode booking {{ $row->booking->kode_booking }}</h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="alert alert-info" role="alert">
                                                                    <ol>
                                                                        <li>Pembayaran DP untuk kode booking {{ $row->booking->kode_booking }} sudah lunas </li>
                                                                        <li>Selanjutnya melakukan pelunasan pembayaran pada saat pengambilan mobil sewa</li>
                                                                        <li>Jangan lupa untuk membawa persyaratan sewa yang tercantum dalam halaman <a href="/syarat-&-ketentuan">Syarat dan Ketentuan</a></li>
                                                                        <li>Terimakasih</li>
                                                                    </ol>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card">
                        <div class="card-body">
                            {!! $booking_detail->calendar() !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="container">
                        @if(count($testi))
                        <div class="row">
                            @foreach($testi as $puas)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p>{{ $puas->testimoni }}</p>
                                                <footer class="blockquote-footer">{{ $puas->created_at->diffForHumans() }}</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                        <div class="container text-center">
                            <div class="row justify-content-center">
                                <div class="alert alert-danger" role="alert">
                                    <i class="fa fa-exclamation-circle"></i> Maaf! Anda belum mempunyai riwayat testimoni, Segera lakukan transaksi sewa mobil agar dapat melakukan posting testimoni. Terimakasih
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>

<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>

@stop
@section('jadwal')
    <!-- Penjadwalan -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $booking_detail->script() !!}
@stop