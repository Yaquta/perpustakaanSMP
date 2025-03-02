@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')


<style>
        .card-data{
                border: solid;
                padding: 20px 50px;
                
        }
        .card-data.book {
                background-color: azure;
        }
        .card-data.category {
                background-color: antiquewhite;
        }
        .card-data.member {
                background-color: lightgray;
        }

        .card-data i {
                font-size: 70px;
        }

        .card-desc {
                font-size: 25px;
        }

        .card-count {
                font-size: 20px;
        }
</style>

        <h1>Welcome, {{Auth::user()->username}}</h1>

        <div class="row mt-5">
                <div class="col-lg-4">
                        <div class="card-data book">
                                <div class="row">
                                        <div class="col-6"><i class="bi bi-journals"></i></div>
                                        <div class="col-6 d-flex flex-column justify-content-center">
                                                <div class="card-desc">Buku</div>
                                                <div class="card-count">{{$book_count}}</div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-lg-4">
                        <div class="card-data category">
                                <div class="row">
                                        <div class="col-6"><i class="bi bi-card-list"></i></div>
                                        <div class="col-6 d-flex flex-column justify-content-center">
                                                <div class="card-desc">Kategori</div>
                                                <div class="card-count">{{$category_count}}</div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-lg-4">
                        <div class="card-data anggota">
                                <div class="row">
                                        <div class="col-6"><i class="bi bi-people"></i></i></div>
                                        <div class="col-6 d-flex flex-column justify-content-center">
                                                <div class="card-desc">Anggota</div>
                                                <div class="card-count">{{$anggota_count}}</div>
                                        </div>
                                </div>
                        </div>
                </div>
               
                
        </div>
        <div class="mt-5">
                <h2>History</h2>
                <table class="table">
                        <thead>
                                <tr>
                                        <th>No</th>
                                        <th>Anggota</th>
                                        <th>Judul Buku</th>
                                        <th>Peminjaman Buku</th>
                                        <th>Batas Waktu</th>
                                        <th>Pengembalian Buku</th>
                                        <th>Status</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td colspan="7" style="text-align: center">no Data</td>
                                </tr>
                        </tbody>
                </table>
        </div>

@endsection