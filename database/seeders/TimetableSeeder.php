<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timetable;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'student_id' => 1,
                'teacher_id' => 2,
                'lesson_id' => 1,
                'date' => '2021-02-28 00:00:00',
                'start_time' => '10:54:26',
                'finish_time' => '10:54:26',
            ],
            [
                'student_id' => 1,
                'teacher_id' => 2,
                'lesson_id' => 1,
                'date' => '2021-02-14 00:00:00',
                'start_time' => '10:54:26',
                'finish_time' => '10:54:26',
            ],
        ];

        Timetable::insert($courses);
    }
}
