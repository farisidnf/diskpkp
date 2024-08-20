<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Example: Seed data into a 'users' table
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => $faker->name,
            ]);
        }
    }
}
