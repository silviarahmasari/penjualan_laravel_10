@extends('layout.mainlayout')
@section('page_title', 'Update Barang')

<!DOCTYPE html>
<head>
    <title>Update Barang</title>
    <style type = "text/css">
    .warna{
    color: red;
    }
    .bc{
    text-align: right;
    float: right;
    }
    .font{
      font-size: 15px;
    }
</style>
</head>

@section('content')
<body>
    <form action="/barang/update" method="POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <form role="form">
                        <div class="card-header">
                            <h4>Form Edit Data Barang</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_barang" value ="{{ $barang->id_barang }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ID Admin</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_admin" value ="{{ Auth::user()->id_user }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="keterangan" value ="{{ $barang->keterangan }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="satuan" value="{{ $barang->satuan }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="stok" value="{{ $barang->stok }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="harga_beli" value ="{{ $barang->harga_beli }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="harga_jual" value="{{ $barang->harga_jual }}"><br>
                                </div>
                            </div>
                            <div class="form-group col-lg-11">
                                <label>Timestamp</label>
                                <input type="text" class="form-control" name="created_at" value="{{ date('Y-m-d H:i:s') }}" readonly>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>
@endsection

</html>
