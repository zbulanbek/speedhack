<?php

namespace Database\Seeders;

use App\Models\Vocabulary;
use App\Models\WordTranslation;
use Illuminate\Database\Seeder;

class VocabularySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vocabularies = [
            [
                'name' => 'Trial Lesson',
                'word_translations' => [
                    [
                        'word' => 'to wake up',
                        'translate' => 'просыпаться',
                    ],
                    [
                        'word' => 'to survive ',
                        'translate' => 'выживать',
                    ],
                    [
                        'word' => 'to climb the mountains',
                        'translate' => 'взбираться на горы',
                    ],
                    [
                        'word' => 'to savor memories',
                        'translate' => 'наслаждаться воспоминаниями',
                    ],
                    [
                        'word' => 'to discover',
                        'translate' => 'открывать в битвах',
                    ],
                    [
                        'word' => 'to fight the battles',
                        'translate' => 'сражаться',
                    ],
                    [
                        'word' => 'on my own',
                        'translate' => 'сам/сама',
                    ],
                    [
                        'word' => 'path',
                        'translate' => 'тропа/дорога',
                    ],
                    [
                        'word' => 'to seem',
                        'translate' => 'казаться',
                    ],
                    [
                        'word' => 'to complete a cycle',
                        'translate' => 'завершить цикл',
                    ],
                    [
                        'word' => 'scorching sun',
                        'translate' => 'палящее солнце',
                    ],
                    [
                        'word' => 'to meet new people',
                        'translate' => 'встречать новых людей',
                    ]
                ],
            ],
        ];

        foreach ($vocabularies as $vocablaryArr) {
            if (isset($vocablaryArr['word_translations'])) {
                $word_translations = $vocablaryArr['word_translations'];
                unset($vocablaryArr['word_translations']);
            } else $word_translations = [];

            $vocablary = Vocabulary::create($vocablaryArr);

            if (count($word_translations) > 0) {
                $vocablary->wordTranslations()->createMany($word_translations);
            }
        }
    }
}
