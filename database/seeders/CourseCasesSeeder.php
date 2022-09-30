<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseCase;

class CourseCasesSeeder extends Seeder
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
                'title' => '2 месяца',
                'subtitle' => 'онлайн-продуктивного обучения',
                'course_id' => 1
            ],
            [
                'title' => 'Обучение',
                'subtitle' => 'на реальных данных',
                'course_id' => 1
            ],
            [
                'title' => 'Язык',
                'subtitle' => 'английский, руский',
                'course_id' => 1
            ],
            [
                'title' => 'Расписание',
                'subtitle' => 'гибкое расписание',
                'course_id' => 1
            ],
            [
                'title' => '2 месяца',
                'subtitle' => 'онлайн-продуктивного обучения',
                'course_id' => 2
            ],
            [
                'title' => 'Обучение',
                'subtitle' => 'на реальных данных',
                'course_id' => 2
            ],
            [
                'title' => 'Язык',
                'subtitle' => 'английский, руский',
                'course_id' => 2
            ],
            [
                'title' => 'Расписание',
                'subtitle' => 'гибкое расписание',
                'course_id' => 2
            ],
            // [
            //     'title' => '2 месяца',
            //     'subtitle' => 'онлайн-продуктивного обучения',
            //     'course_id' => 3
            // ],
            // [
            //     'title' => 'Обучение',
            //     'subtitle' => 'на реальных данных',
            //     'course_id' => 3
            // ],
            // [
            //     'title' => 'Язык',
            //     'subtitle' => 'английский, руский',
            //     'course_id' => 3
            // ],
            // [
            //     'title' => 'Расписание',
            //     'subtitle' => 'гибкое расписание',
            //     'course_id' => 3
            // ],

            // [
            //     'title' => 'Расписание',
            //     'subtitle' => 'гибкое расписание',
            //     'course_id' => 4
            // ],

            // [
            //     'title' => '2 месяца',
            //     'subtitle' => 'онлайн-продуктивного обучения',
            //     'course_id' => 4
            // ],
            // [
            //     'title' => 'Обучение',
            //     'subtitle' => 'на реальных данных',
            //     'course_id' => 4
            // ],
            // [
            //     'title' => 'Язык',
            //     'subtitle' => 'английский, руский',
            //     'course_id' => 4
            // ],
            
        ];

        CourseCase::insert($courses);
    }
}
