<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'course_name' => 'MCA',
            'course_code' => 'MCA-94',
            'course_description' => 'Master of Computer Application',
            'course_duration' => '2',
            'course_fees' => '2000000',
            'course_semesters' => '4',
            'status' => '1',            
        ]);
        Course::create([
            'course_name' => 'MBA',
            'course_code' => 'MBA-93',
            'course_description' => 'Master of Business Administration',
            'course_duration' => '2',
            'course_fees' => '3000000',
            'course_semesters' => '6',
            'status' => '1',                                            
        ]);
        Course::create([
            'course_name' => 'BCA',
            'course_code' => 'BCA-92',
            'course_description' => 'Bachelor of Computer Application',
            'course_duration' => '3',
            'course_fees' => '1500000',
            'course_semesters' => '8',
            'status' => '1',
        ]);
    }
}
