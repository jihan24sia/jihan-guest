<?php

namespace Database\Seeders;

use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersilSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Contoh penggunaan lahan
        $penggunaanList = ['Rumah Tinggal', 'Gudang', 'Toko', 'Kantor', 'Kebun', 'Tanah Kosong'];

        // Ambil semua warga (buat relasi)
        $wargaIds = Warga::pluck('warga_id')->toArray();

        for ($i = 1; $i <= 1000; $i++) {

            Persil::create([
                'pemilik_warga_id' => $faker->randomElement($wargaIds), // relasi random
                'kode_persil'      => 'PRS-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'luas_m2'          => $faker->randomFloat(1, 80, 300),  // 80 - 300 m2
                'penggunaan'       => $faker->randomElement($penggunaanList),
                'alamat_lahan'     => $faker->streetAddress(),
                'rt'               => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'rw'               => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
