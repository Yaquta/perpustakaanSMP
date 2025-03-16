<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Http\Requests;
use App\Models\Anggota;
use App\Models\Rent_logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentFormsController extends Controller
{
    public function index()
    {   
        $anggotaListed = Anggota::get();
        $bookListed = Book::get();
        return view('rent-forms', ['anggotaListed'=> $anggotaListed, 'bookListed' => $bookListed]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id'=> 'required',
            'book_id'=> 'required',
            'rent_date'=> 'required',
            'return_date' => 'required',
            'actual_return_date' => 'nullable|date',
        ]) ;
        
        $books = Book::find($validated['book_id']);
        
        if($books->status != 'in stock'){
            return back()->with('error','Buku sedang dipinjam. Silakan pilih buku yang lain.');
        }
        
        if($books){
            $books->status = 'out stock';
            $books->save();
        }

        Rent_logs::create($validated);
        
        return redirect('rent-forms')->with('success','Form peminjaman berhasil diinput');

    }
}
