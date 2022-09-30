<?php

namespace Database\Seeders;

use App\Models\CourseFact;
use Illuminate\Database\Seeder;

class CourseFactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CourseFacts::factory()->count(120)->create();
        CourseFact::factory()->createMany([
            [
                'body' => 'Учись не выходя из дома',
                'course_id' => 1
            ],
            [
                'body' => 'Уникальное програмное обучение',
                'course_id' => 1
            ],
            [
                'body' => 'Доступная цена и акции',
                'course_id' => 1
            ],
            [
                'body' => 'Учись не выходя из дома',
                'course_id' => 2
            ],
            [
                'body' => 'Уникальное програмное обучение',
                'course_id' => 2
            ],
            [
                'body' => 'Доступная цена и акции',
                'course_id' => 2
            ],
            // [
            //     'body' => 'Учись не выходя из дома',
            //     'course_id' => 3
            // ],
            // [
            //     'body' => 'Уникальное програмное обучение',
            //     'course_id' => 3
            // ],
            // [
            //     'body' => 'Доступная цена и акции',
            //     'course_id' => 3
            // ],

            //  [
            //     'body' => 'Учись не выходя из дома',
            //     'course_id' => 4
            // ],
            // [
            //     'body' => 'Уникальное програмное обучение',
            //     'course_id' => 4
            // ],
            // [
            //     'body' => 'Доступная цена и акции',
            //     'course_id' => 4
            // ],

        ]);
    }
}
