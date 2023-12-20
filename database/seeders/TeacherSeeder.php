<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
            DB::table('teachers')->insert([
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $faker->email,
                'teacher_num' => $faker->phoneNumber,
                'phone_number' => $faker->phoneNumber,
               'address' => $faker->address,
               'birthday' => $faker->date(),
               'gender' => $faker->randomElement(['male','female']),
               'created_at' => now(),
               'updated_at' => now(),
            ]);
        }
    }
}
