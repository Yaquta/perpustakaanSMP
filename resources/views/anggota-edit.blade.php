@extends('layouts.mainlayout')

@section('title', 'Edit-Anggota')

@section('content')

    <div class="mt-5 w-50">
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="username" class="form-label">Nama</label>
                <input value="{{ $anggota->username }}" type="text" name="username" id="username" class="form-control"
                    placeholder="{{ $anggota->username }}">
            </div>

            <div>
                <label for="NISN" class="form-label">NISN</label>
                <input value="{{ $anggota->NISN }}" type="text" name="NISN" id="NISN" class="form-control"
                    placeholder="{{ $anggota->NISN }}">
            </div>

            <div>
                <label for="phone" class="form-label">No Telepon / HP</label>
                <input value="{{ $anggota->phone }}" type="text" name="phone" id="phone" class="form-control"
                    placeholder="{{ $anggota->phone }}">
            </div>

            <div>
                <label for="address" class="form-label">Alamat</label>
                <input value="{{ $anggota->address }}" type="text" name="address" id="address" class="form-control"
                    placeholder="{{ $anggota->address }}">
            </div>

            <div class="mt-5">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('anggota.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

@endsection
