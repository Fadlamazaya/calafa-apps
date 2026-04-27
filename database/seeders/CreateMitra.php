<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateMitra extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'calafa mitra',
            'email'=>'calafa@mitra',
            'password'=>Hash::make('calafamitra'),
            'role'=>'Mitra'
        ]);
    }
}
