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
        
        Rent_logs::create($validated);
        
        $books = Book::find($validated['book_id']);

        if($books){
            $books->status = 'out stock';
            $books->save();
        }
        
        return redirect()->back()->with('success','');

    }
}
