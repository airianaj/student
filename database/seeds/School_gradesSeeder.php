<?php

use Illuminate\Database\Seeder;

class School_gradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('School_grades')->insert([
            [
                'student_id'=> '1',
                'grade'=> '2',
                'term'=> '前期',
                'japanese'=> 'A',
                'math'=> 'A',
                'science'=> 'A',
                'social_studies'=> 'A',
                'music'=> 'A',
                'home_economics'=> 'A',
                'english'=> 'A',
                'art'=> 'A',
                'health_and_physical_education'=> 'A',
            ],

        ]);

    }
}
