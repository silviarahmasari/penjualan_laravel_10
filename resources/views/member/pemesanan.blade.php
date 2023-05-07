@extends('layout.mainlayout_u')
@section('page_title','Pemesanan')


<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <style type="text/css">
        .left    { text-align: left;}
        .right   { text-align: right;}
        .center  { text-align: center;}
        .justify { text-align: justify;}
        .warna{
            color: red;
            font-size: 12px;
        }
    </style>
</head>

@section('content')
<body>
    <form action="/member/checkout" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="section-body">
        @foreach($barang as $data)
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">{{ $data->nama_barang }}</h2>
                    <img alt="image" src="{{ asset('assets/img/products/product-5-50.png') }}" class="text-center" style="width: 270px; height: 270px; margin-left: 50px;">
                    <p style="padding: 15px 20px 5px 30px">{{ $data->keterangan }}</p>
                    <h6 style="padding: 0px 20px 50px 30px">Harga : {{ $data->harga_jual}}</h6>
                </div>
                <div class="card col-md-6" style="margin-top: 50px">
                    <div class="card-header">
                        <h4>Lengkapi Form Untuk Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">

                            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id_user }}" class="form-control select2bs4">
                            <input type="hidden" id="id_barang" name="id_barang" value="{{ $data->id_barang }}">
                            <input type="hidden" class="form-control select2bs4" id="created_at" name="created_at" value="{{ date('Y-m-d H:i:s') }}">
                            <input type="hidden" class="form-control select2bs4" id="updated_at" name="updated_at" value="{{ date('Y-m-d H:i:s') }}">

                            <div class="form-group">
                                <label>Produk</label>
                                <input type="text" class="form-control" id="id_produk" name="id_produk" value ="{{ $data->id_barang }} - {{ $data->nama_barang }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" id="harga_jual" value="{{ $data->harga_jual }}" name="harga_satuan" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jumlah barang yang dipesan</label>
                                <input type="number" class="form-control @error('jumlah_penjualan') is-invalid @enderror" id="jumlah_penjualan" required value="{{ old('jumlah_penjualan') }}" name="jumlah_penjualan" placeholder="">
                                    @error('jumlah_penjualan')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Sub Total</label>
                                <input type="text" class="form-control" id="total" required value="{{ old('total') }}" name="total" readonly>
                            </div>
                        </div>
                        <div class="card-footer text-bold text-center">
                            <button class="btn btn-primary col-12 text-center" value="Simpan">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </form>
</body>
@endsection
@section('custom_script')
<script type="text/javascript">

    $(document).ready(function(){
      $("#jumlah_penjualan").keyup(function(){
        var harga_jual  = parseInt($("#harga_jual").val());
        var jumlah_penjualan  = parseInt($("#jumlah_penjualan").val());
        var total = harga_jual * jumlah_penjualan;
        $("#total").val(total);
        console.log(total);
      });
    });

</script>
@endsection
@section('script')

</html>
