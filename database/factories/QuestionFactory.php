<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;
    private $id = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $test_id = $this->id%5+1;
        $course_id = $this->id%30+1;
        $this->id++;
        $draggable = false;
        $matchable = false;
        $completable = false;
        $is_given = false;
        switch ($test_id){
            case 2:
                $draggable = true;
                break;
            case 3:
                $matchable = true;
                break;
            case 4:
                $completable = true;
                break;
            case 5:
                $is_given = true;
                break;
        }
        return [
            'body' => $faker->words(4, true),
            'test_id' => $test_id,
            'course_id' => $course_id,
            'draggable' => $draggable,
            'matchable' => $matchable,
            'completable' => $completable,
            'is_given' => $is_given,
        ];
    }
}
