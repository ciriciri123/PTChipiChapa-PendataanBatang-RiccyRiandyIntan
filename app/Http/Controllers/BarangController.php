<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;

class BarangController extends Controller
{
    public function lihatBarang(){
        $title = 'HalamanUtama';
        $barangs = Barang::all();
        $kategoris = Kategori::all();

        return view('halamanUtama', compact('title','barangs','kategoris'));
    }

    public function pageBuatBarang(){
        $title = 'HalamanBuatBarang';
        $kategoris = Kategori::all();

        return view('form', compact('title','kategoris'));
    }

    public function buatBarang(BarangRequest $request){
        
        $filename = 'noImage.jpg';

        if($request->hasFile('gambar')){
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $filename = $request->namaBarang . '.' . $extension;
            $request->file('gambar')->storeAs('public/images', $filename);
        }
        
        Barang::create([
            'gambar' => $filename,
            'namaBarang' => $request -> namaBarang,
            'stok' => $request -> stok,
            'hargaBarang' => $request -> hargaBarang,
            'kategori_id' => $request -> kategori_id,
        ]);

        return redirect(route('form'));
    }

    public function hapusBarang($id){
        Barang::destroy($id);
        return redirect(route('halamanUtama'));
    }

    public function cariBarangId($id){
        $title = 'updateBarang';
        $barang = Barang::find($id);
        $kategoris = Kategori::all();

        return view('update', compact('title','barang','kategoris'));
    }

    public function updateBarang($id, BarangRequest $request){
        $barang = Barang::find($id);

        if($request->hasFile('gambar')){
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $filename = $request->namaBarang . '.' . $extension;
            $request->file('gambar')->storeAs('public/images', $filename);

            $barang->update([
                'gambar' => $filename,
                'stok' => $request -> stok,
                'namaBarang' => $request -> namaBarang,
                'hargaBarang' => $request -> hargaBarang,
                'kategori_id' => $request -> kategori_id,
            ]);
        }  

        $barang->update([
            'stok' => $request -> stok,
            'namaBarang' => $request -> namaBarang,
            'hargaBarang' => $request -> hargaBarang,
            'kategori_id' => $request -> kategori_id,
        ]);

        return redirect(route('halamanUtama'));
    }
}
