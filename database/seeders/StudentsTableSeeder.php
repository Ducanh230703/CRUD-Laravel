<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0;$i<10;$i++){
            DB::table('students')->insert([
                'StudentName' => $faker->name,
                'StudentEmail' =>$faker->email,
                'StudentGender'=> $faker->randomElement(['0','1']),
                'ClassRoomID'=> $faker->randomElement([1,2,3]),
            ]);
        }
    }
}
