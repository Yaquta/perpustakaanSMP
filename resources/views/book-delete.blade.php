@extends('layouts.mainlayout')

@section('title', 'Menghapus Buku')

@section('content')
        <h2>Apakah anda yakin menghapus buku {{$book->title}} ?</h2>
        <div class="mt-5">
            <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger me-3">YA</a>
            <a href="/books" class="btn btn-primary">TIDAK</a>
        </div>
@endsection