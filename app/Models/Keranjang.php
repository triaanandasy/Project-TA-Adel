<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product(){
        return $this->hasOne(Produk::class,'id','id_produk');
    }
}
