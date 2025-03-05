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
        return view('rentlog');
    }

    
}
