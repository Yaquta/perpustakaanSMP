<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rent_logs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $anggotaCount = Anggota::count();

        $rentLog = Rent_logs::with(['anggota', 'book'])->get(); // Pastikan pakai with()

        return view('dashboard', compact('bookCount', 'categoryCount', 'anggotaCount', 'rentLog'));
    }



}
