<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => Str::random(13),
            'username' => "fauzaro01",
            'email' => 'muhamadfauzan4750@gmail.com',
            'password' => 'admin123',
            'role' => 'admin'
        ]);
    }
}
