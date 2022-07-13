@extends('Layouts.app')

@section('content')
    <div class="container">

        <h3>Tambah Data Barang</h3>
        <form action="{{ url('/barang') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>NAMA BARANG</label>
                <input type="text" class="form-control" name="barang_nama">
            </div>
            <div class="mb-3">
                <label>HARGA BARANG</label>
                <input type="text" class="form-control" name="barang_harga">
            </div>
            <div class="mb-3">
                <label>STOK BARANG</label>
                <input type="text" class="form-control" name="barang_stok">
            </div>
            <div class="mb-3">
                <input type="submit" value="SIMPAN" class="btn btn-success">
                <a href="{{ url('barang/') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</div>
@endsection