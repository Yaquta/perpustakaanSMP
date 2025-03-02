@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')


<style>
.cover-not-found {
        width: 100px;
        height: auto;
}

.cover-found {
        width: 100px;
        height: auto;
}

</style>

        <h1>List Buku</h1>

        <div class="mt-5 d-flex justify-content-end">
                <a href="book-deleted" class="btn btn-secondary me-3">Data Terhapus</a>
                <a href="book-add" class="btn btn-primary">Tambah Buku</a>
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
                                        <th>Kode</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($books as $item )
                                <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->book_code}}</td>
                                        <td class="image">
                                                @if ($item->cover!='')
                                                        <img src="{{asset('storage/cover/'.$item->cover)}}" alt="" class="cover-found">
                                                @else
                                                        <img src="{{asset('assets/img/cover-not-found.jpg')}}" alt="" class="cover-not-found" >

                                                @endif
                                                {{$item->title}}
                                                
                                        </td>
                                        <td>
                                                @foreach ($item->categories as $category )
                                                        ({{$category->name}}) 
                                                @endforeach
                                        </td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                                <a href="book-edit/{{$item->slug}}"><i class="bi bi-pencil-square"></i></a>
                                                <a href="book-delete/{{$item->slug}}"><i class="bi bi-trash3"></i></a>
                                        </td>
                                </tr>
                                
                                @endforeach
                        </tbody>
@endsection