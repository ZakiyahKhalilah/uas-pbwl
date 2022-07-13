@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Daftar Data Barang
    <a class="btn btn-primary btn-sm float-end" href="{{ url('barang/create') }}">
        Tambah Data</a>
    </h3>
    <br>
    <table class="table table-bordered table-hover border-dark text-center">
        <tr class="fw-bold table-active">
            <td>NAMA BARANG</td>
            <td>HARGA BARANG</td>
            <td>STOK BARANG</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
        @foreach($rows as $row)
        <tr class="fw-semibold">
            <td>{{ $row->barang_nama }}</td>
            <td>{{ $row->barang_harga }}</td>
            <td>{{ $row->barang_stok }}</td>
            <td><a href="{{ url('barang/' . $row->barang_id . '/edit') }}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ url('barang/' . $row->barang_id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection