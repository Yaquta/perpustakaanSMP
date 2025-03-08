@extends('layouts.mainlayout')

@section('title', 'Rent-Form')

@section('content')
    <h1 class="text-2xl font-bold mb-5">Form Peminjaman Buku</h1>

    <div class="mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="mt-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>


    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
        <form action="{{ route('rentforms.submit') }}" method="POST">
            @csrf

            <!-- Search Bar untuk Nama Siswa -->
            <div class="mb-4">
                <label for="searchStudent" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" id="searchStudent" placeholder="Cari Nama Siswa..."
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">

                <select name="anggota_id" id="anggota_id" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Siswa</option>
                    @foreach ($anggotaListed as $student)
                        <option class="student-option" value="{{ $student->id }}">{{ $student->username }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Dropdown Judul Buku -->
            <div class="mb-4">
                <label for="book_id" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <select name="book_id" id="book_id" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="">Pilih Buku</option>
                    @foreach ($bookListed as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Peminjaman -->
            <div class="mb-4">
                <label for="rent_date" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman</label>
                <input type="date" name="rent_date" id="rent_date"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Tanggal Pengembalian -->
            <div class="mb-4">
                <label for="return_date" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                <input type="date" name="return_date" id="return_date"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">
                Submit
            </button>

        </form>
    </div>

    <!-- JavaScript untuk Search Bar -->
    <script>
        document.getElementById('searchStudent').addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let studentOptions = document.querySelectorAll('#anggota_id option');

            studentOptions.forEach(option => {
                let studentName = option.textContent.toLowerCase();
                if (studentName.includes(searchValue)) {
                    option.style.display = "block";
                } else {
                    option.style.display = "none";
                }
            });
        });
    </script>
@endsection
