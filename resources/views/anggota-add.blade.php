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

        <form action="anggota-add" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Anggota">
            </div>
                <label for="name" class="form-label">NISN</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Anggota">
            <div>
                
            </div>
            <div class="mt-5">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="/categories" class="btn btn-danger">Batal</a>
            </div>
        </form>    
    </div>

@endsection
