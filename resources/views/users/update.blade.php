@extends('layout.mainlayout')
@section('page_title', 'Update Users')

<!DOCTYPE html>
<head>
    <title>Update Users</title>
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
    <form action="/users/update" method="POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <form role="form">
                        <div class="card-header">
                            <h4>Form Edit Data Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID Users</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_user" value ="{{ $users->id_user }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ID Akses</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="id_akses" value ="{{ $users->id_akses }}" readonly><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="nama_pengguna" value="{{ $users->nama_pengguna }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class= "col-lg-11">
                                    <input type="password" class="form-control" name="password" value ="{{ $users->password }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="nama_depan" value="{{ $users->nama_depan }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="nama_belakang" value="{{ $users->nama_belakang }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="no_hp" value ="{{ $users->no_hp }}"><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class= "col-lg-11">
                                    <input type="text" class="form-control" name="alamat" value="{{ $users->alamat }}"><br>
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
