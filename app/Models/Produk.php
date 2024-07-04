<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategori(){
        return $this->hasOne(Kategori_produk::class,'id','id_kategori_produk');
    }

    public function foto_produk(){
        return $this->hasOne(Foto_produk::class,'id_produk','id');
    }
}
