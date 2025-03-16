@extends('layouts.mainlayout')

@section('title', 'Anggota')

@section('content')
    <h1>Anggota</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="{{ route('anggota.deletedList') }}" class="btn btn-secondary me-3"">Data Terhapus </a>
        <a href="anggota-add" class="btn btn-primary">Tambah Anggota</a>
    </div>

    <div class="mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->NISN }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $item->id) }}"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{ route('anggota.delete', $item->id) }}"><i class="bi bi-trash3"></i></a>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
