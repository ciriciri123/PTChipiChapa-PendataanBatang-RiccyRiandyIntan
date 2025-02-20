<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nomorFaktur', 'kodePos', 'alamat', 'totalHarga'];

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
