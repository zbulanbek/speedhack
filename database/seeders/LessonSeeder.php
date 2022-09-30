<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lesson::factory()->count(80)->create();
        $lessons = [
            [
                'title' => 'Trial Lesson',
                'level' => null,
                'duration_minute' => 60,
                'description' => 'Trial Lesson',
                'lesson_time_lines' => [
                    [
                        'title' => 'Hello !',
                        'lesson_blocks' => [
                            [
                                'title' => 'Сможете ли вы угадать слово по смайликам',
                                'content' => [
                                    [
                                        'task_id' => 37,
                                        'sort_order' => 1
                                    ]
                                ]
                            ],
                            [
                                'title' => 'Выберите правильный вариант ответа',
                                'content' => [
                                    [
                                        'task_id' => 38,
                                        'sort_order' => 1
                                    ]
                                ]
                            ],
                            // [
                            //     'title' => 'Выберите правильную картинку',
                            //     'content' => [
                            //         [
                            //             'task_id' => 1,
                            //             'sort_order' => 1
                            //         ]
                            //     ]
                            // ],
                            [
                                'title' => 'Видео',
                                'type' => 'video',
                                'content' => [
                                    [
                                        'video' => 'https://www.youtube.com/watch?v=yqJ7LtZgMAc',
                                        'sort_order' => 0
                                    ],
//                                    [
//                                        'subtitle' => 'Vocabulary',
//                                        'vocabulary_id' => 1,
//                                        'sort_order' => 1
//                                    ],
                                    [
                                        'task_id' => 2,
                                        'sort_order' => 1
                                    ]
                                ]
                            ],
                            [
                                'title' => 'Послушайте аудио',
                                'type' => 'audio',
                                'content' => [
                                    [
                                        'audio_name' => 'Listening part 1',
                                        'audio' => '/audios/q33.mp3',
                                        'sort_order' => 0
                                    ],
                                    [
                                        'task_id' => 3,
                                        'sort_order' => 1
                                    ]
                                ]
                            ],
                            [
                                'title' => 'Посмотрите на картинку и опишите погоду.',
                                'content' => [
                                    [
                                        'task_id' => 4,
                                        'sort_order' => 1
                                    ],
                                ]
                            ],
                            // [
                            //     'title' => 'Перетащите слова на правильную картинку',
                            //     'content' => [
                            //         [
                            //             'task_id' => 5,
                            //             'sort_order' => 2
                            //         ],
                            //     ]
                            // ],
                            [
                                'title' => 'Выберите часть из одной колонки и соедините с частью другой.',
                                'type' => 'video',
                                'content' => [
                                    [
                                        'video' => 'https://www.youtube.com/watch?v=79DijItQXMM',
                                        'sort_order' => 0
                                    ],
                                    [
                                        'task_id' => 7,
                                        'sort_order' => 2
                                    ],
                                    // [
                                    //     'task_id' => 8,
                                    //     'sort_order' => 2
                                    // ],
                                ]
                            ],
                            [
                                'title' => 'Попробуйте описать картину',
                                'type' => 'read',
                                'content' => [
                                    [
                                        'task_id' => 9,
                                        'sort_order' => 1
                                    ],
                                ]
                            ],
                            [
                                'title' => 'Посмотрите видео',
                                'type' => 'video',
                                'content' => [
                                    [
                                        'video' => 'https://www.youtube.com/watch?v=fBd40bbB4nE',
                                        'sort_order' => 0
                                    ],
                                    [
                                        'task_id' => 10,
                                        'sort_order' => 2
                                    ],
                                    [
                                        'task_id' => 11,
                                        'sort_order' => 2
                                    ],
                                ]
                            ],
                            [
                                'title' => 'Прослушайте аудио, и выберите правильный вариант ответа',
                                'type' => 'audio',
                                'content' => [
                                    [
                                        'audio_name' => 'Listening part 1',
                                        'audio' => '/audios/q6.mp3',
                                        'sort_order' => 0
                                    ],
                                    [
                                        'task_id' => 12,
                                        'sort_order' => 2
                                    ],
                                ]
                            ],
                            // [
                            //     'title' => 'Соедините слова с правильными картинками',
                            //     'content' => [
                            //         [
                            //             'task_id' => 13,
                            //             'sort_order' => 2
                            //         ],
                            //     ]
                            // ],
                            [
                                'title' => 'An invitation to a party',
                                'type' => 'audio',
                                'content' => [
                                    [
                                        'audio_name' => 'Listening part 1',
                                        'audio' => '/audios/q11.mp3',
                                        'sort_order' => 0
                                    ],
                                    [
                                        'task_id' => 14,
                                        'sort_order' => 2
                                    ],
                                ]
                            ],
                            [
                                'title' => 'Послушайте аудио',
                                'type' => 'audio',
                                'content' => [
                                    [
                                        'audio_name' => 'Listening part 1',
                                        'audio' => '/audios/q3.mp3',
                                        'sort_order' => 0
                                    ],
                                    [
                                        'task_id' => 18,
                                        'sort_order' => 2
                                    ],
                                ]
                            ],
                            // [
                            //     'title' => 'Посмотрите видео',
                            //     'type' => 'video',
                            //     'content' => [
                            //         [
                            //             'video' => 'https://www.youtube.com/watch?v=_vdJCKv_l4s',
                            //             'sort_order' => 0
                            //         ],
                            //         [
                            //             'task_id' => 17,
                            //             'sort_order' => 2
                            //         ],
                            //     ]
                            // ],
                        ]
                    ],
                ],
            ]
        ];
        // $lessons = [
        //     [
        //         'title' => 'Trial Lesson',
        //         'level' => null,
        //         'duration_minute' => 60,
        //         'description' => 'Trial Lesson',
        //          'lesson_time_lines' => [
        //                         [
        //                             'title' => "Hello !",
        //                             'lesson_blocks' => [
        //                                 [
        //                                     'title' => 'Video',
        //                                     'content' => [
        //                                        [
        //                                             'video' => 'https://www.youtube.com/watch?v=PKs8vONQC88',
        //                                             'sort_order' => 0
        //                                         ],
        //                                         [
        //                                             'pictures' => [
        //                                                 '/images/lesson/abc.jpeg',
        //                                             ],
        //                                             'sort_order' => 1,
        //                                         ],
        //                                     ]
        //                                 ],
        //                             ]
        //                         ]
        //                     ]
                            
        //     ]
        // ];

        foreach ($lessons as $item) {
            $timeLines = [];
            if (isset($item['lesson_time_lines'])) {
                $timeLines = $item['lesson_time_lines'];
                unset($item['lesson_time_lines']);
            }
            $lesson = Lesson::create($item);

            foreach ($timeLines as $lineArr) {
                $blocks = [];
                if (isset($lineArr['lesson_blocks'])) {
                    $blocks = $lineArr['lesson_blocks'];
                    unset($lineArr['lesson_blocks']);
                }

                $line = $lesson->timeLines()->create($lineArr);
                foreach ($blocks as $blockArr) {
                    $line->blocks()->create($blockArr);
                }

            }
        }
    }
}
