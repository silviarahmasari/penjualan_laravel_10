@extends('layout.mainlayout_u')
@section('page_title','Beranda')

<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <style type="text/css">
        .left    { text-align: left;}
        .right   { text-align: right;}
        .center  { text-align: center;}
        .justify { text-align: justify;}
    </style>
</head>

@section('content')
<body>
    <div class="section-header">
        <h1> Selamat Datang <span style="color:red">{{ Auth::user()->nama_pengguna }}</span></h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Rekomendasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($barang as $data)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center">
                                <div class="product-item pb-3">
                                    <div class="product-image" style="height: 180px; width: 180px">
                                        <img alt="image" src="{{ asset('assets/img/products/product-5-50.png') }}" style="height: 170px; width: 170px">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">{{ $data->nama_barang }}</div>
                                        <p>{{ $data->keterangan }}</p>
                                        <div class="product-cta">
                                            <a href="/member/pesan/{{ $data->id_barang }}" class="btn btn-outline-primary">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

</html>
