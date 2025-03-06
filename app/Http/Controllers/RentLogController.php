<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Book;
use App\Models\Rent_logs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {   
        $rentLog = Rent_logs::with(['anggota', 'book'])->get(); // Pastikan pakai with()

        return view('rentlog', ['rentLog'=> $rentLog]);
    }


    public function updateReturnDate($id)
    {
        try {
            $rentLog = Rent_logs::findOrFail($id);
            $rentLog->update(['actual_return_date' => now()]);
            Book::where('id', $rentLog->book_id)->update(['status' => 'in stock']);

            return response()->json(['message' => 'Tanggal pengembalian & status buku diperbarui!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Simpan error di log Laravel
            return response()->json(['error' => 'Terjadi kesalahan saat update data!'], 500);
        }
    }

    
}
