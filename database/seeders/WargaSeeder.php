<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    public function run()
    {
        DB::table('warga')->insert([
            [
                'warga_id' => 1,
                'no_ktp' => '1234567890123456',
                'nama' => 'Ahmad Zafa',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Mahasiswa',
                'telp' => '081234567890',
                'email' => 'zafa@example.com',
            ],
            [
                'warga_id' => 2,
                'no_ktp' => '2345678901234567',
                'nama' => 'Siti Aminah',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pekerjaan' => 'Guru',
                'telp' => '081987654321',
                'email' => 'siti@example.com',
            ],
            [
                'warga_id' => 3,
                'no_ktp' => '3456789012345678',
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Kristen',
                'pekerjaan' => 'Pegawai Negeri',
                'telp' => '082345678901',
                'email' => 'budi@example.com',
            ],
             [
                'warga_id' => 4,
                'no_ktp' => '3456783412345678',
                'nama' => 'Jihan Imut',
                'jenis_kelamin' => 'perempuan',
                'agama' => 'islam',
                'pekerjaan' => 'Pegawai Negeri',
                'telp' => '082345678901',
                'email' => 'jhn@example.com',
            ],
        ]);
    }
}
