<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '01',
            'username' => 'admin',
            'password' => Hash::make('123'),// Menggunakan Hash::make() untuk password
            'phone' => '0895423467897',
            'address' => 'Pati',
            'status' => 'active'
            
        ]);
    }
}
