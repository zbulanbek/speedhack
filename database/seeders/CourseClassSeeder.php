<?php

namespace Database\Seeders;

use App\Models\CourseClass;
use Illuminate\Database\Seeder;

class CourseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            // [
            //     'title' => 'Групповые занятия <b>3 месяца</b>',
            //     'text' => '<p> 1 раз Speaking club </p> <p> 3 разa в неделю занятия </p>',
            //     'percent' => "-20%",
            //     'count' => 8,
            //     'course_id' => 3,
            //     'price' => 149000,
            //     'sale' => 178000,
            //     'class_price' => 4100,
               
            // ],
            // [
            //     'title' => 'Групповые занятия <b>6 месяца</b>',
            //     'text' => '<p> 2 раз Speaking club </p> <p> 3 разa в неделю занятия </p> <p> +1 курс в подарок</p>',
            //     'percent' => '-20%',
            //     'count' => 8,
            //     'course_id' => 3,
            //     'price' => 279000,
            //     'sale' => 334800,
            //     'class_price' => 3800
            // ],
            // [
            //     'title' => 'Групповые занятия <b>1 год</b>',
            //     'text' => '<p> Неограниченный Speaking Club </p> <p> 3 разa в неделю занятия </p> <p> +1 курс в подарок</p>',
            //     'percent' => '-20%',
            //     'count' => 16,
            //     'course_id' => 3,
            //     'price' => 509000,
            //     'sale' => 610800,
            //     'class_price' => 3500
            // ],
            //  [
            //     'title' => 'IELTS групповой <b>1 месяц</b>',
            //     'text' => '<p> 2 раз Speaking club </p> <p> +пробные 2 экзамена </p>',
            //     'percent' => '-20%',
            //     'count' => 64,
            //     'course_id' => 4,
            //     'price' => 69000,
            //     'sale' => 82000,
            //     'class_price' => null
            // ],
            // [
            //     'title' => 'IELTS групповой <b>3 месяца</b>',
            //     'text' => '<p> Неограниченный Speaking Club </p> <p> +пробные 2 экзамена </p> <p> книга в подарок</p>',
            //     'percent' => '-20%',
            //     'count' => 32,
            //     'course_id' => 4,
            //     'price' => 159000,
            //     'sale' => 190800,
            //     'class_price' => null
            // ],
             [
                'title' => 'Индивидуалные занятия <b>1 месяц</b>',
                'text' => ' <p> 12 занятий   </p> <p> 4 разговорных урока </p>',
                'percent' => '-20%',
                'count' => 16,
                'course_id' => 1,
                'price' => 64000,
                'sale' => null,
                'sale_lesson' => null,
                'class_price' => 4000
            ],
            [
                'title' => 'Индивидуалные занятия <b>3 месяца</b>',
                'text' => '<p> 36 занятий </p> <p> 24 разговорных урока  </p>',
                'percent' => '1+1=3',
                'count' => 8,
                'course_id' => 1,
                'price' => 128000,
                'sale' => 192000,
                'sale_lesson' => '-47%',
                'class_price' => 2133
            ],
            [
                'title' => 'Индивидуалные занятия <b>6 месяцев</b>',
                'text' => '<p> 72 занятий</p> <p> 72 разговорных уроков  </p> ',
                'percent' => '-20%',
                'count' => 16,
                'course_id' => 1,
                'price' => 279000,
                'sale' => 334800,
                'sale_lesson' => '-51%',
                'class_price' => 1937
            ],
            [
                'title' => 'Индивидуалные занятия <b>1 год</b>',
                'text' => ' <p> 144 занятий  </p> <p> Неограниченные разговорные уроки </p>',
                'percent' => '-20%',
                'count' => 16,
                'course_id' => 1,
                'price' => 509000,
                'sale' => 610800,
                'sale_lesson' => null,
                'class_price' => null
            ],


            
           
            [
                'title' => 'IELTS индивидуалный <b>1 месяц</b>',
                'text' => '<p> 12 занятий </p> <p> 8 разговорных уроков  </p>',
                'percent' => '-20%',
                'count' => 8,
                'course_id' => 2,
                'price' => 80000,
                'sale' => 96000,
                'sale_lesson' => null,
                'class_price' => 4000
            ],
            [
                'title' => 'IELTS индивидуалный <b>3 месяца</b>',
                'text' => '<p> 36 занятий  </p> <p> 24 разговорных уроков </p>',
                'percent' => '1+1=3',
                'count' => 16,
                'course_id' => 2,
                'price' => 160000,
                'sale' => 240000,
                'sale_lesson' => '-33%',
                'class_price' =>  2666
            ],

            [
                'title' => 'IELTS индивидуалный <b>6 месяцев</b>',
                'text' => '<p> 72 занятий </p> <p> 48 разговорных уроков </p> ',
                'percent' => '-20%',
                'count' => 16,
                'course_id' => 2,
                'price' => 384000,
                'sale' => 480000,
                'sale_lesson' => null,
                'class_price' =>  3200
            ],

           
           
        ];


        CourseClass::insert($classes);
    }
}
