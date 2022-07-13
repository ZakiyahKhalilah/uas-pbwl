@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>Edit Data Barang</h3>
        <form action="{{ url('/barang/' . $row->barang_id) }}" method="POST">
            @method('PATCH')
            @csrf
                <div class="mb-3">
                    <label>NAMA BARANG</label>
                    <input type="text" class="form-control" name="barang_nama" value="{{ $row->barang_nama }}"></>
                </div>
                <div class="mb-3">
                    <label>HARGA BARANG</label>
                    <input type="text" class="form-control" name="barang_harga" value="{{ $row->barang_harga }}"></>
                </div>
                <div class="mb-3">
                    <label>STOK BARANG</label>
                    <input type="text" class="form-control" name="barang_stok" value="{{ $row->barang_stok }}"></>
                </div>
                <div class="mb-3">
                    <input type="submit" value="UPDATE" class="btn btn-success">
                    <a href="{{ url('barang/') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </form>
    </div>
@endsection