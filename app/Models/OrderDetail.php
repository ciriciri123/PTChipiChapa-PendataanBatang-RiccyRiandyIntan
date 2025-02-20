<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomorFaktur',
        'barang_id',
        'jumlahBarang',
        'subtotal',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class);
    }

}
