<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function lihatOrder(){
        $barang = Barang::all();
        $kategori = Kategori::all();

        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->get();

        $orderDetails = [];
        foreach($orders as $order){
            $orderDetails[$order->id] = OrderDetail::where('order_id', $order->id)->get();
        }

        $title = 'Lihat Order';
        
        return view("/order", compact('title', 'orders', 'orderDetails', 'barang', 'kategori'));
    }
}

