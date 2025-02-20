<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KeranjangRequest;

class KeranjangController extends Controller
{
    public function keranjang(){
        $barang = Barang::all();
        $kategori = Kategori::all();

        $user = Auth::user()->id;
        $userID = Auth::user()->UserId;

        $keranjang = Keranjang::where('user_id', $user)->get();
        
        return view('keranjang', [
            'title'=>'Keranjang',
            'barangs' => $barang,
            'keranjangs' => $keranjang,
            'user' => $userID,
            'kategori' => $kategori,
        ]);
    }

    public function tambahKeranjang(KeranjangRequest $request){
        $barangID = $request->barang_id;
        $barang = Barang::findOrfail($barangID);

        $jumlahBarang = $request->input('jumlahBarang');
        $subtotal = $jumlahBarang * $barang->hargaBarang;

        $stokBarang = $barang->stok;
        $sisah = $stokBarang - $jumlahBarang;

        if($sisah<0){
            return back()->withErrors([
                'jumlahBarang' => 'Stok tidak cukup',
            ])->onlyInput('jumlahBarang');
        }else{
            if($jumlahBarang == 0){
                Keranjang::where('user_id', $request->user_id)->where('barang_id', $request->barang_id)->delete();
            }
            else{
                Keranjang::create([
                    'user_id' => $request -> user_id,
                    'barang_id' => $request -> barang_id,
                    'jumlahBarang' => $jumlahBarang,
                    'subtotal' => $subtotal
                ]);

                $barang->update([
                    'stok' => $sisah,
                ]);
            }

            return redirect('/keranjang');
        }
    }

    public function hapusKeranjang($id){
        $barangKeranjang = Keranjang::find($id);
        $barangBalik = $barangKeranjang -> jumlahBarang;
        
        $barangID = $barangKeranjang->barang_id;
        $barang = Barang::findOrfail($barangID);

        $barangStok = $barang->stok;
        $finalStok = $barangBalik + $barangStok;

        $barang->update([
            'stok' => $finalStok,
        ]);
        
        Keranjang::destroy($id);
        return redirect('/keranjang');
    }

    public function simpanKeranjang(OrderRequest $request){
        // return dd('test');
        
        $user = Auth::user()->id;
        $keranjang = Keranjang::where('user_id', $user)->get();

        $totalHarga = $keranjang->sum('subtotal');

        $order = Order::create([
            'user_id' => $user,
            'nomorFaktur' => $request -> nomorFaktur,
            'kodePos' => $request -> kodePos,
            'alamat' => $request -> alamat,
            'totalHarga' => $totalHarga
        ]);

        foreach ($keranjang as $item){
            $order->orderDetail()->create([
                'order_id' => $order -> id,
                'barang_id' => $item -> barang_id,
                'jumlahBarang' => $item -> jumlahBarang,
                'subtotal' => $item -> subtotal,
            ]);
        }

        Keranjang::where('user_id', $user)->delete();

        return redirect('/order');
    }
}
