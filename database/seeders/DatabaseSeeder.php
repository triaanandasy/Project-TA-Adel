<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriProdukSeeder::class,
            ProdukSeeder::class,
            MetodePembayaranSeeder::class,
            PelangganSeeder::class,
            AlamatSeeder::class,
            PenjualanSeeder::class,
            DetailPenjualanSeeder::class,
        ]);
    }
}
