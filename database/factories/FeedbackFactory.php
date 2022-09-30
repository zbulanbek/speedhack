<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        $path = 'public/storage/images/feedbacks';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        return [
            'name' => $faker->name,
            'image' => $faker->image('public/storage/images/feedbacks'),
            'rate' => $faker->numberBetween(1, 5),
            'text' => $faker->text
        ];
    }
}
