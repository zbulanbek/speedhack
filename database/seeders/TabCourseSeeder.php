<?php

namespace Database\Seeders;

use App\Models\TabCourse;
use Illuminate\Database\Seeder;

class TabCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'Домашняя работа',
                'title_image' => '/images/icons/pencil.svg',
                'body' => 'В вашем профиле будет раздел "Домашняя работа", доступ к которой открывается 
                по мере завершения урока. Это способствует системному прохождению курсов, что 
                позваляет комплексно проходить обучения. ',
                'image' => '/images/ilustration/tab-2.png',
            ],
            [
                'title' => 'Онлайн-урок',
                'title_image' => '/images/icons/television.svg',
                'body' => 'Вместо "в формате живых вебинаров" - в формате прямого прямой трансляций.',
                'image' => '/images/ilustration/tab-1.png',
            ],
            [
                'title' => 'Материалы',
                'title_image' => '/images/icons/student.svg',
                'body' => 'Раздел "Материалы" позволяет вам, в любое удобное для вас время
                закреплять информацию в более углубленном формате, с конечными 
                результатами',
                'image' => '/images/ilustration/tab-3.png',
            ],
            [
                'title' => 'Сертификат',
                'title_image' => '/images/icons/mortarboard.svg',
                'body' => 'По окончанию занятий, мы выдаем сертификат об окончании курса.
                Подленность которой, вы можете проверить с помощью QR-кода. 
                Что будет подтверждать ваши знание в этой области.',
                'image' => '/images/ilustration/tab-4.png',
            ],
        ];


        TabCourse::insert($items);
    }
}
