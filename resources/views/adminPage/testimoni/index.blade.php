@extends('layouts.backend')
@section('title','Data Testimoni | 86Rentcar Yogyakarta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0 text-dark">Data Testimoni</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Data Testimoni</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-body">
        <table class="table table-hover" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Email Customer</th>
                    <th>Testimoni</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
            @endphp
            @foreach ($testimoni as $testi)                                    
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$testi->user->name}} {{$testi->user->nama_belakang}}</td>
                    <td>{{$testi->user->email}}</td>
                    <td>{{ $testi->testimoni }}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm delete" 
                            testi-id="{{$testi->id}}"
                            testi-nama="{{$testi->user->name}}">                        
                            <i class="fa fa-trash"></i>
                        </a>
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
</section>
@stop

@section('sweetAlert')
    <script type="text/javascript">
        $('.delete').click(function()
        {
            var id = $(this).attr('testi-id');
            var nama = $(this).attr('testi-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data testimoni oleh "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/testimoni/"+id+"/delete";
              }
            });
        });
    </script>
@stop