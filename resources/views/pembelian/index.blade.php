@extends('layout.mainlayout')
@section('page_title','Pembelian')

<!DOCTYPE html>
<head>
    <title>Pembelian</title>
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
                    <h4>Data Pembelian Barang</h4>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-tools">
                            <a href="{{ URL::to('/pembelian/create') }}">
                                <td><button type="button" id="" class="btn btn-primary">+ Pembelian</button></td>
                            </a><br><br>
                        </div>
                        <table id="myTable" class="table table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">ID Pembelian</th>
                                    <th class="text-center">ID Admin</th>
                                    <th class="text-center">ID Barang</th>
                                    <th class="text-center">Jumlah Pembelian</th>
                                    <th class="text-center">Harga Beli</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @foreach($pembelian as $data)
                                <tr>
                                    <td class="text-center">{{ $data->id_pembelian }}</td>
                                    <td class="text-center">{{ $data->id_user }}</td>
                                    <td class="text-center">{{ $data->id_barang }}</td>
                                    <td class="text-center">{{ $data->jumlah_pembelian }}</td>
                                    <td class="text-center">{{ $data->harga_beli }}</td>
                                    <td>
                                        <a href='/pembelian/edit/{{ $data->id_pembelian }}'>
                                            <button class="btn btn-outline-warning btn-sm"> Edit </button>
                                        </a>
                                        <form action="/pembelian/delete/{{ $data->id_pembelian }}" method='POST' class="form-inline">
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
