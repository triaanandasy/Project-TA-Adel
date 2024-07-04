<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penjualan(){
        return $this->hasOne(Penjualan::class,'id','id_penjualan');
    }
    public function produk(){
        return $this->hasOne(Produk::class,'id','id_produk');
    }
}
