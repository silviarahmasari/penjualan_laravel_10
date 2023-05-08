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
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                    $lastPengguna = null;
                    $total = 0;
                @endphp
                @foreach($allPenjualan as $index => $penjualan)
                @if($i !== 0 && $lastPengguna !== $penjualan->id_user)
                <tr>
                    <td></td>
                    <td colspan="3" class="font-weight-bold">Total Pembayaran</td>
                    <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
                @php
                    $total = 0;
                @endphp
                @endif
                <tr>
                    @if($lastPengguna !== $penjualan->id_user)
                    <th scope="row">{{ ++$i }}</th>
                    @php
                        $lastPengguna = $penjualan->id_user;
                    @endphp
                    @else
                    <th scope="row">{{ '' }}</th>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="section-body">
    </div>
</body>
@endsection

</html>
