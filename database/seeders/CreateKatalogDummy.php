<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateKatalogDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker =\Faker\Factory::create();
        $katalogData = [];

        for ($i = 0; $i < 50; $i++) {
            $katalogData[]=[
                'nama_katalog' => $faker->words(3, true),
                'deskripsi' => $faker->sentence(10),
                'harga' => $faker->numberBetween(10000, 100000),
                'ketersediaan' => $faker->randomElement(['tersedia', 'habis', 'pre-order']),
                'kategori' => $faker->word(10, true),
                'tgl_rilis' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('katalog')->insert($katalogData);
    }
}
