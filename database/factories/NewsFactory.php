<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        $path = 'public/storage/images/news';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        $date = random_int(1, 30) . ' ' . $faker->randomElement(['январь', 'февраль',
                'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь',
                'ноябрь', 'декабрь']) . ', ' .random_int(2020, 2021);
        return [
            'title' => $faker->words(3, true),
            'image' => $faker->image('public/storage/images/news'),
            'date' => $date,
            'body' => $faker->text
        ];
    }
}
