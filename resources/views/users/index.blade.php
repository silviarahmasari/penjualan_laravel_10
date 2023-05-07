@extends('layout.mainlayout')
@section('page_title','Users')

<!DOCTYPE html>
<head>
    <title>Users</title>
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
                    <h4>Data Users</h4>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-tools">
                            <a href="{{ URL::to('/users/create') }}">
                                <td><button type="button" id="" class="btn btn-primary">+ Users</button></td>
                            </a><br><br>
                        </div>
                        <table id="myTable" class="table table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">ID Users</th>
                                    <th class="text-center">ID Akses</th>
                                    <th class="text-center">Nama Pengguna</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Nama Depan</th>
                                    <th class="text-center">Nama Belakang</th>
                                    <th class="text-center">No HP</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @foreach($users as $data)
                                <tr>
                                    <td class="text-center">{{ $data->id_user }}</td>
                                    <td class="text-center">{{ $data->id_akses }}</td>
                                    <td class="text-center">{{ $data->nama_pengguna }}</td>
                                    <td class="text-center">{{ $data->password }}</td>
                                    <td class="text-center">{{ $data->nama_depan }}</td>
                                    <td class="text-center">{{ $data->nama_belakang }}</td>
                                    <td class="text-center">{{ $data->no_hp }}</td>
                                    <td class="text-center">{{ $data->alamat }}</td>
                                    <td>
                                        <a href='/users/edit/{{ $data->id_user }}'>
                                            <button class="btn btn-outline-warning btn-sm"> Edit </button>
                                        </a>
                                        <form action="/users/delete/{{ $data->id_user}}" method='POST' class="form-inline">
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
