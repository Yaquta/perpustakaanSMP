@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<h1>Anggota</h1>

<div class="mt-5 d-flex justify-content-end">
        <a href="anggota-add" class="btn btn-primary">Tambah Anggota</a>
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
                                <th>NISN</th>
                                <th>Phone</th>
                                <th>Address</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($anggotas as $item )
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->NISN}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->address}}</td>

                        </tr>
                        
                        @endforeach
                </tbody>
        </table>
</div>
@endsection