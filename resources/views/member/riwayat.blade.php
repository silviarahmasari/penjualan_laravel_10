@extends('layout.mainlayout_u')
@section('page_title','Riwayat')

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat</title>
    <style type="text/css">
        .left    { text-align: left;}
        .right   { text-align: right;}
        .center  { text-align: center;}
        .justify { text-align: justify;}
    </style>
</head>

@section('content')
<body>
    <div class="section">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Nama Barang</th>
                    <th class="text-center" scope="col">Jumlah</th>
                    <th class="text-center" scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                    $lastPengguna = null;
                    $total = 0;
                @endphp
                @foreach($allPenjualan as $index => $penjualan)
                    <tr>
                        <td class="text-center">{{ $penjualan->Barang->nama_barang ?? '' }}</td>
                        <td class="text-center">{{ $penjualan->jumlah_penjualan ?? 0 }}</td>
                        <td class="text-center">Rp. {{ number_format(($penjualan->harga_jual ?? 0), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="section-body">
    </div>
</body>
@endsection

</html>
