<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function produk(){
        return $this->hasOne(Produk::class,'id','id_produk');
    }
}
