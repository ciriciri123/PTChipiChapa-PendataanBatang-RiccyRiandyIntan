<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id','user_id','jumlahBarang','subtotal'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
