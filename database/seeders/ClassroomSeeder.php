<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('classrooms')->insert([
                'class_name' => 'Class ' . $faker->randomLetter,
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
