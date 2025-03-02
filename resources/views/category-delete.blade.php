@extends('layouts.mainlayout')

@section('title', 'Menghapus Kategori')

@section('content')
        <h2>Apakah anda yakin menghapus kategori {{$category->name}} ?</h2>
        <div class="mt-5">
            <a href="/category-destroy/{{$category->slug}}" class="btn btn-danger me-3">YA</a>
            <a href="/categories" class="btn btn-primary">TIDAK</a>
        </div>
@endsection