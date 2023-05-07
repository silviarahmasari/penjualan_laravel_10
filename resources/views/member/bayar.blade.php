@extends('layout.mainlayout_u')
@section('page_title','Pembayaran')

<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <style type="text/css">
        .left    { text-align: left;}
        .right   { text-align: right;}
        .center  { text-align: center;}
        .justify { text-align: justify;}
    </style>
</head>

@section('content')
<body>
    <div class="section-body">
        <div class="row">
            <div class="card col-md-6" style="margin: 80px">
                <div class="card-header text-center">
                    <h4>Nomor Virtual Account</h4>
                    <h6 style="color: orange">{{ $va }}</h6>
                </div>
                <div class="card-body text-center">
                    <button id="copyBtn" data-text="Text to copy">Salin Kode</button>
                    <div class="text-black-50">
                        Nama akun : {{ Auth::user()->nama_depan}} {{ Auth::user()->nama_belakang }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('custom_script')
<script type="text/javascript">

    const copyBtn = document.querySelector('#copyBtn');
    copyBtn.addEventListener('click', e => {
        const input = document.createElement('input');
        input.value = copyBtn.dataset.text;
        document.body.appendChild(input);
        input.select();
        if(document.execCommand('copy')) {
            alert('Text Copied');
            document.body.removeChild(input);
        }
    });

</script>
@endsection
</html>
