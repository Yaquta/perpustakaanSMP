@extends('layouts.mainlayout')

@section('title', 'Buku Terhapus')

@section('content')
        <h1>Buku Terhapus</h1>

        <div class="mt-5 d-flex justify-content-end">
                <a href="/books" class="btn btn-secondary me-3">Kembali</a>
                
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
                                        <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($deletedBooks as $item )
                                <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->book_code}}</td>
                                        <td>{{$item->title}}</td>
                                        
                                        <td>
                                                <a href="/book-restore/{{$item->slug}}">restore</a>
                                                
                                        </td>
                                </tr>
                                
                                @endforeach
                        </tbody>
                </table>
        </div>
@endsection