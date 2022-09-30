<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CourseCategory::factory()->count(4)->create();
        CourseCategory::factory()->createMany([
            ['title' => 'Английский язык'],
            ['title' => 'Казахский язык'],
        ]);
    }
}
