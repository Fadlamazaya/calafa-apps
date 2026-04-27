<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateMitraDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('mitra')->insert([
                'nama_mitra' => $faker->company,
                'alamat' => $faker->address,
                'email' => $faker->unique()->safeEmail,
                'telepon' => $faker->phoneNumber,
                'kemitraan' => $faker->randomElement(['Platinum', 'Gold', 'Silver']),
                'bergabung' => $faker->date('Y-m-d', '2023-12-31'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
