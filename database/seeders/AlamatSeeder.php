<?php

namespace Database\Seeders;

use App\Models\Alamat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            Alamat::create([
                'id_pelanggan' => "1",
                'alamat' => "palembang".$i,
                'prioritas' => "cinde".$i
            ]);
        }
    }
}
