<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use App\Models\Persil;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DokumenSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Jenis dokumen contoh
        $jenisList = ['SHM', 'IMB', 'Surat Kepemilikan', 'HGB', 'PBB', 'SPPT'];

        // Ambil semua ID persil
        $persilIds = Persil::pluck('persil_id')->toArray();

        // Generate 1000 dokumen
        for ($i = 1; $i <= 1000; $i++) {

            Dokumen::create([
                'persil_id'      => $faker->randomElement($persilIds),
                'jenis_dokumen'  => $faker->randomElement($jenisList),
                'nomor'          => strtoupper($faker->bothify('DOC-####')),
                'keterangan'     => $faker->sentence(10),
            ]);
        }
    }
}
