<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePelanggan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'calafa pelanggan',
            'email'=>'calafa@pelanggan',
            'password'=>Hash::make('calafapelanggan'),
            'role'=>'Pelanggan'
        ]);
    }
}
