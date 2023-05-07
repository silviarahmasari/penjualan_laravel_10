@extends('layout.mainlayout')
@section('page_title', '')


<!DOCTYPE html>
<html>

<head>
    <title>Hisotry</title>
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
    <div class="section-header">
        <h1>History</h1>
    </div>
    <div class="section">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Jumlah Penjualan</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->nama_pengguna }}</td>
                        <td>{{ $data->jumlah_penjualan }}</td>
                        <td>{{ $data->barang->nama_barang }}</td>
                        <td>Rp. {{ number_format($data->harga_jual ?? 0, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($data->harga_jual * $data->jumlah_penjualan ?? 0, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="section-body">

    </div>
@endsection

</html>
