@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Daftar Pelanggan
    <a class="btn btn-primary btn-sm float-end" href="{{ url('pelanggan/create') }}">
        Tambah Data</a>
    </h3>
    <br>
    <table class="table table-bordered table-hover border-dark text-center">
        <tr class="fw-bold table-active">
            <td>NAMA PELANGGAN</td>
            <td>EMAIL PELANGGAN</td>
            <td>ALAMAT</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
        @foreach($rows as $row)
        <tr class="fw-semibold">
            <td>{{ $row->pelanggan_nama }}</td>
            <td>{{ $row->pelanggan_email }}</td>
            <td>{{ $row->pelanggan_alamat }}</td>
            <td><a href="{{ url('pelanggan/' . $row->pelanggan_id . '/edit') }}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ url('pelanggan/' . $row->pelanggan_id) }}" method="POST">
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