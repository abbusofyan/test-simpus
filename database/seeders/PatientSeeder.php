<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		$faker = Faker::create();

        foreach (range(1, 20) as $i) {
            $gender = $faker->numberBetween(0, 1);
            DB::table('patients')->insert([
                'name' => $faker->name($gender === 0 ? 'male' : 'female'),
                'gender' => $gender,
                'birthdate' => $faker->dateTimeBetween('1950-01-01', '2020-12-31')->format('Y-m-d'),
            ]);
        }
    }
}
