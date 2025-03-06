@extends('layouts.mainlayout')

@section('title', 'Rent-Log')

@section('content')
    <h1>Rent-Log</h1>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Judul Buku</th>
                <th>Peminjaman Buku</th>
                <th>Batas Waktu</th>
                <th>Pengembalian Buku</th>
                <th>Action</th>
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
                    <td>{{ $rent->actual_return_date ?? 'Belum dikembalikan' }}</td>
                    <td>
                        <input type="checkbox" class="return-checkbox" data-id="{{ $rent->id }}"
                            {{ $rent->actual_return_date ? 'checked disabled' : '' }}>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $(document).ready(function() {
            $(".return-checkbox").on("change", function() {
                let rentId = $(this).data("id");
                let isChecked = $(this).prop("checked");

                if (isChecked) {
                    $.ajax({
                        url: "/rent-logs/update-return-date/" + rentId,
                        type: "POST",
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            alert("Terjadi kesalahan: " + error);
                        },
                    });
                }
            });
        });
    </script>

@endsection
