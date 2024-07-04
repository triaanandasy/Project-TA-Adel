<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pelanggan(){
        return $this->hasOne(Pelanggan::class,'id','id_pelanggan');
    }

    public function detailpenjualan(){
        return $this->hasMany(Detail_penjualan::class,'id_penjualan','id');
    }
}
