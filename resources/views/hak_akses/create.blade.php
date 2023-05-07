@extends('layout.mainlayout')
@section('page_title', 'Tambah Hak Akses')

<!DOCTYPE html>
<head>
    <title>Tambah Hak Akses</title>
    <style type = "text/css">
    .warna{
      color: red;
      font-size: 12px;
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
    <form action="/hak_akses/insert" method='POST' enctype="multipart/form-data">
        @csrf
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <!-- general form elements -->
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Hak Akses</h4>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <input type="hidden" id="id_akses" name="id_akses" class="form-control select2bs4">
                            <div class="form-group">
                                <label>Nama Akses</label>
                                <input type="text" class="form-control @error('nama_akses') is-invalid @enderror" name="nama_akses" required value="{{ old('nama_akses') }}" name="nama_akses">
                                @error('nama_akses')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required value="{{ old('keterangan') }}" name="keterangan" placeholder="">
                                @error('keterangan')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Timestamp</label>
                                <input type="text" class="form-control" name="created_at" value="{{ date('Y-m-d H:i:s') }}" readonly>
                            </div>
                            <button class="btn btn-primary mr-1" type="submit" value="Simpan">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>
@endsection

</html>
