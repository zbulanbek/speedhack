<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseFact;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseFact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->realText(),
            'course_id' => Course::inRandomOrder()->first()->id
        ];
    }
}
