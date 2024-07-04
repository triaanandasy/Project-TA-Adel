<?php

namespace Database\Seeders;

use App\Models\Foto_produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Foto_produk::create([
            'id_produk' => '1',
            'link_foto' => 'xxx',
        ]);
    }
}
