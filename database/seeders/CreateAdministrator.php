<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdministrator extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'calafa admin',
            'email'=>'calafa@admin',
            'password'=>Hash::make('calafaadmin'),
            'role'=>'Administrator'
        ]);
    }
}
