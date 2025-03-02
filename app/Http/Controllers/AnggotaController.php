<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index() 
    {
        $anggotas = Anggota::all();
        return view('anggota', ['anggotas' => $anggotas]);
    }

    public function add()
    {
        $categories = Anggota::all();
        return view('anggota-add');
    }

}

