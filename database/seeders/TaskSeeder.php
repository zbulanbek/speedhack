<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [ //1
                'name' => '',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/q-1.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'backpack',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/q-2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'sсarf',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/q-3.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'dress',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/q-4.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'cardigan',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [ //2
                'name' => '',
                'type' => 'drag-fill-empty-space',
                'questions' => [
                    [
                        'question' => "We can’t. 2 Anna. Elsa, wait",
                        'question_options' => [
                            [
                                'option_text' => 'Goodbye',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "No, I am just trying 5 you",
                        'question_options' => [
                            [
                                'option_text' => 'to protect',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Please do not shut me out again. Please do not 10 the door.",
                        'question_options' => [
                            [
                                'option_text' => 'slam',
                                'correct' => 1,
                                'removed_index' => 10,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'Cause, for the first time in 6, <br> We can 10 this hand in hand.',
                        'question_options' => [
                            [
                                'option_text' => 'forever',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => 'fix',
                                'correct' => 1,
                                'removed_index' => 10,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'We can 2 down this mountain together, <br> You do not have to 13 in fear. ',
                        'question_options' => [
                            [
                                'option_text' => 'head',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => 'live',
                                'correct' => 1,
                                'removed_index' => 13,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'I will 2 right here.',
                        'question_options' => [
                            [
                                'option_text' => 'be',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//3
                'name' => '',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "2 you work with other people? Yes, I 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Do',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Does',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'do',
                                'correct' => 1,
                                'removed_index' => 8,
                            ],
                            [
                                'option_text' => 'does',
                                'correct' => 0,
                                'removed_index' => 8,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "2 you work in an office? No, I 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Does',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Do',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'don’t',
                                'correct' => 1,
                                'removed_index' => 8,
                            ],
                            [
                                'option_text' => 'doesn’t ',
                                'correct' => 0,
                                'removed_index' => 8,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "2 she work with computers? No, she 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Does',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Do',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'don’t',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => 'doesn’t ',
                                'correct' => 1,
                                'removed_index' => 7,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "2 she work at the weekend? Yes, she 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Does',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Do',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'does',
                                'correct' => 1,
                                'removed_index' => 8,
                            ],
                            [
                                'option_text' => 'do',
                                'correct' => 0,
                                'removed_index' => 8,
                            ],
                        ],
                        'point' => 1,
                    ],

                    // [
                    //     'question' => 'Do you like to sing? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Yes, I do',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'No, I don’t ',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, I can',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.05,
                    // ],
                    // [
                    //     'question' => 'Do you like dancing? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Yes, I do ',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'No, I don’t',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, I am happy',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                    // [
                    //     'question' => 'Do you like to cook? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'No, ordinary no ',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, I do ',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'No, but sometimes yes',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                    // [
                    //     'question' => 'Do you like to exercise? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Of course',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'Sometimes',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Very much',
                    //             'correct' => 1,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                ]
            ],
            [//4
                'name' => '',
                'type' => 'common-test',
                'image' => '/images/task/task-4.jpg',
                'questions' => [
                    [
                        'question' => 'What is the weather like?',
                        'question_options' => [
                            [
                                'option_text' => 'It is raining',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'It is snowing',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'It is cold',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                ]
            ],
            [ //5
                'name' => '',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/qq1.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'singing',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qq2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'dancing',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qq3.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'cooking',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qq4.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'exercise',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//6
                'name' => '',
                'type' => 'common-test',
                'image' => '/images/task/task-4.jpg',
                'questions' => [
                    [
                        'question' => 'What is she doing?',
                        'question_options' => [
                            [
                                'option_text' => 'She’s sleeping',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'She’s talking on the phone',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'She’s playing the guitar',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                ]
            ],
            [//7
                'name' => '',
                'type' => 'join-two-halves',
                'questions' => [
                    [
                        'question' => "I believe",
                        'question_options' => [
                            [
                                'option_text' => 'to consider to be true or honest',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To be face to face",
                        'question_options' => [
                            [
                                'option_text' => 'directly, meeting someone in the same place',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To feel",
                        'question_options' => [
                            [
                                'option_text' => 'to be aware of (a person or object) through  touching or being touched',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                    [
                        'question' => "Adorable",
                        'question_options' => [
                            [
                                'option_text' => 'used to describe someone or something that makes you love or like them',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                    [
                        'question' => "(It’s) nice to see",
                        'question_options' => [
                            [
                                'option_text' => 'a polite phrase used when greeting someone',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [//8
                'name' => 'Что обозначает “you are welcome” в этих строчках: so what I believe you were trying to say is “thank you”.
“thank you”?',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => 'You’re welcome.',
                        'question_options' => [
                            [
                                'option_text' => 'Да, пожалуйста',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'Кому как',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'Да не за что',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1.55,
                    ]
                ]
            ],
            [//9
                'name' => 'Попробуйте описать картину',
                'type' => 'common-test',
                'image' => '/images/task/task-4.jpg',
                'questions' => [
                    [
                        'question' => 'What is she doing?',
                        'question_options' => [
                            [
                                'option_text' => 'People are standing beside yellow bus during daytime ',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'People are walking through a blizzard',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'People are feeling guilty about something',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                ]
            ],
            [//10
                'name' => 'Выберите часть из одной колонки и соедините с частью другой.',
                'type' => 'join-two-halves',
                'questions' => [
                    [
                        'question' => "Twinkle twinkle little star",
                        'question_options' => [
                            [
                                'option_text' => 'Children’s poem about making a wish ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Pearly whites",
                        'question_options' => [
                            [
                                'option_text' => 'Inf., a person’s teeth ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Amphiprion",
                        'question_options' => [
                            [
                                'option_text' => 'A genus of ray-finned fish',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To be dead",
                        'question_options' => [
                            [
                                'option_text' => 'No longer alive ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To see",
                        'question_options' => [
                            [
                                'option_text' => 'To meet or visit someone, or to visit a place',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [//11
                'name' => '',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => 'Что обозначает “pearly whites”?',
                        'point' => 1.25,
                        'question_options' => [
                            [
                                'option_text' => 'Жемчужно-белые зубы',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'Белые ракушки',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'Жемчужные рыбы ',
                                'correct' => 0,
                            ],
                        ],
                    ]
                ]
            ],
            [//12
                'name' => '',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => "To be a good learner you need always remember about accuracy.",
                        'question_options' => [
                            [
                                'option_text' => 'False',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'True',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "You also need to speak to native speaker of the language as much as you can.",
                        'question_options' => [
                            [
                                'option_text' => 'True',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'False',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The best language teacher can speak another language themselves.",
                        'question_options' => [
                            [
                                'option_text' => 'False',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'True',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Teacher can explain things clearly.",
                        'question_options' => [
                            [
                                'option_text' => 'False',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'True',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "His first language is not difficult to learn because pronunciation is quite the same.",
                        'question_options' => [
                            [
                                'option_text' => 'True',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'False',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    // [
                    //     'question' => "Can Cat cook?",
                    //     'point' => 1.25,
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Yes, she can.',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'Not really.',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, absolutely. ',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    // ],
                    // [
                    //     'question' => "What does she do for dinner?",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'She buys take-away food.',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'She cooks alone.',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'She uses her microwave.',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "Has she ever been to Karaoke in Japan?",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Yes, she can.',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, she has.',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'No, never.',
                    //             'correct' => 1,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "Can she play any musical instruments?",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'She can perfectly play the guitar ',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'She can perfectly play the piano',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'She used to play, but now she can remember a bit',
                    //             'correct' => 1,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                ],
            ],
            [ //13
                'name' => '',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/qqq1.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Take away food ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Dinner',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq3.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'Microwave',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq4.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Supermarket',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq5.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Restaurant',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq6.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'Karaoke',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//14
                'name' => '',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => "She is having a party for ...",
                        'question_options' => [
                            [
                                'option_text' => 'her family.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'her very good friends.',
                                'correct' => 1,
                            ],
                             [
                                'option_text' => 'everybody at work.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The party is at ...",
                        'question_options' => [
                            [
                                'option_text' => 'the swimming pool at her house.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "her cousin's house.",
                                'correct' => 1,
                            ],
                             [
                                'option_text' => 'work.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To get to the party, drive ...",
                        'question_options' => [
                            [
                                'option_text' => 'straight on Forest Road.',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => "right on Forest Road.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'left on Forest Road.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The motorway exit you need is ...",
                        'question_options' => [
                            [
                                'option_text' => '3A.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "13A.",
                                'correct' => 1,
                            ],
                             [
                                'option_text' => '30A.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The house is the first big house ...",
                        'question_options' => [
                            [
                                'option_text' => 'on the right.',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => "on the left.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'down at the end of the road.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "If you go by public transport, take ...",
                        'question_options' => [
                            [
                                'option_text' => 'bus 18 to Brownsville.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "bus 80 to Forest Road.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'bus 80 to Brownsville.',
                                'correct' => 1,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The woman received the birthday card ...",
                        'question_options' => [
                            [
                                'option_text' => 'this morning.',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => "last night.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'yesterday morning.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "If you take a bus, ...",
                        'question_options' => [
                            [
                                'option_text' => 'you can walk from the town to the house.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "somebody will drive you from the town to the house.",
                                'correct' => 1,
                            ],
                             [
                                'option_text' => 'there is a bus stop outside the house.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                ]
            ],
            [//15
                'name' => '',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => "What did he ask her to do for him?",
                        'question_options' => [
                            [
                                'option_text' => 'To pass the vinegar',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'To pass the salt',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'To have the salt',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [ //16
                'name' => '',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/qqq1.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Lightning',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Mist',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq3.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'Earthquake',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq4.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Flood',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//17
                'name' => 'What did you hear?',
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "You put that toilet seat down, or I will put you down",
                        'question_options' => [
                            [
                                'option_text' => 'sit',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                            [
                                'option_text' => 'put',
                                'correct' => 1,
                                'removed_index' => 9,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
           
            [//18
                'name' => '',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "I hate 1 blood. Looking at it makes me go all weak at the knees. I can’t even 18 own blood. I don’t know why.",
                        'question_options' => [
                            [
                                'option_text' => 'the sight',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                            [
                                'option_text' => 'match for',
                                'correct' => 0,
                                'removed_index' => 2
                            ],
                            [
                                'option_text' => 'wish I could',
                                'correct' => 0,
                                'removed_index' => 18,
                            ],
                            [
                                'option_text' => 'look at my',
                                'correct' => 1,
                                'removed_index' => 18,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The thing 2 is giving blood for a medical check. I fainted once after I saw my blood in a small bottle. ",
                        'question_options' => [
                            [
                                'option_text' => 'hate most is',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                             [
                                'option_text' => 'have to sit',
                                'correct' => 0,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "If I have a nose bleed, I 7 down for 30 minutes 12 better. It’s impossible for me to watch operations on TV.",
                        'question_options' => [
                            [
                                'option_text' => 'have to sit',
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => 'have sit',
                                'correct' => 0,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => 'wish I could',
                                'correct' => 0,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => 'before I feel',
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I 1 donate blood to others. I can’t. I know giving blood is really important, but I’m 17 enough.",
                        'question_options' => [
                            [
                                'option_text' => 'wish I could',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                            [
                                'option_text' => 'not brave',
                                'correct' => 0,
                                'removed_index' => 1
                            ],
                            [
                                'option_text' => 'not brave',
                                'correct' => 1,
                                'removed_index' => 17
                            ],
                            [
                                'option_text' => 'the sight',
                                'correct' => 0,
                                'removed_index' => 17
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "One thing about blood I do find interesting is blood types. 10 blood type can affect your personality. ",
                        'question_options' => [
                            [
                                'option_text' => 'I think your',
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => 'I know your',
                                'correct' => 0,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "0 in some countries, people with blood type A would not be a good romantic 15 someone with blood type O.",
                        'question_options' => [
                            [
                                'option_text' => 'I know that',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                            [
                                'option_text' => 'I think that',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                            [
                                'option_text' => 'match for',
                                'correct' => 1,
                                'removed_index' => 15
                            ],
                            [
                                'option_text' => 'not brave',
                                'correct' => 0,
                                'removed_index' => 15
                            ],
                        ],
                        'point' => 1,
                    ],

                    // [
                    //     'question' => "Выберите картинки, которые были упомянуты в аудио. Правильных может быть несколько",
                    //     'question_options' => [
                    //         [
                    //             'image' => '/images/task/imagetask-1.jpg',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'image' => '/images/task/imagetask-2.jpg',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'image' => '/images/task/imagetask-3.jpg',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'image' => '/images/task/imagetask-4.jpg',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                   
                    
                    
                ],
            ],
            [ //1
                'name' => 'Task 1',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/q-1.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'backpack',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/q-2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'sсarf',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/q-3.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'dress',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/q-4.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'cardigan',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [ //2
                'name' => 'Task 2',
                'type' => 'drag-fill-empty-space',
                'questions' => [
                    [
                        'question' => "We can’t. 2 Anna. Elsa, wait",
                        'question_options' => [
                            [
                                'option_text' => 'Goodbye',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "No, I am just trying 5 you",
                        'question_options' => [
                            [
                                'option_text' => 'to protect',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Please do not shut me out again. Please do not 10 the door.",
                        'question_options' => [
                            [
                                'option_text' => 'slam',
                                'correct' => 1,
                                'removed_index' => 10,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'Cause, for the first time in 6, <br> We can 10 this hand in hand.',
                        'question_options' => [
                            [
                                'option_text' => 'forever',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => 'fix',
                                'correct' => 1,
                                'removed_index' => 10,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'We can 2 down this mountain together, <br> You do not have to 13 in fear. ',
                        'question_options' => [
                            [
                                'option_text' => 'head',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => 'live',
                                'correct' => 1,
                                'removed_index' => 13,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'I will 2 right here.',
                        'question_options' => [
                            [
                                'option_text' => 'be',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//3
                'name' => 'task 3',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "2 you work with other people? Yes, I 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Do',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Does',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'do',
                                'correct' => 1,
                                'removed_index' => 8,
                            ],
                            [
                                'option_text' => 'does',
                                'correct' => 0,
                                'removed_index' => 8,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "2 you work in an office? No, I 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Does',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Do',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'don’t',
                                'correct' => 1,
                                'removed_index' => 8,
                            ],
                            [
                                'option_text' => 'doesn’t ',
                                'correct' => 0,
                                'removed_index' => 8,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "2 she work with computers? No, she 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Does',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Do',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'don’t',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => 'doesn’t ',
                                'correct' => 1,
                                'removed_index' => 7,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "2 she work at the weekend? Yes, she 6 .",
                        'question_options' => [
                            [
                                'option_text' => 'Does',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Do',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'does',
                                'correct' => 1,
                                'removed_index' => 8,
                            ],
                            [
                                'option_text' => 'do',
                                'correct' => 0,
                                'removed_index' => 8,
                            ],
                        ],
                        'point' => 1,
                    ],

                    // [
                    //     'question' => 'Do you like to sing? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Yes, I do',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'No, I don’t ',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, I can',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                    // [
                    //     'question' => 'Do you like dancing? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Yes, I do ',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'No, I don’t',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, I am happy',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                    // [
                    //     'question' => 'Do you like to cook? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'No, ordinary no ',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Yes, I do ',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'No, but sometimes yes',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                    // [
                    //     'question' => 'Do you like to exercise? ',
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'Of course',
                    //             'correct' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'Sometimes',
                    //             'correct' => 0,
                    //         ],
                    //         [
                    //             'option_text' => 'Very much',
                    //             'correct' => 0,
                    //         ],
                    //     ],
                    //     'point' => 1.25,
                    // ],
                ]
            ],
            [//4
                'name' => 'task 4',
                'type' => 'common-test',
                'image' => '/images/task/task-4.jpg',
                'questions' => [
                    [
                        'question' => 'What is the weather like?',
                        'question_options' => [
                            [
                                'option_text' => 'It is raining',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'It is snowing',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'It is cold',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                ]
            ],
            [ //5
                'name' => 'task 5',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/qq1.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'singing',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qq2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'dancing',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qq3.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'cooking',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qq4.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'exercise',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//6
                'name' => 'task 6',
                'type' => 'common-test',
                'image' => '/images/task/task-4.jpg',
                'questions' => [
                    [
                        'question' => 'What is she doing?',
                        'question_options' => [
                            [
                                'option_text' => 'She’s sleeping',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'She’s talking on the phone',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'She’s playing the guitar',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                ]
            ],
            [//7
                'name' => 'task 7',
                'type' => 'join-two-halves',
                'questions' => [
                    [
                        'question' => "I believe",
                        'question_options' => [
                            [
                                'option_text' => 'to consider to be true or honest',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To be face to face",
                        'question_options' => [
                            [
                                'option_text' => 'directly, meeting someone in the same place',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To feel",
                        'question_options' => [
                            [
                                'option_text' => 'to be aware of (a person or object) through  touching or being touched',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Adorable",
                        'question_options' => [
                            [
                                'option_text' => 'used to describe someone or something that makes you love or like them',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "(It’s) nice to see",
                        'question_options' => [
                            [
                                'option_text' => 'a polite phrase used when greeting someone',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [//8
                'name' => 'Что обозначает “you are welcome” в этих строчках: so what I believe you were trying to say is “thank you”.
“thank you”?',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => 'You’re welcome.',
                        'question_options' => [
                            [
                                'option_text' => 'Да, пожалуйста',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'Кому как',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'Да не за что',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1.25,
                    ]
                ]
            ],
            [//9
                'name' => 'Попробуйте описать картину',
                'type' => 'common-test',
                'image' => '/images/task/task-4.jpg',
                'questions' => [
                    [
                        'question' => 'What is she doing?',
                        'question_options' => [
                            [
                                'option_text' => 'People are standing beside yellow bus during daytime ',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'People are having a great time on the beach',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'People are feeling guilty about something',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ],
                ]
            ],
            [//10
                'name' => 'Выберите часть из одной колонки и соедините с частью другой.',
                'type' => 'join-two-halves',
                'questions' => [
                    [
                        'question' => "Twinkle twinkle little star",
                        'question_options' => [
                            [
                                'option_text' => 'Children’s poem about making a wish ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Pearly whites",
                        'question_options' => [
                            [
                                'option_text' => 'Inf., a person’s teeth ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Amphiprion",
                        'question_options' => [
                            [
                                'option_text' => 'A genus of ray-finned fish',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To be dead",
                        'question_options' => [
                            [
                                'option_text' => 'No longer alive ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To see",
                        'question_options' => [
                            [
                                'option_text' => 'To meet or visit someone, or to visit a place',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [//11
                'name' => 'task 11',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => 'Что обозначает “pearly whites”?',
                        'question_options' => [
                            [
                                'option_text' => 'Жемчужно-белые зубы',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'Белые ракушки',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'Жемчужные рыбы ',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1.25,
                    ]
                ]
            ],
            [//12
                'name' => 'task 12',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => "To be a good learner you need always remember about accuracy.",
                        'question_options' => [
                            [
                                'option_text' => 'False',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'True',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "You also need to speak to native speaker of the language as much as you can.",
                        'question_options' => [
                            [
                                'option_text' => 'True',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'False',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The best language teacher can speak another language themselves.",
                        'question_options' => [
                            [
                                'option_text' => 'False',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'True',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Teacher can explain things clearly.",
                        'question_options' => [
                            [
                                'option_text' => 'False',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'True',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "His first language is not difficult to learn because pronunciation is quite the same.",
                        'question_options' => [
                            [
                                'option_text' => 'True',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'False',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [ //13
                'name' => 'task 13',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/qqq1.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Take away food ',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Dinner',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq3.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'Microwave',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq4.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Supermarket',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq5.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Restaurant',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq6.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'Karaoke',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//14
                'name' => 'task 14',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => "She is having a party for ...",
                        'question_options' => [
                            [
                                'option_text' => 'her family.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'her very good friends.',
                                'correct' => 1,
                            ],
                             [
                                'option_text' => 'everybody at work.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The party is at ...",
                        'question_options' => [
                            [
                                'option_text' => 'the swimming pool at her house.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "her cousin's house.",
                                'correct' => 1,
                            ],
                             [
                                'option_text' => 'work.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "To get to the party, drive ...",
                        'question_options' => [
                            [
                                'option_text' => 'straight on Forest Road.',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => "right on Forest Road.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'left on Forest Road.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The motorway exit you need is ...",
                        'question_options' => [
                            [
                                'option_text' => '3A.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "13A.",
                                'correct' => 1,
                            ],
                             [
                                'option_text' => '30A.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The house is the first big house ...",
                        'question_options' => [
                            [
                                'option_text' => 'on the right.',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => "on the left.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'down at the end of the road.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "If you go by public transport, take ...",
                        'question_options' => [
                            [
                                'option_text' => 'bus 18 to Brownsville.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "bus 80 to Forest Road.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'bus 80 to Brownsville.',
                                'correct' => 1,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The woman received the birthday card ...",
                        'question_options' => [
                            [
                                'option_text' => 'this morning.',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => "last night.",
                                'correct' => 0,
                            ],
                             [
                                'option_text' => 'yesterday morning.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    [
                        'question' => "If you take a bus, ...",
                        'question_options' => [
                            [
                                'option_text' => 'you can walk from the town to the house.',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => "somebody will drive you from the town to the house.",
                                'correct' => 1,
                            ],
                             [
                                'option_text' => 'there is a bus stop outside the house.',
                                'correct' => 0,
                            ],
                       ],
                        'point' => 1,
                    ],
                    // [
                    //     'question' => "Cat 1 from New Zealand. ",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'is',
                    //             'correct' => 1,
                    //             'removed_index' => 1
                    //         ],
                    //         [
                    //             'option_text' => 'are',
                    //             'correct' => 0,
                    //             'removed_index' => 1
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "But she 2 in Spain for fifteen years.",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'had been living',
                    //             'correct' => 1,
                    //             'removed_index' => 2,
                    //         ],
                    //         [
                    //             'option_text' => 'was living',
                    //             'correct' => 0,
                    //             'removed_index' => 2,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "She is 2 around Europe now.",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'travelling',
                    //             'correct' => 1,
                    //             'removed_index' => 2,
                    //         ],
                    //         [
                    //             'option_text' => 'was travelling',
                    //             'correct' => 0,
                    //             'removed_index' => 2,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "By this time, she 4 ten countries.",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'had already visited',
                    //             'correct' => 1,
                    //             'removed_index' => 4,
                    //         ],
                    //         [
                    //             'option_text' => 'has already visited',
                    //             'correct' => 0,
                    //             'removed_index' => 4,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "She 1 will have visited twenty-five countries by the end of her travelling. ",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'visited',
                    //             'correct' => 1,
                    //             'removed_index' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'will have visited',
                    //             'correct' => 0,
                    //             'removed_index' => 1,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "Cat 1 spending a lot of money right now.",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'are',
                    //             'correct' => 1,
                    //             'removed_index' => 1,
                    //         ],
                    //         [
                    //             'option_text' => 'is',
                    //             'correct' => 0,
                    //             'removed_index' => 1,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                    // [
                    //     'question' => "If she 2 like this, she 6 all her money before the end of her holiday.",
                    //     'question_options' => [
                    //         [
                    //             'option_text' => 'will continue',
                    //             'correct' => 1,
                    //             'removed_index' => 2,
                    //         ],
                    //         [
                    //             'option_text' => 'continues',
                    //             'correct' => 0,
                    //             'removed_index' => 2,
                    //         ],
                    //         [
                    //             'option_text' => 'will be spending',
                    //             'correct' => 1,
                    //             'removed_index' => 6,
                    //         ],
                    //         [
                    //             'option_text' => 'will have spent',
                    //             'correct' => 0,
                    //             'removed_index' => 6,
                    //         ],
                    //     ],
                    //     'point' => 1,
                    // ],
                ]
            ],
            [//15
                'name' => 'task 15',
                'type' => 'common-test',
                'questions' => [
                    [
                        'question' => "What did he ask her to do for him?",
                        'question_options' => [
                            [
                                'option_text' => 'To pass the vinegar',
                                'correct' => 0,
                            ],
                            [
                                'option_text' => 'To pass the salt',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'To have the salt',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                ],
            ],
            [ //16
                'name' => 'task 16',
                'type' => 'drag-word-to-pictures',
                'questions' => [
                    [
                        'question' => '',
                        'image' => '/images/task/qqq1.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Lightning',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq2.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Mist',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq3.jpeg',
                        'question_options' => [
                            [
                                'option_text' => 'Earthquake',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => '',
                        'image' => '/images/task/qqq4.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Flood',
                                'correct' => 1,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//17
                'name' => 'What did you hear?',
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "You put that toilet seat down, or I will put you down",
                        'question_options' => [
                            [
                                'option_text' => 'sit',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                            [
                                'option_text' => 'put',
                                'correct' => 1,
                                'removed_index' => 9,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            // [//18
            //     'name' => 'Послушайте аудио и найдите правильный ответ ',
            //     'type' => 'select-images',
            //     'questions' => [
            //         [
            //             'question' => "Выберите картинки, которые были упомянуты в аудио. Правильных может быть несколько",
            //             'question_options' => [
            //                 [
            //                     'image' => '/images/task/imagetask-1.jpg',
            //                     'correct' => 0,
            //                 ],
            //                 [
            //                     'image' => '/images/task/imagetask-2.jpg',
            //                     'correct' => 1,
            //                 ],
            //                 [
            //                     'image' => '/images/task/imagetask-3.jpg',
            //                     'correct' => 1,
            //                 ],
            //                 [
            //                     'image' => '/images/task/imagetask-4.jpg',
            //                     'correct' => 0,
            //                 ],
            //             ],
            //             'point' => 1,
            //         ],
            //     ],
            // ],
            
            [//18
                'name' => '',
                'type' => 'inline-drop-down-test',
                'questions' => [
                     [
                        'question' => "I hate 1 blood. Looking at it makes me go all weak at the knees. I can’t even 18 own blood. I don’t know why.",
                        'question_options' => [
                            [
                                'option_text' => 'the sight',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                            [
                                'option_text' => 'match for',
                                'correct' => 0,
                                'removed_index' => 2
                            ],
                            [
                                'option_text' => 'wish I could',
                                'correct' => 0,
                                'removed_index' => 18,
                            ],
                            [
                                'option_text' => 'look at my',
                                'correct' => 1,
                                'removed_index' => 18,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The thing 2 is giving blood for a medical check. I fainted once after I saw my blood in a small bottle. ",
                        'question_options' => [
                            [
                                'option_text' => 'hate most is',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                             [
                                'option_text' => 'have to sit',
                                'correct' => 0,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "If I have a nose bleed, I 7 down for 30 minutes 12 better. It’s impossible for me to watch operations on TV.",
                        'question_options' => [
                            [
                                'option_text' => 'have to sit',
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => 'have sit',
                                'correct' => 0,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => 'wish I could',
                                'correct' => 0,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => 'before I feel',
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I 1 donate blood to others. I can’t. I know giving blood is really important, but I’m 17 enough.",
                        'question_options' => [
                            [
                                'option_text' => 'wish I could',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                            [
                                'option_text' => 'not brave',
                                'correct' => 0,
                                'removed_index' => 1
                            ],
                            [
                                'option_text' => 'not brave',
                                'correct' => 1,
                                'removed_index' => 17
                            ],
                            [
                                'option_text' => 'the sight',
                                'correct' => 0,
                                'removed_index' => 17
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "One thing about blood I do find interesting is blood types. 10 blood type can affect your personality. ",
                        'question_options' => [
                            [
                                'option_text' => 'I think your',
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => 'I know your',
                                'correct' => 0,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "0 in some countries, people with blood type A would not be a good romantic 15 someone with blood type O.",
                        'question_options' => [
                            [
                                'option_text' => 'I know that',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                            [
                                'option_text' => 'I think that',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                            [
                                'option_text' => 'match for',
                                'correct' => 1,
                                'removed_index' => 15
                            ],
                            [
                                'option_text' => 'not brave',
                                'correct' => 0,
                                'removed_index' => 15
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//19
                'name' => '',
                'type' => 'emoji-test',
                'questions' => [
                    [
                        'question' => 'guess the word',
                        'image' => '/images/task/qw_11.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'Burger King',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'false Burger King',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'guess the word',
                        'image' => '/images/task/qw_2.JPEG',
                        'question_options' => [
                            [
                                'option_text' => 'Bus stop',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'false',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'guess the word',
                        'image' => '/images/task/qw_1.JPEG',
                        'question_options' => [
                            [
                                'option_text' => 'Birthday song',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'false',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'guess the word',
                        'image' => '/images/task/qw_3.JPEG',
                        'question_options' => [
                            [
                                'option_text' => 'Sunglasses',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'false',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'guess the word',
                        'image' => '/images/task/qw_4.JPEG',
                        'question_options' => [
                            [
                                'option_text' => 'Love Letter',
                                'correct' => 1,
                            ],
                            [
                                'option_text' => 'false',
                                'correct' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//38
                'name' => '',
                'type' => 'image-select',
                'questions' => [
                    [
                        'image' => '/images/task/q_11.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'waterfoll',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'waterfall',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'woterfall',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'image' => '/images/task/q_22.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'kitchen',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'kichen',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'kitchin',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'image' => '/images/task/q_33.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'dinosaur',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'dinasaur',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'dinosaor',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'image' => '/images/task/q_44.jpg',
                        'question_options' => [
                            [
                                'option_text' => 'mountein',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'mauntain',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'mountain',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//39
                'name' => 'Listen again and complete the gaps',
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "A Hi, I'm Mike. What's your name",
                        'question_options' => [
                            [
                                'option_text' => 'name',
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "B Hannah.",
                        'question_options' => [
                            [
                                'option_text' => '',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A sorry",
                        'question_options' => [
                            [
                                'option_text' => 'sorry',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "B Hannah!",
                        'question_options' => [
                            [
                                'option_text' => '',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [ //40
                'name' => 'Complete the gaps with a word from the list.',
                'type' => 'drag-fill-empty-space',
                'questions' => [
                    [
                        'question' => "Hello = ",
                        'question_options' => [
                            [
                                'option_text' => 'Hi',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "My name's… = 3",
                        'question_options' => [
                            [
                                'option_text' => "I'm…",
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Very well = 3",
                        'question_options' => [
                            [
                                'option_text' => 'Fine',
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'Thank you = 3',
                        'question_options' => [
                            [
                                'option_text' => 'Thanks',
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => 'Goodbye = 2',
                        'question_options' => [
                            [
                                'option_text' => 'Bye',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//41
                'name' => 'Complete the sentences with are, is, or am.',
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "I'm Mike = I am Mike.",
                        'question_options' => [
                            [
                                'option_text' => 'am',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "My name's Hannah = My name is Hannah",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "You're early = You are early.",
                        'question_options' => [
                            [
                                'option_text' => 'are',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "It's 7894 132 456 = It is 7894 132 456. ",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//42
                'name' => 'Complete with am, is, or are.',
                'type' => 'insert-words-sentences',
                'questions' => [
                        [
                        'question' => "We are from London.",
                        'question_options' => [
                            [
                                'option_text' => 'are',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Не is early.",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "They are teachers.",
                        'question_options' => [
                            [
                                'option_text' => 'are',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Today is Wednesday ",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I am sorry",
                        'question_options' => [
                            [
                                'option_text' => 'am',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "It is a hotel.",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "You are in room 402.",
                        'question_options' => [
                            [
                                'option_text' => 'are',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "She is a student.",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "My name is Carla.",
                        'question_options' => [
                            [
                                'option_text' => 'is',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I am in a taxi..",
                        'question_options' => [
                            [
                                'option_text' => 'am',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    ],
                ],
                [//43
                'name' => 'Write the sentences with contractions.',
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "It is Friday. It's Friday",
                        'question_options' => [
                            [
                                'option_text' => "It's",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "They are in school. They're in school",
                        'question_options' => [
                            [
                                'option_text' => "They're",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I am very well. I'm very well",
                        'question_options' => [
                            [
                                'option_text' => "I'm",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "You are in my class. You're",
                        'question_options' => [
                            [
                                'option_text' => "You're",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    ],
                ],
                [//44
                'name' => "Write the sentences with a subject pronoun and a contraction. Example: Mike and Hannah are students. They're students.",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "John is in room 5. He's in room 5",
                        'question_options' => [
                            [
                                'option_text' => "He's",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Sam and I are early. We're early",
                        'question_options' => [
                            [
                                'option_text' => "We're",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Julia is a teacher. She's a teacher",
                        'question_options' => [
                            [
                                'option_text' => "She's",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "The school is in Madrid. It's in Madrid",
                        'question_options' => [
                            [
                                'option_text' => "It's",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [ //45
                'name' => 'Complete the days of the week with the letters.',
                'type' => 'drag-fill-empty-space',
                'questions' => [
                    [
                        'question' => "1 onday /mandeı/",
                        'question_options' => [
                            [
                                'option_text' => 'M',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 uesday /'tju:zdei/",
                        'question_options' => [
                            [
                                'option_text' => 'T',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 ednesday /wenzde1/",
                        'question_options' => [
                            [
                                'option_text' => "W",
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 ursday /03:zdei/",
                        'question_options' => [
                            [
                                'option_text' => 'Th',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 iday /'fraider/",
                        'question_options' => [
                            [
                                'option_text' => 'Fr',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 aturday /'sætəder/",
                        'question_options' => [
                            [
                                'option_text' => 'S',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 unday /'sandei/",
                        'question_options' => [
                            [
                                'option_text' => 'S',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//46
                'name' => "Match the words with the numbers.",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "O zero /‘ziərəu/",
                        'question_options' => [
                            [
                                'option_text' => "He's",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "1 one /wan/",
                        'question_options' => [
                            [
                                'option_text' => "We're",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "2 two /tu:/",
                        'question_options' => [
                            [
                                'option_text' => 'She’s',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "3 three /0ri:/",
                        'question_options' => [
                            [
                                'option_text' => 'It’s',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "4 four /fo:(r)/",
                        'question_options' => [
                            [
                                'option_text' => 'It’s',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "5 five /faiv/",
                        'question_options' => [
                            [
                                'option_text' => 'five',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "6 six /sıks/",
                        'question_options' => [
                            [
                                'option_text' => 'five',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "7 seven /‘sevn/",
                        'question_options' => [
                            [
                                'option_text' => 'seven',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "8 eight /eit/",
                        'question_options' => [
                            [
                                'option_text' => 'seven',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "9 nine /nain/",
                        'question_options' => [
                            [
                                'option_text' => 'seven',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "10 ten /ten/",
                        'question_options' => [
                            [
                                'option_text' => 'seven',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "11 eleven /i'levn/",
                        'question_options' => [
                            [
                                'option_text' => 'eleven',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "12 twelve /twelv/",
                        'question_options' => [
                            [
                                'option_text' => 'twelve',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "13 thirteen /03:'ti:n/",
                        'question_options' => [
                            [
                                'option_text' => 'twelve',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "14 fourteen /fo:ti:n/",
                        'question_options' => [
                            [
                                'option_text' => 'twelve',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "15 fifteen /fif’tim/",
                        'question_options' => [
                            [
                                'option_text' => 'fifteen',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "16 sixteen /sıks'ti:n/",
                        'question_options' => [
                            [
                                'option_text' => 'fifteen',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "17 seventeen /sevn'ti:n/",
                        'question_options' => [
                            [
                                'option_text' => 'fifteen',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "18 eighteen  /er'ti:n/",
                        'question_options' => [
                            [
                                'option_text' => 'fifteen',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "19 nineteen /nain'ti:n/",
                        'question_options' => [
                            [
                                'option_text' => 'fifteen',
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "20 twenty /'twenti/",
                        'question_options' => [
                            [
                                'option_text' => 'twenty',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [//47
                'name' => "Listen. Where are they? Write 1-6 in the boxes",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "airport. Gate number 9",
                        'question_options' => [
                            [
                                'option_text' => "9",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "sandwich bar. 3 euros 20 cents.",
                        'question_options' => [
                            [
                                'option_text' => "3",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                            [
                                'option_text' => "20",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "hotel. Room 12",
                        'question_options' => [
                            [
                                'option_text' => '12',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "museum. Closed on Mondays",
                        'question_options' => [
                            [
                                'option_text' => "Mondays",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "taxi. 16 Manchester Road.",
                        'question_options' => [
                            [
                                'option_text' => "16",
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "school. Classes on Tuesday and Thursday",
                        'question_options' => [
                            [
                                'option_text' => "Tuesday",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                            [
                                'option_text' => "Thursday",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [//48
                'name' => "GETTING TO KNOW YOU",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "Where are you from?",
                        'question_options' => [
                            [
                                'option_text' => "He's",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where were you born?",
                        'question_options' => [
                            [
                                'option_text' => "We're",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where do you live ?",
                        'question_options' => [
                            [
                                'option_text' => 'live',
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Do you live in a house or a flat?",
                        'question_options' => [
                            [
                                'option_text' => "live",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Do you have any brothers and sisters?",
                        'question_options' => [
                            [
                                'option_text' => "have",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Do you have any pets?",
                        'question_options' => [
                            [
                                'option_text' => "have",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What do you do ?",
                        'question_options' => [
                            [
                                'option_text' => "do",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What time do you get up during the week?",
                        'question_options' => [
                            [
                                'option_text' => "get",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where do you usually have lunch?",
                        'question_options' => [
                            [
                                'option_text' => "have",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What time do you usually go to bed?",
                        'question_options' => [
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where did you learn English before?",
                        'question_options' => [
                            [
                                'option_text' => "learn",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Can you speak any other languages? Which? ",
                        'question_options' => [
                            [
                                'option_text' => "speak",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What kind of music do you listen to?",
                        'question_options' => [
                            [
                                'option_text' => "speak",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What TV programs or series do you watch ?",
                        'question_options' => [
                            [
                                'option_text' => "watch",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Do you play any sport or exercise? What?",
                        'question_options' => [
                            [
                                'option_text' => "play",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What kind of books or magazines do you read ? ",
                        'question_options' => [
                            [
                                'option_text' => "read",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How often do you go to the cinema?",
                        'question_options' => [
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What did you do last weekend? ",
                        'question_options' => [
                            [
                                'option_text' => "do",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [//49
                'name' => "Where are you from? (are)",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "Where we park? (can) Where can we park ?",
                        'question_options' => [
                            [
                                'option_text' => "Where",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                            [
                                'option_text' => "can",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                             [
                                'option_text' => "we",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "park",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How are you? (old) How old are you ?",
                        'question_options' => [
                            [
                                'option_text' => "How",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                            [
                                'option_text' => "old",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "are",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                             [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Does finish at 8.00? (the class) Does the class finish at 8.00 ?",
                        'question_options' => [
                            [
                                'option_text' => "Does",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "class",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                             [
                                'option_text' => "finish",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "at",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "8.00",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where do your friends? (live) Where do your friends live ?",
                        'question_options' => [
                            [
                                'option_text' => "Where",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "do",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "your",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                             [
                                'option_text' => "friends",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "live",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Why you answer my email? (didn't) Why didn't you answer my email ?",
                        'question_options' => [
                            [
                                'option_text' => "Why",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "didn't",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                             [
                                'option_text' => "answer",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "my",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "email",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Do you often to the cinema? (go) Do you often go to the cinema ?",
                        'question_options' => [
                            [
                                'option_text' => "Do",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "often",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                             [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                             [
                                'option_text' => "cinema",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What this word mean? (does) What does this word mean ?",
                        'question_options' => [
                            [
                                'option_text' => "What",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "does",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "this",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                             [
                                'option_text' => "word",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "mean",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "What time did arrive? (your friends) What time did you arrive ?",
                        'question_options' => [
                            [
                                'option_text' => "What",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "time",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "did",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                             [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "arrive",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Who are you talking? (to) Who are you talking to ?",
                        'question_options' => [
                            [
                                'option_text' => "What",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "are",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                             [
                                'option_text' => "talking",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where were last night? (you) Where were you last night ?",
                        'question_options' => [
                            [
                                'option_text' => "Where",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "were",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                             [
                                'option_text' => "last",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "night",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [//50
                'name' => "you  live where do ? Where do you live?",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "you a do have car? Do you have a car ?",
                        'question_options' => [
                            [
                                'option_text' => "Do",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "have",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "car",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "was brother your where born? Where was your brother born ?",
                        'question_options' => [
                            [
                                'option_text' => "Where",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "was",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "your",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "brother",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "born",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "often he how phone does you? How often does he phone you ?",
                        'question_options' => [
                            [
                                'option_text' => "How",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "often",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "does",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "he",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "phone",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "their tim arrive does flight what? What time does the flight arrive ?",
                        'question_options' => [
                            [
                                'option_text' => "What",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "time",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "does",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "flight",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "arrive",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Brazil from is girlfriend your? Is your girlfriend from Brazil ?",
                        'question_options' => [
                            [
                                'option_text' => "Is",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "your",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "girlfriend",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "from",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "Brazil",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "languages how you many can speak? How many languages can you speak ?",
                        'question_options' => [
                            [
                                'option_text' => "How",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "many",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "languages",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "can",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "speak",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "party the how was? How was the party ?",
                        'question_options' => [
                            [
                                'option_text' => "How",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                            [
                                'option_text' => "was",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "party",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "last go where you summer did? Where did you go last summer ?",
                        'question_options' => [
                            [
                                'option_text' => "Where",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "did",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                             [
                                'option_text' => "last",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                             [
                                'option_text' => "summer",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "there doctor here is a? Is there a doctor ?",
                        'question_options' => [
                            [
                                'option_text' => "Is",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "there",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "doctor",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "come bus to you by school did? Did you come to school by bus ?",
                        'question_options' => [
                            [
                                'option_text' => "Did",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "come",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "school",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "by",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "bus",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [//51
                'name' => "",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "first name: Wayne",
                        'question_options' => [
                            [
                                'option_text' => "He's",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "email: jvime64@kings.co.uk",
                        'question_options' => [
                            [
                                'option_text' => "jvime64@kings.co.uk",
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "postcode: SE21HGP",
                        'question_options' => [
                            [
                                'option_text' => 'SE21HGP',
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "surname: Rathbone",
                        'question_options' => [
                            [
                                'option_text' => "Rathbone",
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "phone number: 07700987782",
                        'question_options' => [
                            [
                                'option_text' => "07700987782",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "address: Russell",
                        'question_options' => [
                            [
                                'option_text' => "Russell",
                                'correct' => 1,
                                'removed_index' => 1
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],

                [//52
                'name' => '',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "a buying something 3",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                             [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "b checking into a hotel 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                             [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "c trying to get help 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                             [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "d giving a student directions 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                             [
                                'option_text' => '6',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "e giving a class some information 6",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                             [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "f arriving at a restaurant 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                             [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                        'point' => 1,
                    ],
                    ]
                ],
                [//53
                'name' => '',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "board /bə:d/ 4",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                             [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "chair /feat/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "computer /kəm'pju:tə/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "desk /desk/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "door /də:/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "picture /'piktfə/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "table /'teibl/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "wall /wə:l/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "window /‘windəu/ 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],  
             [//54
                'name' => '',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "Sorry, can you repeat that, please? 6",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Sorry I'm late 6",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                             [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            
                            
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "I don't understand 3",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Can I have a copy, please? 6",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How do you spell it? 5",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I don't know 3",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 1,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 3,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Excuse me, what's ... in English? 6",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                   
                    [
                        'question' => "Can you help me, please? 5",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                     [
                        'question' => "What page is it? 4",
                        'question_options' => [
                            [
                                'option_text' => '14',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '15',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '16',
                                'correct' => 1,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '17',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '18',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '19',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '20',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '21',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => '22',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//55
                'name' => '',
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "What's your first name?",
                        'question_options' => [
                            [
                                'option_text' => 'first',
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What's your surname?",
                        'question_options' => [
                            [
                                'option_text' => "What's",
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How do you spell it?",
                        'question_options' => [
                            [
                                'option_text' => 'How',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where are you from ?",
                        'question_options' => [
                            [
                                'option_text' => 'from',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How old are you?",
                        'question_options' => [
                            [
                                'option_text' => 'How',
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What's your address ?",
                        'question_options' => [
                            [
                                'option_text' => "What's",
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What's your postcode ?",
                        'question_options' => [
                            [
                                'option_text' => "What's",
                                'correct' => 1,
                                'removed_index' => 0
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What's your e-mail address?",
                        'question_options' => [
                            [
                                'option_text' => "e-mail",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What's your phone number?",
                        'question_options' => [
                            [
                                'option_text' => "phone",
                                'correct' => 1,
                                'removed_index' => 2
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//56
                'name' => "My name's Carly. I'm from Brazil.",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "The students are from Italy. Their names are Susanna and Tito.",
                        'question_options' => [
                            [
                                'option_text' => 'Their',
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "She's in my class. Her name is Rebecca.",
                        'question_options' => [
                            [
                                'option_text' => "Her",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "We're in class 2. Our teacher is Richard.",
                        'question_options' => [
                            [
                                'option_text' => 'Our',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "London is famous for its parks",
                        'question_options' => [
                            [
                                'option_text' => 'parks',
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How do you spell your surname, Anna?",
                        'question_options' => [
                            [
                                'option_text' => 'your',
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "This is my teacher. His name is Brad.",
                        'question_options' => [
                            [
                                'option_text' => "His",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I'm from London. My address is 31, Old Kent Road.",
                        'question_options' => [
                            [
                                'option_text' => "My",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Sit down and open your books, please.",
                        'question_options' => [
                            [
                                'option_text' => "your",
                                'correct' => 1,
                                'removed_index' => 4
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Laura is in my class. Her desk is near the window.",
                        'question_options' => [
                            [
                                'option_text' => "Her",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "We're from Liverpool. Our surname is Connor.",
                        'question_options' => [
                            [
                                'option_text' => "Our",
                                'correct' => 1,
                                'removed_index' => 3
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//57
                'name' => "Mark and Simon are friends. They/Their are in class 2.",
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "She's a new student. 4 name's Ipek.",
                        'question_options' => [
                            [
                                'option_text' => 'She',
                                'correct' => 0,
                                'removed_index' => 4,
                            ],
                            [
                                'option_text' => 'Her',
                                'correct' => 1,
                                'removed_index' => 4,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Is 1 teacher British?",
                        'question_options' => [
                            [
                                'option_text' => 'they',
                                'correct' => 0,
                                'removed_index' => 1,
                            ],
                            [
                                'option_text' => 'their',
                                'correct' => 1,
                                'removed_index' => 1,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "My name's Soraya. I'm in 5 class.",
                        'question_options' => [
                            [
                                'option_text' => 'you',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => 'your',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Where are 2 friends from?",
                        'question_options' => [
                            [
                                'option_text' => 'you',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => 'your',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "We're French. 2 names are Marc and Jacques.",
                        'question_options' => [
                            [
                                'option_text' => 'We',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => 'Our',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Is 1 German?",
                        'question_options' => [
                            [
                                'option_text' => 'she',
                                'correct' => 0,
                                'removed_index' => 1,
                            ],
                            [
                                'option_text' => 'her',
                                'correct' => 1,
                                'removed_index' => 1,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Peter is a teacher. 4 is from Ireland.",
                        'question_options' => [
                            [
                                'option_text' => 'He',
                                'correct' => 1,
                                'removed_index' => 1,
                            ],
                            [
                                'option_text' => 'His',
                                'correct' => 0,
                                'removed_index' => 1,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What's 1 name?",
                        'question_options' => [
                            [
                                'option_text' => 'he',
                                'correct' => 0,
                                'removed_index' => 1,
                            ],
                            [
                                'option_text' => 'his',
                                'correct' => 1,
                                'removed_index' => 1,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "I'm Karen. 2 surname is White.",
                        'question_options' => [
                            [
                                'option_text' => 'I',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => 'My',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "0 is from Barcelona.",
                        'question_options' => [
                            [
                                'option_text' => 'She',
                                'correct' => 1,
                                'removed_index' => 0,
                            ],
                            [
                                'option_text' => 'Her',
                                'correct' => 0,
                                'removed_index' => 0,
                            ],
                           
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//58
                'name' => 'Match the sentences and photos.',
                'type' => 'inline-drop-down-test',
                'questions' => [
                    [
                        'question' => "She has curly red hair. 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                    ],
                    [
                        'question' => "She has long straight hair. 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                    ],
                    [
                        'question' => "She has big blue eyes. 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                    ],
                    [
                        'question' => "She has short blonde hair. 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                    ],
                    [
                        'question' => "He has a beard and a mustache 7",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 1,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                        ],
                    ],
                    [
                        'question' => "He's bald. 2",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 1,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 2,
                            ],
                        ],
                    ],
                    [
                        'question' => "He's very tall and thin. 5",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 1,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 5,
                            ],
                        ],
                    ],
                    [
                        'question' => "He's medium height and very slim. 6",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 0,
                                'removed_index' => 6,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 1,
                                'removed_index' => 6,
                            ],
                        ],
                    ],
                    [
                        'question' => "He's quite short and a bit overweight. 7",
                        'question_options' => [
                            [
                                'option_text' => '1',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '2',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '3',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '4',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '5',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '6',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '7',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '8',
                                'correct' => 1,
                                'removed_index' => 7,
                            ],
                            [
                                'option_text' => '9',
                                'correct' => 0,
                                'removed_index' => 7,
                            ],
                        ],
                    ],
                    
                ]
            ],
    [//59
                'name' => "clever       friendly        funny       generous       kind      lazy       shy       talkative",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "A person who is open and warm is friendly unfriendly",
                        'question_options' => [
                            [
                                'option_text' => "unfriendly",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who talks a lot is talkative quiet",
                        'question_options' => [
                            [
                                'option_text' => "talkative",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "quiet",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who likes giving people things is generous mean",
                        'question_options' => [
                            [
                                'option_text' => "generous",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "mean",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who is friendly and good to other people is kind unkind",
                        'question_options' => [
                            [
                                'option_text' => "kind",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "unkind",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who doesn't want to work is lazy hard-working",
                        'question_options' => [
                            [
                                'option_text' => "lazy",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "hard-working",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who makes people laugh is funny serious",
                        'question_options' => [
                            [
                                'option_text' => "funny",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "serious",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who is quick at learning and understanding things is clever stupid" ,
                        'question_options' => [
                            [
                                'option_text' => "clever",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "stupid",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "A person who can't talk easily to people he/she doesn't know is shy extrovert" ,
                        'question_options' => [
                            [
                                'option_text' => "shy",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "extrovert",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//60
                'name' => "",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "Why does Charlotte want to find Clint a partner?",
                        'question_options' => [
                            [
                                'option_text' => "unfriendly",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How do we know that Charlotte and Clint are close?",
                        'question_options' => [
                           [
                                'option_text' => "unfriendly",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "What was dating like when Clint was young?",
                        'question_options' => [
                           [
                                'option_text' => "unfriendly",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "How does Clint find dates now, and how has Charlotte helped him?",
                        'question_options' => [
                            [
                                'option_text' => "unfriendly",
                                'correct' => 1,
                                'removed_index' => 'none'
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//61
                'name' => "[+] he / usually / get up / late. He usually gets up late.",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "[?] Anna / like music. Does Anna like music ?",
                        'question_options' => [
                            [
                                'option_text' => "Does",
                                'correct' => 1,
                                'removed_index' => 5
                            ],
                            [
                                'option_text' => "Anna",
                                'correct' => 1,
                                'removed_index' => 6
                            ],
                            [
                                'option_text' => "like",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "music",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[+] my sister / have a lot of hobbies. My sister has a lot of hobbies",
                        'question_options' => [
                            [
                                'option_text' => "My",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "sister",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "has",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "lot",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "of",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                            [
                                'option_text' => "hobbies",
                                'correct' => 1,
                                'removed_index' => 15
                            ],
                        ],
                        'point' => 1,
                    ],

                    [
                        'question' => "[-] I / get on very well with my parents. I don't get on well with my parents",
                        'question_options' => [
                            [
                                'option_text' => "I",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "don't",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "get",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "on",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "well",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                            [
                                'option_text' => "with",
                                'correct' => 1,
                                'removed_index' => 15
                            ],
                            [
                                'option_text' => "my",
                                'correct' => 1,
                                'removed_index' => 16
                            ],
                            [
                                'option_text' => "parents",
                                'correct' => 1,
                                'removed_index' => 17
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[+] my brother / study English at university. My brother studies English at university",
                        'question_options' => [
                            [
                                'option_text' => "My",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "brother",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "studies",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "English",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "at",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "university",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[-] my neighbors / have any children. My neighbors don't have any children ",
                        'question_options' => [
                            [
                                'option_text' => "My",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "neighbors",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "don't",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "have",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "any",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "children",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[?] What time / the film start. What time does the film start ?",
                        'question_options' => [
                            [
                                'option_text' => "What",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "time",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "does",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "film",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "start",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[+] he / go out twice a week. He goes out twice a week ",
                        'question_options' => [
                            [
                                'option_text' => "He",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "goes",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "out",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "twice",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "week",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[-] we / often talk about politics. We don't often talk about politics",
                        'question_options' => [
                            [
                                'option_text' => "We",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "don't",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "often",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "talk",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "about",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "politics",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[?] how often / you see your brother. How often do you see your brother ?",
                        'question_options' => [
                            [
                                'option_text' => "How",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "often",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "do",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "you",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "see",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "your",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "brother",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "[-] Sally / go on Facebook very much. Sally doesn't go on Facebook very much ",
                        'question_options' => [
                            [
                                'option_text' => "Sally",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "doesn't",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "on",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "Facebook",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "very",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "much",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                        ],
                        'point' => 1,
                    ],

                ]
            ],
            [//62
                'name' => "go    cinema    we     often    the    to  - We often go to the cinema.",
                'type' => 'insert-words-sentences',
                'questions' => [
                    [
                        'question' => "always before go I bed 11.00 to - I always go to bed before 11.00",
                        'question_options' => [
                            [
                                'option_text' => "I",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "always",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "bed",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "before",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "11.00",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "ever her Kate sees family hardly - Kate hardly ever sees her family",
                        'question_options' => [
                            [
                                'option_text' => "Kate",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "hardly",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "ever",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "sees",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "her",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "family",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "Saturdays never shopping on go we - We never go shopping on Saturdays",
                        'question_options' => [
                            [
                                'option_text' => "We",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "never",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "shopping",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "on",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "Saturdays",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "a to I dentist's year go twice the - I go to a dentist twice a year",
                        'question_options' => [
                            [
                                'option_text' => "I",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "dentist",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "twice",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "year",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "in they breakfast sometimes bed have - They sometimes have breakfast in bed",
                        'question_options' => [
                            [
                                'option_text' => "They",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "sometimes",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "have",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "breakfast",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "in",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "bed",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "usually car I the listen the in audio to - I usually listen to a radio in the car",
                        'question_options' => [
                            [
                                'option_text' => "I",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "usually",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "listen",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                            [
                                'option_text' => "radio",
                                'correct' => 1,
                                'removed_index' => 15
                            ],
                            [
                                'option_text' => "in",
                                'correct' => 1,
                                'removed_index' => 16
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 17
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "in day park every Alan the runs - Alan runs in the park every day ",
                        'question_options' => [
                            [
                                'option_text' => "Alan",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "runs",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "in",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "park",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "every",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "day",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                            
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "often late Sam is work for - Sam is often late for work ",
                        'question_options' => [
                            [
                                'option_text' => "Sam",
                                'correct' => 1,
                                'removed_index' => 7
                            ],
                            [
                                'option_text' => "is",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "often",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "late",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "for",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "work",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "often John to go doesn't theatre the - John doesn't often go to the theatre",
                        'question_options' => [
                            [
                                'option_text' => "John",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "doesn't",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "often",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "go",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "to",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "the",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "theatre",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                        ],
                        'point' => 1,
                    ],
                    [
                        'question' => "visit I once my month a mum - I visit my mum once a month",
                        'question_options' => [
                            [
                                'option_text' => "I",
                                'correct' => 1,
                                'removed_index' => 8
                            ],
                            [
                                'option_text' => "visit",
                                'correct' => 1,
                                'removed_index' => 9
                            ],
                            [
                                'option_text' => "my",
                                'correct' => 1,
                                'removed_index' => 10
                            ],
                            [
                                'option_text' => "mum",
                                'correct' => 1,
                                'removed_index' => 11
                            ],
                            [
                                'option_text' => "once",
                                'correct' => 1,
                                'removed_index' => 12
                            ],
                            [
                                'option_text' => "a",
                                'correct' => 1,
                                'removed_index' => 13
                            ],
                            [
                                'option_text' => "month",
                                'correct' => 1,
                                'removed_index' => 14
                            ],
                        ],
                        'point' => 1,
                    ],
                ]
            ],
            [//63
                        'name' => '',
                        'type' => 'inline-drop-down-test',
                        'questions' => [
                            [
                                'question' => "He's tall, dark, and handsome. 5",
                                'question_options' => [
                                    [
                                        'option_text' => 'S',
                                        'correct' => 1,
                                        'removed_index' => 5,
                                    ],
                                    [
                                        'option_text' => 'J',
                                        'correct' => 0,
                                        'removed_index' => 5,
                                    ],
                                ],
                                'point' => 1,
                            ],
                            [
                                'question' => "He's very tall. 3",
                                'question_options' => [
                                    [
                                        'option_text' => 'S',
                                        'correct' => 0,
                                        'removed_index' => 3,
                                    ],
                                    [
                                        'option_text' => 'J',
                                        'correct' => 1,
                                        'removed_index' => 3,
                                    ],
                                ],
                                'point' => 1,
                            ],
                            [
                                'question' => "He's a teacher 3",
                                'question_options' => [
                                    [
                                        'option_text' => 'S',
                                        'correct' => 0,
                                        'removed_index' => 3,
                                    ],
                                    [
                                        'option_text' => 'J',
                                        'correct' => 1,
                                        'removed_index' => 3,
                                    ],
                                ],
                                'point' => 1,
                            ],
                            [
                                'question' => "He's from Germany, but he lives in Dublin 8",
                                'question_options' => [
                                    [
                                        'option_text' => 'S',
                                        'correct' => 1,
                                        'removed_index' => 8,
                                    ],
                                    [
                                        'option_text' => 'J',
                                        'correct' => 0,
                                        'removed_index' => 8,
                                    ],
                                ],
                                'point' => 1,
                            ],
                             [
                                'question' => "There isn't a spark 4",
                                'question_options' => [
                                    [
                                        'option_text' => 'S',
                                        'correct' => 0,
                                        'removed_index' => 4,
                                    ],
                                    [
                                        'option_text' => 'J',
                                        'correct' => 1,
                                        'removed_index' => 4,
                                    ],
                                ],
                                'point' => 1,
                            ],
                            [
                                'question' => "He's a real gentleman 4",
                                'question_options' => [
                                    [
                                        'option_text' => 'S',
                                        'correct' => 1,
                                        'removed_index' => 4,
                                    ],
                                    [
                                        'option_text' => 'J',
                                        'correct' => 0,
                                        'removed_index' => 4,
                                    ],
                                ],
                                'point' => 1,
                            ],
                        ]
                    ],
        ];

        foreach ($tasks as $taskArr) {
            $questions = [];
            $imageTask = null;
            if (isset($taskArr['questions'])) {
                $questions = $taskArr['questions'];
                unset($taskArr['questions']);
            }
            if (isset($taskArr['image'])) {
                $imageTask = public_path($taskArr['image']);
                unset($taskArr['image']);
            }

            $task = Task::create($taskArr);
            if ($imageTask) {
                $task->addMedia($imageTask)
                    ->preservingOriginal()
                    ->toMediaCollection('image', 'public');
            }
            if ($questions) {
                foreach ($questions as $questionArr) {
                    $qoptions = [];
                    if (isset($questionArr['question_options'])) {
                        $qoptions = $questionArr['question_options'];
                        unset($questionArr['question_options']);
                    }
                    $Qimage = null;
                    if (isset($questionArr['image'])) {
                        $Qimage = public_path($questionArr['image']);
                        unset($questionArr['image']);
                    }
                    $question = $task->questions()->create($questionArr);
                    if ($Qimage) {
                        $question->addMedia($Qimage)
                            ->preservingOriginal()
                            ->toMediaCollection('image', 'public');
                    }

                    foreach ($qoptions as $qoption) {
                        $image = null;
                        if (isset($qoption['image'])) {
                            $image = public_path($qoption['image']);
                            unset($qoption['image']);
                        }
                        $option = $question->variants()->create($qoption);
                        if ($image) {
                            $option->addMedia($image)
                                ->preservingOriginal()
                                ->toMediaCollection('image', 'public');
                        }

                    }
                }
            }
        }
    }
}
