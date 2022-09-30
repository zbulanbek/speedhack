<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CourseInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        $path = 'public/storage/images/course_info';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        return [
            'title' => $faker->words(3, true),
            'body' => $faker->realText(),
            'image' => $faker->image('public/storage/images/course_info'),
            'course_id' => Course::inRandomOrder()->first()->id,
        ];
    }
}
