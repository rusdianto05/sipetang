<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'name' => 'KECAMATAN TANGGUNGHARJO',
            'description' => 'Kecamatan Tanggungharjo',
            'address' => 'Jl. Raya Tanggungharjo - Tegowanu Km.11',
            'province' => 'Jawa Tengah',
            'regency' => 'Grobogan',
            'sub_district' => 'Tanggungharjo',
            'village' => 'Tanggungharjo',
            'postal_code' => '58167',
            'camat' => 'Drs. H. M. Hidayat, M.Si',
            'camat_id' => '196001011991031001',
            'kades' => 'Drs. H. M. Hidayat, M.Si',
            'kades_id' => '196001011991031001',
            'pamong' => 'Drs. H. M. Hidayat, M.Si',
            'pamong_id' => '196001011991031001',
            'ketua_adat' => 'Drs. H. M. Hidayat, M.Si',
            'ketua_adat_id' => '196001011991031001',
            'created_at' => '2021-05-01 00:00:00',
        ]);
    }
}
