@extends('template.frontend.default')
@section('content')
<main role="main" class="main">
    <section class="main jumbotron mb-0 bg-#124747" style="height: 700px; background-image: none;">
        <div class="container">
            <h1 class="judul">Order Details</h1>
            <div class="bingkai" style="background-color: #fff; height: 500px;padding: 1px;margin-top: 42px; border-radius: 20px">
                <div class="tabel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:50%" scope="col">Nama Pemesan </th>
                                <th scope="col">: {{$tr->userName}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="width:50%" scope="row">Nama Penginapan</th>
                                <th scope="col">: {{$tr->penginapanName}}</th>
                            </tr>
                            <tr>
                                <th style="width:50%" scope="row">Lokasi</th>
                                <th scope="col">: {{$tr->alamat}}</th>
                            </tr>
                            <tr>
                                <th style="width:50%" scope="row">Tanggal Cek In</th>
                                <th scope="col">: {{$tr->checkin}}</th>
                            </tr>
                            <tr>
                                <th style="width:50%" scope="row">Tanggal Cek Out</th>
                                <th scope="col">: {{$tr->checkout}}</th>
                            </tr>
                            <tr>
                                <th style="width:50%" scope="row">Harga/malam</th>
                                <th scope="col">: Rp.{{$tr->hargamalam}}</th>
                            </tr>
                            <tr>
                                <th style="width:50%" scope="row"><b>Total Harga</b></th>
                                <th scope="col"><b>: Rp.{{$tr->harga}}</b></th>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{route('homepage')}}" class="btn btn-success" style="display: block; border-radius: 12px;">Kembali ke Beranda</a>
                </div>
                
            </div>
        </div>
        
    </section>
</main>
@endsection


@push('styles')

<head>
    <link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
    <style>
        .main {
            background-color: #124747;
        }

        img {
            max-height: 200px;
        }

        tr {
            font-size: 18px;
        }

        .text-image {
            font-size: 16px;
            margin-left: 5px;
            margin-top: 175px;
            color: #fff;
            background-color: black;
        }

        .tabel {
            margin-top: 45px;
            margin-bottom: 100px;
            margin-right: 50px;
            margin-left: 50px;
        }

        section {
            background-color: #124747;
        }

        .judul {
            font-family: 'Kaushan Script';
            color: #DFDBCD;
            font-size: 35;
            text-align: center;
        }

        .jumbotron {
            margin-top: 61px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        
    </style>
</head>
@endpush
