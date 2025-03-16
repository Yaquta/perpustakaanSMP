@extends('layouts.mainlayout')

@section('title', 'Tambah Anggota')

@section('content')

    <h1>Tambah Anggota</h1>

    <div class="mt-5 w-50">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="anggota-store" method="post">
            @csrf
            <div>
                <label for="username" class="form-label">Nama</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Anggota">
            </div>

            <div>
                <label for="NISN" class="form-label">NISN</label>
                <input type="text" name="NISN" id="NISN" class="form-control" placeholder="NISN Anggota">
            </div>

            <div>
                <label for="phone" class="form-label">No Telepon / HP</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nomor Hp Anggota">

            </div>

            <div>
                <label for="address" class="form-label">Alamat</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Alamat Anggota">
            </div>

            <div class="mt-5">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="/categories" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

@endsection
