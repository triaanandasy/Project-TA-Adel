<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nama', 'email', 'no_hp', 'alamat','foto','created_by'
    ];
}
