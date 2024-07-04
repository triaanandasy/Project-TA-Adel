<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            Pelanggan::create([
                'nama' => 'aisyah'.$i,
                'email' => 'email'.$i, //varchar 255
                'no_hp' => 'noHp'.$i,
                'alamat' => 'alamat'.$i,
                'foto' => 'foto'.$i,
                'created_by' => 'created_by'.$i,
                'updated_by' => 'updated_by'.$i,
                'deleted_by' => 'deleted_by'.$i
            ]);
        }
    }
}
