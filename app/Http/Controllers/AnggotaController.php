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

    public function store(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'NISN' => 'required' ,
            'address' => 'required',
            'phone' => 'required',
        ]);

        // dd($validated);
        Anggota::create($validated);
        return redirect('anggotas')->with('success','anggota berhasil di tambahkan');
    }

    public function edit(Anggota $anggota){
        return view('anggota-edit', ['anggota'=> $anggota]);
    }

    public function update(Request $request, Anggota $anggota){ 
        $validated = $request->validate([
            'username'=> 'required',
            'NISN'=> 'required' ,
            'address'=> 'required',
            'phone'=> 'required',
            ]) ;
        $anggota->update($validated);
        return redirect('anggotas')->with('success','anggota berhasil di perbarui');
    }

    public function delete(Anggota $anggota){

        return view('anggota-delete',['anggota'=> $anggota]);
    }

    public function destroy(Anggota $anggota){
        $anggota->delete();
        return redirect('anggotas')->with('success','data anggota berhasil di hapus');
    }

    public function deletedAnggota(Anggota $anggota){
        $deletedAnggota = Anggota::onlyTrashed()->get();
        return view('anggota-deleted-list', ['deletedAnggota'=> $deletedAnggota]);
    }
    
    public function restore($id){
        $anggota = Anggota::onlyTrashed()->where('id', $id)->first();
        $anggota->restore();
        return redirect()->back();
    }
}

