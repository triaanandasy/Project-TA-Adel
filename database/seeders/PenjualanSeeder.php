<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            Penjualan::create([
                'id_pelanggan' => "2",
                'metode_pembayaran' => "BCA",
                'alamat' => "Jalan xyz",
                'status_penjualan' => "dipesan",
                'status_pembayaran' => "lunas",
                'jumlah_bayar' => "5000".$i,
                'bukti_bayar' => "x".$i,
                'catatan' => "xxxx".$i,

            ]);
        }
    }
}
