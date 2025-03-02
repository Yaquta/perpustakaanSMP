@extends('layouts.mainlayout')

@section('title', 'Tambah Kategori')

@section('content')

    <h1>Tambah Kategori</h1>

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

        <form action="category-add" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
            </div>
            <div class="mt-5">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="/categories" class="btn btn-danger">Batal</a>
            </div>
        </form>    
    </div>

@endsection