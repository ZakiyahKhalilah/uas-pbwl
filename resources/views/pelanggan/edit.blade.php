@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>Edit Data Pelanggan</h3>
        <form action="{{ url('/pelanggan/' . $row->pelanggan_id) }}" method="POST">
            @method('PATCH')
            @csrf
                <div class="mb-3">
                    <label>NAMA PELANGGAN</label>
                    <input type="text" class="form-control" name="pelanggan_nama" value="{{ $row->pelanggan_nama }}"></>
                </div>
                <div class="mb-3">
                    <label>EMAIL PELANGGAN</label>
                    <input type="text" class="form-control" name="pelanggan_email" value="{{ $row->pelanggan_email }}"></>
                </div>
                <div class="mb-3">
                    <label>ALAMAT</label>
                    <input type="text" class="form-control" name="pelanggan_alamat" value="{{ $row->pelanggan_alamat }}"></>
                </div>
                <div class="mb-3">
                    <input type="submit" value="UPDATE" class="btn btn-success">
                    <a href="{{ url('pelanggan/') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </form>
    </div>
@endsection