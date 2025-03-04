@extends('layouts.mainlayout');

@section('title', 'Delete-Anggota');

@section('content')
    <div>
        <h1>Apakah anda yakin ingin menghapus data anggota {{ $anggota->username }}?</h1>
        <div class="mt-5">
            <a href="{{ route('anggota.destroy', $anggota->id) }}}}" class="btn btn-danger me-3">YA</a>
            <a href="{{ route('anggota.index') }}" class="btn btn-primary">TIDAK</a>
        </div>
    </div>
@endsection
