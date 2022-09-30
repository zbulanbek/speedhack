<?php

namespace Database\Seeders;

use App\Models\TeacherSlider;
use Illuminate\Database\Seeder;

class TeacherSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherSlider::factory()->createMany([
            [
                'category' => 'Литература',
                'color' => '#003ECB',
                'image' => '/images/users/teacher-1.png',
                'course' => 'Английский язык',
                'name' => 'Айдын Ергалиев'
            ],
            [
            'category' => 'Научная',
            'color' => '#A339FF',
            'image' => '/images/users/teacher-2.png',
            'course' => 'Английский язык',
            'name' => 'Айдын Ергалиев'
            ],
            [
                'category' => 'Литература',
                'color' => '#003ECB',
                'image' => '/images/users/teacher-1.png',
                'course' => 'Английский язык',
                'name' => 'Айдын Ергалиев'
            ],
            [
                'category' => 'Научная',
                'color' => '#A339FF',
                'image' => '/images/users/teacher-2.png',
                'course' => 'Английский язык',
                'name' => 'Айдын Ергалиев'
            ],
            [
                'category' => 'Литература',
                'color' => '#003ECB',
                'image' => '/images/users/teacher-1.png',
                'course' => 'Английский язык',
                'name' => 'Айдын Ергалиев'
            ],
            [
                'category' => 'Научная',
                'color' => '#A339FF',
                'image' => '/images/users/teacher-2.png',
                'course' => 'Английский язык',
                'name' => 'Айдын Ергалиев'
            ],
        ]);
    }
}
