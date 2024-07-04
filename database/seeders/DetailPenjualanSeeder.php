<?php

namespace Database\Seeders;

use App\Models\Detail_penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            Detail_penjualan::create([
                'id_penjualan' => "1",
                'id_produk' => "1",
                'harga_jual' => "5000000".$i,
                'jumlah' => "2".$i

            ]);
        }
    }
}
