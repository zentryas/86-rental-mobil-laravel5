@extends('layouts.frontend')
@section('title','86Rentcar Yogyakarta | Syarat & Ketentuan')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-9 mt-5">
            <h3 class="mb-3 mt-3">Syarat dan Ketentuan</h3>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne" style="background-color: #4e4e4e;">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-info-circle"></i> Persyaratan Rental Mobil Untuk Perusahaan
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body" style="border: 1px solid #4e4e4e; border-top: none; color:#4e4e4e">
                            <ol>
                                <li>Fotokopi SITU SIUP TDP dan NPWP </li>
                                <li>Surat pemesanan kendaraan</li>
                                <li>Fotokopi KTP direksi, atau pejabat yang bertanggung jawab</li>
                                <li>Surat kuasa bila bukan direktur perusahaan yang bertanggung jawab</li>
                                <li>Fotokopi SIM pengemudi</li>
                                <li>Bersedia untuk kami survey kantor dan tempat tinggal pemohon</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo" style="background-color: #4e4e4e;">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-info-circle"></i> Persyaratan Rental Mobil Untuk Perorangan
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body" style="border: 1px solid #4e4e4e; border-top: none; color:#4e4e4e">
                            <ol>
                                <li>KTP</li>
                                <li>KTM (Kartu tanda mahasiswa) / SIM C</li>
                                <li>STNK MOTOR KK</li>
                                <li>Motor yang ditinggal di garasi 86Rentcar Yogyakarta</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree" style="background-color: #4e4e4e;">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa fa-info-circle"></i> Penyewa dilarang melakukan
                        </button>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body" style="border: 1px solid #4e4e4e; border-top: none; color:#4e4e4e">
                            <ol>
                                <li>Menggadaikan kendaraan</li>
                                <li>Menyewakan kembali kepada orang lain</li>
                                <li>Menjual kendaraan</li>
                                <li>Memindah tangankan sewa</li>
                                <li>Menggunakan mobil untuk tindak kejahatan</li>
                                <li>Menaikan harga sewa dari penawaran kami (Mark Up)</li>
                                <li>Kendaraan hanya dapat dikemudikan oleh orang yang memiliki SIM</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-justify mt-5">
            <div class="card mt-5">
                <div class="card-header" style="background-color: #4e4e4e;">
                    <h5 class="text-white"> <i class="fa fa-info-circle"></i> Penting!</h5>
                </div>
                <div class="card-body">
                    <p>Bagaimana melakukan pembookingan secara online?</p>
                    <a href="/reservasi">Klik disini</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection