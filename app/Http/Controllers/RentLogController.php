<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {   
        $anggotaListed = Anggota::all();
        return view('rentlog', ['anggotaListed'=> $anggotaListed]);
    }

    public function rentLog(Anggota $anggota)
    {
        $userAuth = Auth::user();
        $admin = User::where('id', $userAuth->id)->first();
        return view('rentlog-detail', ['anggota'=> $anggota, 'admin' => $admin]);
    }
}
