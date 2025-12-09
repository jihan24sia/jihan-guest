<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persil;
use App\Models\SengketaPersil;
use App\Models\Media;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class SengketaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $persils = Persil::all();
        $sampleFiles = Storage::files('public/sample'); // pastikan ada gambar sample

        foreach ($persils as $persil) {
            for ($i = 0; $i < 2; $i++) {
                $sengketa = SengketaPersil::create([
                    'persil_id' => $persil->persil_id,
                    'pihak_1' => $faker->name,
                    'pihak_2' => $faker->name,
                    'kronologi' => $faker->paragraph,
                    'status' => $faker->randomElement(['Proses', 'Selesai']),
                    'penyelesaian' => $faker->optional()->sentence,
                ]);

                // Upload 1-3 media
                if(!empty($sampleFiles)){
                    $countMedia = rand(1, min(3, count($sampleFiles)));
                    $mediaSamples = $faker->randomElements($sampleFiles, $countMedia);

                    foreach($mediaSamples as $file){
                        $filename = basename($file);
                        Media::create([
                            'ref_table' => 'sengketa_persil',
                            'ref_id' => $sengketa->sengketa_id,
                            'file_name' => $filename,
                            'mime_type' => 'image/jpeg',
                        ]);
                    }
                }
            }
        }
    }
}
