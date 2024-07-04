<?php

namespace Database\Seeders;

use App\Models\Kategori_produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori_produk::create([
            'nama' => '123',
        ]);
    }
}
