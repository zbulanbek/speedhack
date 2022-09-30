<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'title' => $faker->words(3, true),
            'min' => random_int(10, 150),
            'program_id' => Program::inRandomOrder()->first()->id
        ];
    }
}
