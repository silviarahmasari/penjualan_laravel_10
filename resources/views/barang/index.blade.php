@extends('layout.mainlayout')
@section('page_title','Barang')

<!DOCTYPE html>
<head>
    <title>Barang</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@section('content')
<body>
<div class="container">
  @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Barang</h4>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-tools">
                            <a href="{{ URL::to('/barang/create') }}">
                                <td><button type="button" id="" class="btn btn-primary">+ Barang</button></td>
                            </a><br><br>
                        </div>
                        <table id="myTable" class="table table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">ID Barang</th>
                                    <th class="text-center">ID Admin</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Satuan</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Harga Beli</th>
                                    <th class="text-center">Harga Jual</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @foreach($barang as $data)
                                <tr>
                                    <td class="text-center">{{ $data->id_barang }}</td>
                                    <td class="text-center">{{ $data->id_user }}</td>
                                    <td class="text-center">{{ $data->nama_barang }}</td>
                                    <td class="text-center">{{ $data->keterangan }}</td>
                                    <td class="text-center">{{ $data->satuan }}</td>
                                    <td class="text-center">{{ $data->stok }}</td>
                                    <td class="text-center">{{ $data->harga_beli }}</td>
                                    <td class="text-center">{{ $data->harga_jual }}</td>
                                    <td>
                                        <a href='/barang/edit/{{ $data->id_barang }}'>
                                            <button class="btn btn-outline-warning btn-sm"> Edit </button>
                                        </a>
                                        <form action="/barang/delete/{{$data->id_barang}}" method='POST' class="form-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="fa fa-trash btn btn-outline-danger btn-sm"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection

@section('custom_script')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

@endsection
@section('script')
</html>
