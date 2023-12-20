<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'student_num' => $faker->unique()->numberBetween(100000000, 999999999),
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'parent_phone_number' => $faker->phoneNumber,
                'second_phone_number' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['male','female']),
                'classroom_id' => $faker->numberBetween(1, 5), // Assuming there are 5 classrooms
                'enrollment_date' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
