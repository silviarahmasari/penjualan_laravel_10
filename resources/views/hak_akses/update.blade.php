@extends('layout.mainlayout')
@section('page_title', 'Update Hak Akses')

<!DOCTYPE html>
<head>
    <title>Update Hak Akses</title>
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
    <form action="/hak_akses/update" method="POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <form role="form">
                        <div class="card-header">
                            <h4>Form Edit Data Hak Akses</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID Akses</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_akses" value ="{{ $akses->id_akses }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Akses</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="nama_akses" value="{{ $akses->nama_akses }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="keterangan" value ="{{ $akses->keterangan }}"><br>
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
