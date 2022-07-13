@extends('Layouts.app')

@section('content')
    <div class="container">

        <h3>Tambah Data Pelanggan</h3>
        <form action="{{ url('/pelanggan') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>NAMA PELANGGAN</label>
                <input type="text" class="form-control" name="pelanggan_nama">
            </div>
            <div class="mb-3">
                <label>EMAIL PELANGGAN</label>
                <input type="text" class="form-control" name="pelanggan_email">
            </div>
            <div class="mb-3">
                <label>ALAMAT</label>
                <input type="text" class="form-control" name="pelanggan_alamat">
            </div>
            <div class="mb-3">
                <input type="submit" value="SIMPAN" class="btn btn-success">
                <a href="{{ url('pelanggan/') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</div>
@endsection