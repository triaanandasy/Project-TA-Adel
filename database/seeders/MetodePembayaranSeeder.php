<?php

namespace Database\Seeders;

use App\Models\Metode_pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Metode_pembayaran::create([
            'judul' => 'bca',
            'keterangan' => 'bca'
        ]);
    }
}
