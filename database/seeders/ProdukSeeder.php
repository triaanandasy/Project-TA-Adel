<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'id_kategori_produk' => '1',
            'nama' => '1234',
            'keterangan' => '1234',
            'harga_jual' => '12345'
        ]);
    }
}
