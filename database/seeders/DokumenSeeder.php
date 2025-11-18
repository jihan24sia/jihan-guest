<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokumenSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'persil_id' => 1,
                'jenis_dokumen' => 'SHM',
                'nomor' => '123/SHM/2023',
                'keterangan' => 'Sertifikat Hak Milik atas nama pemilik pertama.'
            ],
            [
                'persil_id' => 1,
                'jenis_dokumen' => 'PBB',
                'nomor' => 'PBB-2024-001',
                'keterangan' => 'PBB tahun 2024 sudah dibayar.'
            ],
            [
                'persil_id' => 2,
                'jenis_dokumen' => 'IMB',
                'nomor' => 'IMB-00921',
                'keterangan' => 'Izin Mendirikan Bangunan untuk gudang.'
            ],
            [
                'persil_id' => 3,
                'jenis_dokumen' => 'Surat Kepemilikan',
                'nomor' => 'SK-8872',
                'keterangan' => 'Dokumen kepemilikan toko.'
            ]
        ];

        foreach ($data as $d) {
            Dokumen::create($d);
        }
    }
}
