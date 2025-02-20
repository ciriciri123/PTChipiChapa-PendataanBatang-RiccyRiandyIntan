<?php

namespace App\Models;

use App\Models\OrderDetail;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['namaBarang','stok','hargaBarang','jumlahBarang','kategori_id','gambar'];

    public function barang(){
        return $this->belongsTo(Kategori::class);
    }
    
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
