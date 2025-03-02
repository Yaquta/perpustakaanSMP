@extends('layouts.mainlayout')

@section('title', 'Kategori')

@section('content')
        <h1>Kategori</h1>

        <div class="mt-5 d-flex justify-content-end">
                <a href="category-deleted" class="btn btn-secondary me-3">Data Terhapus</a>
                <a href="category-add" class="btn btn-primary">Tambah Kategori</a>
        </div>

        <div class="mt-5">
                @if (session('status'))
                        <div class="alert alert-success">
                                {{ session('status') }}
                        </div>
                @endif

        </div>


        <div class="my-5">
                <table class="table">
                        <thead>
                                <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($categories as $item )
                                <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                                <a href="category-edit/{{$item->slug}}"><i class="bi bi-pencil-square"></i></a>
                                                <a href="category-delete/{{$item->slug}}"><i class="bi bi-trash3"></i></a>
                                        </td>
                                </tr>
                                
                                @endforeach
                        </tbody>
                </table>
        </div>
@endsection