@extends('layout.mainlayout')
@section('page_title','Hak Akses')

<!DOCTYPE html>
<head>
    <title>Hak Akses</title>
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
                    <h4>Data Hak Akses</h4>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-tools">
                            <a href="{{ URL::to('/hak_akses/create') }}">
                                <td><button type="button" id="" class="btn btn-primary">+ Hak Akses</button></td>
                            </a><br><br>
                        </div>
                        <table id="myTable" class="table table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">ID Akses</th>
                                    <th class="text-center">Nama Akses</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @foreach($akses as $data)
                                <tr>
                                    <td class="text-center">{{ $data->id_akses }}</td>
                                    <td class="text-center">{{ $data->nama_akses }}</td>
                                    <td class="text-center">{{ $data->keterangan }}</td>
                                    <td>
                                        <a href='/hak_akses/edit/{{ $data->id_akses }}'>
                                            <button class="btn btn-outline-warning btn-sm"> Edit </button>
                                        </a>
                                        <form action="/hak_akses/delete/{{$data->id_akses}}" method='POST' class="form-inline">
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
