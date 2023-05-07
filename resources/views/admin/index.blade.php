@extends('layout.mainlayout')
@section('page_title', '')


<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style type="text/css">
        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .justify {
            text-align: justify;
        }
    </style>
</head>

@section('content')

    <body>
        <div class="section-header">
            <h1> Selamat Datang di Dashboard Super Admin</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $adminCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Member</h4>
                        </div>
                        <div class="card-body">
                            42
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Barang</h4>
                        </div>
                        <div class="card-body">
                            1,201
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Penjualan</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual (per satuan)</th>
                        <th scope="col">Total Harga Jual</th>
                        <th scope="col">Laba</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_jual_beli as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->jumlah_penjualan }}</td>
                            <td>Rp. {{ number_format($data->harga_beli ?? 0, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($data->harga_jual ?? 0, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($data->total_harga ?? 0, 0, ',', '.') }}</td>
                            <td>Rp.
                                {{ number_format($data->total_harga - $data->harga_beli * $data->jumlah_penjualan ?? 0, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection

</html>
