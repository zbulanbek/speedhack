<?php

namespace Database\Seeders;

use App\Models\HomeWork;
use Illuminate\Database\Seeder;

class HomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
          1 => range(19, 25),
          2 => range(25, 32),
          3 => range(33, 36),
        ];
        $homeworks = [
            [
                'name' => 'Present simple',
                'lesson_id' => 2
            ],
            [
                'name' => 'Present simple',
                'lesson_id' => 3
            ],
            [
                'name' => 'Future Simple',
                'lesson_id' => 4
            ],
        ];

        foreach ($homeworks as $homeworkArr) {
            $homework = HomeWork::create($homeworkArr);

            $path = public_path('/images/homework/present_simple.png');
            $homework->addMedia($path)
                ->preservingOriginal()
                ->toMediaCollection('image', 'public');

            if (isset($tasks[$homework->id])) {
                $homework->tasks()->sync($tasks[$homework->id]);
            }
        }
    }
}
