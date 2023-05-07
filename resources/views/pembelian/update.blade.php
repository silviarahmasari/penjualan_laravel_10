@extends('layout.mainlayout')
@section('page_title', 'Update Pembelian')

<!DOCTYPE html>
<head>
    <title>Update Pembelian</title>
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
    <form action="/pembelian/update" method="POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <form role="form">
                        <div class="card-header">
                            <h4>Form Edit Data Pembelian</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID Pembelian</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_pembelian" value ="{{ $pembelian->id_pembelian }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ID Admin</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_user" value ="{{ $pembelian->id_user }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ID Barang</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_barang" value="{{ $pembelian->id_barang }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pembelian</label>
                                <div class= "col-lg-11">
                                    <input type="number" class="form-control" name="jumlah_pembelian" value ="{{ $pembelian->jumlah_pembelian }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <div class= "col-lg-11">
                                    <input type="number" class="form-control" name="harga_beli" value="{{ $pembelian->harga_beli }}"><br>
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
