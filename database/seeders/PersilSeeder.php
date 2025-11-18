<?php

namespace Database\Seeders;

use App\Models\Persil;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersilSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pemilik_warga_id' => 1,
                'kode_persil' => 'PRS-001',
                'luas_m2' => 120.5,
                'penggunaan' => 'Rumah Tinggal',
                'alamat_lahan' => 'Jl. Kenanga No. 12',
                'rt' => '01',
                'rw' => '05',
            ],
            [
                'pemilik_warga_id' => 2,
                'kode_persil' => 'PRS-002',
                'luas_m2' => 200.0,
                'penggunaan' => 'Gudang',
                'alamat_lahan' => 'Jl. Melati No. 8',
                'rt' => '02',
                'rw' => '03',
            ],
            [
                'pemilik_warga_id' => 3,
                'kode_persil' => 'PRS-003',
                'luas_m2' => 90.7,
                'penggunaan' => 'Toko',
                'alamat_lahan' => 'Jl. Mawar No. 5',
                'rt' => '03',
                'rw' => '07',
            ],
        ];

        foreach ($data as $p) {
            Persil::create($p);
        }
    }
}
