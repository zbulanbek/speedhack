<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;
    private $id = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        if (Certificate::all()->last()){
            $this->id = Certificate::all()->last()->id;
        }
        $path = 'public/storage/images/certificates';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        return [
            'title' => $faker->title,
            'image' => $faker->image($path),
            'body' => $faker->realText(),
            'course_id' => ++$this->id,
        ];
    }
}
