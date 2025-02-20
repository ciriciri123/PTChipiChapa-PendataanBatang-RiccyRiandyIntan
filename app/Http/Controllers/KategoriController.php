<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori(){
        return view('kategori', ['title' => 'Buat Kategori']);
    }

    public function buatKategori(Request $request){
        $test = Kategori::where('nama', $request->nama)->first();

        if($test){
            return back()->withErrors(['nama' => 'Kategori ini sudah ada.']);
        }
        
        Kategori::create([
            'nama' => $request -> nama
        ]);

        return redirect('/halamanUtama');
    }
}
