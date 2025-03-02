<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       $bookCount = Book::count(); 
       $categoryCount = Category::count();
       $anggotaCount = Anggota::count();
       return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'anggota_count' => $anggotaCount]);
    }


}
