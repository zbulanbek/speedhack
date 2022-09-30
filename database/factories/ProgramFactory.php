<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'title' => $faker->words(3 , true),
            'course_id' => Course::inRandomOrder()->first()->id,
        ];
    }
}
