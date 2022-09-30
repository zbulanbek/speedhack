<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        $path = 'public/storage/images/courses';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        return [
            'title' => $faker->title,
            'image' => $faker->image($path),
            'body' => $faker->realText(),
            'duration' => random_int(2, 24).' месяцев',
            'course_category_id' => CourseCategory::inRandomOrder()->first()->id,
        ];
    }
}
