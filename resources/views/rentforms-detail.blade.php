@extends('layouts.mainlayout')

@section('title', 'Rentlog Detail')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Form Peminjaman Buku</h1>

    <form action="" method="POST" class=" mx-auto">
        @csrf
        <div>
            <p>
                {{ $admin->username }}
            </p>
            <p>
                {{ $admin->id }}
            </p>
            <!-- Nama Mahasiswa -->
            <div class="flex flex-col my-3">
                <label class="text-sm font-semibold text-gray-600">Nama Mahasiswa: </label>
                <span class="border px-4 py-2 bg-white rounded-md w-full">{{ $anggota->username }}</span>
            </div>

            <!-- Judul Buku -->
            <div class="flex flex-col my-3">
                <label class="text-sm font-semibold text-gray-600">Judul Buku</label>
                <input type="text" name="buku[{{ $anggota->id }}]"
                    class="border px-4 py-2 rounded-md w-full focus:ring focus:ring-blue-300"
                    placeholder="Masukkan judul buku">
            </div>

            <!-- Tanggal Pinjam -->
            <div class="flex flex-col my-3">
                <label class="text-sm font-semibold text-gray-600">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam[{{ $anggota->id }}]"
                    class="border px-4 py-2 rounded-md w-full focus:ring focus:ring-blue-300">
            </div>

            <!-- Tanggal Kembali -->
            <div class="flex flex-col my-3">
                <label class="text-sm font-semibold text-gray-600">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali[{{ $anggota->id }}]"
                    class="border px-4 py-2 rounded-md w-full focus:ring focus:ring-blue-300">
            </div>

            <!-- Checkbox Peminjaman -->
            <div class="flex items-center gap-2 col-span-1 md:col-span-2">
                <input type="checkbox" name="pinjam[{{ $anggota->id }}]" value="1" class="w-5 h-5 text-blue-500">
                <label class="text-sm font-semibold text-gray-600">Pinjam Buku</label>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md shadow hover:bg-blue-700 transition">
                Simpan Peminjaman
            </button>
        </div>
    </form>
@endsection
