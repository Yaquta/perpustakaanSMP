@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')


    <style>
        .card-data {
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

    <h1>Welcome, {{ Auth::user()->username }}</h1>

    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-data book">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journals"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="card-desc">Buku</div>
                        <div class="card-count">{{ $bookCount }}</div>
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
                        <div class="card-count">{{ $categoryCount }}</div>
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
                        <div class="card-count">{{ $anggotaCount }}</div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="mt-5">
        <h2>History</h2>
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-bordered">
                <thead class="table-dark">
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
                    @foreach ($rentLog as $rent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rent->anggota->username ?? 'N/A' }}</td>
                            <td>{{ $rent->book->title ?? 'N/A' }}</td>
                            <td>{{ $rent->rent_date }}</td>
                            <td>{{ $rent->return_date }}</td>
                            <td>
                                {!! $rent->actual_return_date
                                    ? '<span class="text-success">' . $rent->actual_return_date . '</span>'
                                    : '<span class="text-danger fw-bold">Belum dikembalikan</span>' !!}
                            </td>
                            <td>
                                @if ($rent->actual_return_date)
                                    <span class="badge bg-success">Dikembalikan</span>
                                @else
                                    <span class="badge bg-warning">Dipinjam</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
