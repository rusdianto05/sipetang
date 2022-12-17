<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Surat::create([
            'id' => 1,
            'name' => 'Surat Keterangan'
        ]);
        Surat::create([
            'id' => 2,
            'name' => 'Surat Permohonan'
        ]);
    }
}
