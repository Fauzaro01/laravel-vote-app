<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;

class PostinganSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 6) as $index) {
            Post::insert([
                'id' => Str::random(13),
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'user_id' => $faker->randomElement(User::pluck('id')),
            ]);
        }
    }
}
