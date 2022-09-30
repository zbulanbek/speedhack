<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseSections = [
            1 => [
                 [
                    'title' => 'Beginner',
                    'lessons' => [
                        [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => '- Вы понимаете, как используется глагол to be (I am a student, It is cold).

                                -   Вы знаете три простых времени (Present, Future и Past Simple), настоящее длительное время (Present Continuous), имеете представление о настоящем совершенном времени (Present Perfect).
                                -   Вы понимаете разницу между предложениями в будущем времени: I’m going to bake a cake (конструкция to be going to), I’ll bake a cake (Future Simple), I’m baking a cake (Present Continuous для обозначения будущего действия).
                                -   Вы знаете три формы неправильных глаголов (drive-drove-driven).
                                -   Вы можете задавать вопросы вашему собеседнику (Word order in questions).
                                - Вы понимаете разницу между a cat и the cat (неопределенный и определенный артикли).
                                - Вы не удивляетесь, что можно сказать a cookie, но нельзя a toast (тост, поджаренный кусочек хлеба) (Countable and uncountable nouns).
                                - Вы понимаете, что значит lady’s dress, James’ house (Possessive Case).
                                -   Вы знаете степени сравнения прилагательных (big-bigger-the biggest).
                                -   Вы понимаете разницу между that cup, this cup, these cups, those cups (Demonstrative pronouns)
                                - Вы знаете объектные местоимения (me, him, her, us, them) и правила их использования.
                                - Вы знаете некоторые наречия частотности (often, usually, always, sometimes) и образа действия (well, quickly, hard).
                                - Вы знаете, что значит There is no snow on the ground (There is/are/was/were).
                                - Вы знаете, что значат предложения I can read, I can’t swim, You should work (Modal verbs can/can’t/should).
                                - Вы понимаете, что значит I like reading, I hate shopping (Конструкция like/love/hate + -ing).
                                ',
                                'lesson_time_lines' => [
                                [
                                 
                                    'title' => "My name's Hannah, not Anna",
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'Video',
                                            'content' => [
                                               [
                                                    'video' => 'https://www.youtube.com/watch?v=PKs8vONQC88',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/abc.jpeg',
                                                    ],
                                                    'sort_order' => 1,
                                                ],
                                            ]
                                        ],
                                    ]
                                ],
                            ]
                        ],
                    ],
                ],
                [
                    'title' => 'Elementary',
                    'lessons' => [
                        [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => '- Вы понимаете, как используется глагол to be (I am a student, It is cold).

                                -   Вы знаете три простых времени (Present, Future и Past Simple), настоящее длительное время (Present Continuous), имеете представление о настоящем совершенном времени (Present Perfect).
                                -   Вы понимаете разницу между предложениями в будущем времени: I’m going to bake a cake (конструкция to be going to), I’ll bake a cake (Future Simple), I’m baking a cake (Present Continuous для обозначения будущего действия).
                                -   Вы знаете три формы неправильных глаголов (drive-drove-driven).
                                -   Вы можете задавать вопросы вашему собеседнику (Word order in questions).
                                - Вы понимаете разницу между a cat и the cat (неопределенный и определенный артикли).
                                - Вы не удивляетесь, что можно сказать a cookie, но нельзя a toast (тост, поджаренный кусочек хлеба) (Countable and uncountable nouns).
                                - Вы понимаете, что значит lady’s dress, James’ house (Possessive Case).
                                -   Вы знаете степени сравнения прилагательных (big-bigger-the biggest).
                                -   Вы понимаете разницу между that cup, this cup, these cups, those cups (Demonstrative pronouns)
                                - Вы знаете объектные местоимения (me, him, her, us, them) и правила их использования.
                                - Вы знаете некоторые наречия частотности (often, usually, always, sometimes) и образа действия (well, quickly, hard).
                                - Вы знаете, что значит There is no snow on the ground (There is/are/was/were).
                                - Вы знаете, что значат предложения I can read, I can’t swim, You should work (Modal verbs can/can’t/should).
                                - Вы понимаете, что значит I like reading, I hate shopping (Конструкция like/love/hate + -ing).
                                ',
                            'lesson_time_lines' => [
                                [
                                    'title' => "My name's Hannah, not Anna",
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'LISTENING & SPEAKING. Look at the pictures. Listen and number them 1-4.',
                                            'content' => [
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_1.png',
                                                        '/images/lesson/les_2.png',
                                                        '/images/lesson/les_3.png',
                                                        '/images/lesson/les_4.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_1.mp3',
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'task_id' => 39,
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'task_id' => 40,
                                                    'sort_order' => 3
                                                ],
                                            ]
                                        ],
                                          [
                                            'title' => 'Listen and repeat some phrases from the dialogue. Copy the rhythm.',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_2.mp3',
                                                    'sort_order' => 0
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'GRAMMAR verb be',
                                            'content' => [
                                                [
                                                    'task_id' => 41,
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/ver_1.png',
                                                    ],
                                                    'sort_order' => 1,
                                                ],
                                                [
                                                    'task_id' => 42,
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'task_id' => 43,
                                                    'sort_order' => 3
                                                ],
                                                [
                                                    'task_id' => 44,
                                                    'sort_order' => 4
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'VOCABULARY. DAYS OF THE WEEK',
                                            'content' => [
                                                [
                                                    'task_id' => 45,
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Useful phrases
                                                                the weekend (= Saturday and Sunday)
                                                                a weekday (= Monday-Friday)
                                                                What day is it today? It's Friday.
                                                                Have a good weekend. You too.
                                                                See you on Monday.
                                                                Capital letters
                                                                Days of the week begin with a capital letter.
                                                                Tuesday NOT tuesday
                                                                ",
                                                    'sort_order' => 1
                                                ],
                                                
                                            ]
                                        ],
                                        [
                                            'title' => 'NUMBERS 0-20',
                                            'content' => [
                                                [
                                                    'task_id' => 46,
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Phone numbers
                                                        We say the digits separately.
                                                        794 1938 = seven nine four, one nine three eight
                                                        44 = four four OR double four
                                                        0 = zero OR oh",
                                                    'sort_order' => 1
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'LISTENING & SPEAKING',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_3.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 47,
                                                    'sort_order' => 1
                                                ],
                                                
                                            ]
                                        ],
                                      
                                       
                                    ]
                               
                                ],
                            ]
                        ],
                                
                        [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Ваш словарный запас составляет от 1000 до 1500 слов и фраз.
                                            - Вы знаете часто употребляемые слова и фразы на английском языке.',
                            'lesson_time_lines' => [
                                [
                                    'title' => "VOCABULARY",
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'Look at the picture of a classroom. Match the words and pictures.',
                                            'content' => [
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_22_1.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                [
                                                    'task_id' => 53,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listen and check.',
                                                    'audio' => '/audios/lesson/aud_22_1.mp3',
                                                    'sort_order' => 2
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Match the phrases and pictures',
                                            
                                            'content' => [
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_22_2.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                [
                                                    'task_id' => 54,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listen and check.',
                                                    'audio' => '/audios/lesson/aud_22_2.mp3',
                                                    'sort_order' => 2
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Match the phrases and pictures 14-22. ',
                                            
                                            'content' => [
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_22_3.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                [
                                                    'task_id' => 55,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listen and check.',
                                                    'audio' => '/audios/lesson/aud_22_3.mp3',
                                                    'sort_order' => 2
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Look at these common abbreviations. Can you say any of them in English? Listen and check.',
                                            'content' => [
                                                
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_22_4.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                [
                                                    'audio_name' => 'Listen and check.',
                                                    'audio' => '/audios/lesson/aud_22_4.mp3',
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'text' => "Practise saying the phrases below with abbreviations.",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "a Personal Computer ",
                                                    'sort_order' => 3
                                                ],
                                                 [
                                                    'text' => "the United Kingdom ",
                                                    'sort_order' => 3
                                                ],
                                                 [
                                                    'text' => "the European Union",
                                                    'sort_order' => 3
                                                ],
                                                 [
                                                    'text' => "a Disc Jockey",
                                                    'sort_order' => 3
                                                ],
                                                [
                                                    'text' => "Very Important Person",
                                                    'sort_order' => 3
                                                ],
                                                 [
                                                    'text' => "the United States of America",
                                                    'sort_order' => 3
                                                ],
                                                [
                                                    'text' => "a Portable Document Format",
                                                    'sort_order' => 3
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'LISTENING AND SPEAKING',
                                            'content' => [
                                                 [
                                                    'audio_name' => 'Listen. Complete the receptionist’s questions.',
                                                    'audio' => '/audios/lesson/aud_22_5.mp3',
                                                    'sort_order' =>0
                                                ],
                                                [
                                                    'task_id' => 56,
                                                    'sort_order' => 1
                                                ],
                                                 [
                                                    'text' => "Listen again and repeat the questions. Copy the rhythm.",
                                                    'sort_order' => 3
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_22_5.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Choose the correct word.',
                                            'content' => [
                                                [
                                                    'text' => "Complete the sentences with a possessive adjective.",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'task_id' => 57,
                                                    'sort_order' => 0
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => "SPEAKING ",
                                            'content' => [
                                                [
                                                    'text' => "Talk about celebrities you adore (using possessive pronouns). ",
                                                    'sort_order' => 1
                                                ],
                                            ]
                                        ],
                                    ]
                               
                                ],
                            ]
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => '- Вы можете рассказать о себе, своей семье и доме несколькими простыми предложениями.
                                - Вы знаете, как рассказать о своих предпочтениях и увлечениях.
                                - Вы с легкостью описываете ваш рабочий день и отдых в выходные.
                                - Вы можете поделиться собеседником о своих планах на отпуск.
                                - Вы можете совершать покупки в магазине за границей или общаться с персоналом в отеле в пределах знакомой вам лексики.
                                - Вы можете говорить на простые бытовые темы.
                                - Вы можете отвечать на простые вопросы в рамках знакомых вам тем.
                                '
                        ],
                        [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированную литературу своего уровня.

                            Вы можете понять надписи и объявления в общественных заведениях или на улице.
                            Вы можете понять суть новостей общей тематики.
                            '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированные для своего уровня аудиозаписи.

Вы понимаете, что вам говорят носители языка, если они произносят фразы медленно и используют знакомую вам лексику.'
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы можете написать простое личное письмо другу.

Вы можете написать краткий текст о себе, своем хобби, семье, доме.
Вы можете заполнять простые анкетные данные.
'
                        ],
                    ]
                ],
                [
                    'title' => 'Pre-intermediate',
                    'lessons' => [
                        [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы знаете времена Present, Past и Fu-ture Simple, Present и Past Continuous, Present и Past Perfect.

                            - Вы понимаете, что значит I’m going to travel in autumn, I used to work hard и I’m used to working hard (Конструкции to be going to, used to do и to be used to).
                            - Вы можете задать собеседнику вопро-сы разных типов (Порядок слов в вопро-сах).
                            - Вы знаете степени сравнения прилага-тельных.
                            - Вам знакома разница между a little flour и a few strawberries (Quantifiers).
                            - Вы знаете, после одних глаголов ис-пользуется форма на -ing – I enjoy read-ing, а после других – инфинитив с to – I want to study English (Gerunds and infini-tives).
                            - Вы знаете, чем отличаются I mustn’t work и I don’t have to work (Понимаете модальные глаголы have to/don’t have to, must/musn’t, can/could, may/might, should/shouldn’t).
                            - Вы видите разницу между “If it rains, I’ll stay at home и If it rained, I would stay at home” (Первый и второй тип условных предложений).
                            - Вы понимаете, что значит “A big pie was baked by Sara” (Пассивный залог).
                            - Вы можете грамотно перефразировать прямую речь He said: “I’m working” в кос-венную He said that he was working
                            ',
                            'lesson_time_lines' => [
                                [
                                    'title' => "VOCABULARY & SPEAKING",
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'Complete the questions in Getting to know you with a verb.',
                                            'content' => [
                                                [
                                                    'task_id' => 48,
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Listen and check.",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_2_1.mp3',
                                                    'sort_order' => 0
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Listen and repeat questions 1-6. Copy the rhythm and intonation.',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_2_2.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Have a conversation. Ask and answer the questions in the questionnaire.",
                                                    'sort_order' => 1
                                                ],
                                                
                                            ]
                                        ],
                                        [
                                            'title' => 'GRAMMAR ',
                                            'content' => [
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/les_2_1.png',
                                                        '/images/lesson/les_2_2.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                
                                            ]
                                        ],
                                        [
                                            'title' => 'WORD ORDER IN QUESTIONS',
                                            'content' => [
                                                [
                                                    'text' => "Put the word or phrase in the correct place in the question. ",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 49,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'text' => "Put the words in the correct order to make questions. ",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'task_id' => 50,
                                                    'sort_order' => 3
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'LISTENING & SPEAKING',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'text' => "Listen to extracts from six conversations. Write the letters and numbers you hear.",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'audio_name' => 'Listen to extracts from six conversations. Write the letters and numbers you hear.',
                                                    'audio' => '/audios/lesson/aud_2_3.mp3',
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'task_id' => 51,
                                                    'sort_order' => 2
                                                ],
                                                
                                            ]
                                        ],
                                        [
                                            'title' => 'Now listen to the conversations. Match 1-6 to situations a-f.',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'audio_name' => 'Listen to.',
                                                    'audio' => '/audios/lesson/aud_2_4.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 52,
                                                    'sort_order' => 1
                                                ],
                                                
                                            ]
                                        ],
                                    ]
                                ]
                            ]
                        ],
                        [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Ваш словарный запас составляет от 1500 до 2000 слов и фраз.

- Вам знакомы различные формы слов, некоторые идиомы и фразовые глаголы.
- Вы употребляете в речи структуры со словами so, either, neither, no more, anymore, too, enough, no longer, whenever, if, when, as, like.',
                            'lesson_time_lines' => [
                                [
                                    'title' => "Perfect date",
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'VOCABULARY & READING describing people',
                                            'content' => [
                                                [
                                                    'text' => "Listen to three women describing their fathers. Which one is Charlotte, the woman with her father in the two photos?",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_les_22_1.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_1.png',
                                                        '/images/lesson/lesp_22_2.png',
                                                    ],
                                                    'sort_order' => 0,
                                                ],
                                                [
                                                    'text' => "Listen to Charlotte again. What adjectives does she use to describe her father's height, hair, weight, and smile?",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_les_22_2.mp3',
                                                    'sort_order' => 0
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'APPEARANCE',
                                            'content' => [
                                                [
                                                    'text' => "What does he/she look like?",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_3.png',
                                                    ],
                                                   'sort_order' => 0,
                                                ],
                                                [
                                                    'task_id' => 58,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_les_22_3.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_4.png',
                                                    ],
                                                   'sort_order' => 0,
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' =>  "PERSONALITY What's he / she like?",
                                            'content' => [
                                                [
                                                    'text' => "Match the adjectives to the definitions.",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'task_id' => 59,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'text' => "Complete the Opposite column with an adjective from the list.",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'text' => "extrovert         hard-working         mean       quiet        serious          stupid        unfriendly     unkind",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'text' => "Listen and check.",
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/lesson/aud_les_22_4.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_5.png',
                                                    ],
                                                   'sort_order' => 0,
                                                ],
                                                
                                            ]
                                        ],
                                        [
                                            'title' => 'Now read the article about Charlotte and her father Clint. Find the information about Clint.',
                                            'content' => [
                                                [
                                                    'text' => "his age his job his marital status his personality his perfect partner",
                                                    'sort_order' => 0
                                                ],
                                               
                                                [
                                                    'text' => "«So, how was the date?» ",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "You probably think this is a parent asking the question to their child.But many children are now helping their single parents find love, too.
                                                        Clint Bouchez, a 52-year-old businessman from Reigate, Surrey, got
                                                        divorced ten years ago. His daughter, 26-year-old Charlotte, doesn't
                                                        want her dad to end up alone - her mum remarried five years ago,
                                                        and Charlotte has a boyfriend.
                                                        Charlotte and Clint are very close. They often go out together in the
                                                        evening, they're planning a trip to India for later in the year, and
                                                        they're both Bruce Springsteen fans. But Charlotte thinks that Clint
                                                        needs a new partner, and he agrees.
                                                        'My dad is the perfect man'' she says. 'He's warm, he's generous, he
                                                        knows how to look after a woman, how to treat a woman. He's a
                                                        gentleman. He's always the one who pays on dates. He's romantic
                                                        and he's fun. I don't mind spending Friday and Saturday nights
                                                        with my dad and that says a lot - I'm only 26.'
                                                        Dating in the 21st century is very different from when Clint was
                                                        young. Internet dating has changed everything. 'It's difficult now
                                                        just to walk over to a woman and ask her 'Can I buy you a drink?'
                                                        he says. 'Before, when you met people face to face, there was
                                                        sometimes a 'spark', a feeling of romantic destiny - you don't get
                                                        that from someone's profile picture.'
                                                        Charlotte wrote Clint's dating profile for an online dating
                                                        website. Clint would like to meet a woman who works, preferably
                                                        a businesswoman. Someone who's independent, but funny and
                                                        clever. He has had several dates, but none of the women were right
                                                        for him. He and Charlotte are still looking. 'I'm always hopeful,'
                                                        he says. 'I really believe that sooner or later I'm going to find
                                                        'the one'. 
                                                        ",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "Read the article again and answer the questions.",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'task_id' => 60,
                                                    'sort_order' => 1
                                                ],
                                                 [
                                                    'text' => "Look at the two highlighted words in the article. Which word describes…:",
                                                    'sort_order' => 2
                                                ],
                                                 [
                                                    'text' => "1 a person who makes you laugh",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "2 a person who you can have a good time with",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "Do you think Charlotte is the best person to help find her dad a date? Why?",
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_6.png',
                                                    ],
                                                   'sort_order' => 0,
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'GRAMMAR present simple',
                                            'content' => [
                                                [
                                                    'text' => "Write sentences and questions with the present simple.",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 61,
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "Put the words in the correct order.",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 62,
                                                    'sort_order' => 2
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'LISTENING',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'text' => "Listen to Elspbeth Gordon, a journalist, talking about a dating experiment. Answer the questions.",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "1 What kind of app does Elspbeth use?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "2 What do you do if you like someone?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "3 What's Elspbeth's mother going to do?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "4 What's Elspbeth going to do?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'audio_name' => 'Listen to.',
                                                    'audio' => '/audios/lesson/aud_les_22_5.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_7.png',
                                                    ],
                                                   'sort_order' => 0,
                                                ],
                                                 [
                                                    'pictures' => [
                                                        '/images/lesson/lesp_22_8.png',
                                                    ],
                                                   'sort_order' => 0,
                                                ],
                                                
                                            ]
                                        ],
                                        [
                                            'title' => 'Now listen to Elspbeth describe her first two dates. What does she think of her mum’s choices?',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'audio_name' => 'Listen to.',
                                                    'audio' => '/audios/lesson/aud_les_22_6.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Listen again and match the phrases to the two men. Write J for John or S for Sebastian. Which man do you think Elspbeth prefers? Why?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 63,
                                                    'sort_order' => 2
                                                ],
                                                [
                                                    'text' => "Now listen to the third date. Is it a success? Who do you think the message is from?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'audio_name' => 'Listen to.',
                                                    'audio' => '/audios/lesson/aud_les_22_7.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Listen. Were you right? How does Elspbeth feel? Do you think they have a second date?",
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'audio_name' => 'Listen to.',
                                                    'audio' => '/audios/lesson/aud_les_22_8.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'text' => "Do you think a member of your family could choose a good date for you? Do you think you could choose one for them?",
                                                    'sort_order' => 0
                                                ],
                                            ]
                                        ],

                                    ]
                                ],

                            ],
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы говорите довольно четко, обладаете правильным произношением.

- Вы можете составить рассказ из 15-18 предложений о себе, своей семье, вкусах, взглядах, профессии, хобби.
- Вы знаете, что глагол с предлогом может иметь какое-то специфическое значение, а не переводиться дословно (фразовые глаголы).
- Вы понимаете главную мысль бытовой англоязычной речи, даже если вам неизвестны некоторые слова в ней.
- Вы можете общаться с носителем языка, если он строит беседу в рамках знакомых вам слов.
- Если вы не можете вспомнить какое-то слово, то не теряетесь, а объясняете его значение своими словами.
                          '
                        ],
                         [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы понимаете несложные рекламные тексты, газетные и журнальные статьи, адаптированную для своего уровня ли-тературу.

- Можете понять основную идею про-стых неадаптированных текстов, даже если вам встретятся незнакомые слова.

                          '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы понимаете разговорную речь среднего темпа со знакомыми вам словами.

- Вы можете уловить смысл фильма или телевизионного шоу на языке оригинала, если читаете и переводите субтитры.
- Вы хорошо различаете интонацию, ударение, звуки.
- Вы понимаете адаптированные для вашего уровня аудиокниги.


                          '
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы можете написать небольшой рас-сказ о себе, своем городе, описать пред-ложенную картинку, выразить свое мне-ние.

- Вы можете составить личное письмо на общие темы, текст поздравления и т. п.



                          '
                        ],
                    ]
                ],
                [
                    'title' => 'Intermediate',
                     'lessons' => [
                          [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => "- Вы знаете все времена английского: Present, Past и Future Simple; Present, Past и Future Continuous; Present, Past и Future Perfect; Present, Past и Future Perfect Continuous.

- Знаете, в чем суть предложений I used to play football и I’m used to playing football (конструкции used to do и to be used to doing).
- Когда вы говорите о будущем времени, то понимаете разницу между: I’m going to visit John (конструкция to be going to), I’m visiting John tomorrow at 5 o’clock (Present Continuous для будущего действия) и I’ll visit John next month (Future Simple).
- Вы понимаете разницу между You mustn't do exercises и You don't have to do exercises (модальные глаголы).
- Понимаете, в чем разница между: I stopped to rest и I stopped resting (употребление герундия и инфинитива после глагола).
- Вы знаете сравнительные степени прилагательных (hot-hotter-hottest).
- Понимаете, в каких случаях употребляются слова little/few и a little/a few (слова, обозначающие количество в английском языке).
- Вы видите разницу между: If you come home, we’ll go shopping, If you came home, we would go shopping и If you had come home, we would have gone shopping (первый, второй и третий тип условных предложений).
- Можете верно перефразировать прямую речь She asked: “What are you doing?” в косвенную She asked what I was doing.
- Вы легко создаете вопросы с целью уточнить что-либо: You don’t like coffee, do you? (Question tags)
"
                        ],
                         [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Ваш словарный запас составляет от 2000 до 3000 слов и фраз.

- Вам знакомы некоторые идиомы и фразовые глаголы.
- Вы можете общаться с деловыми партнерами, не углубляясь в специальную бизнес-терминологию (владеете базовой деловой лексикой).
- Активно используете в речи конструкции neither... nor, in addition to, as well as, apart from, due to, because of.
                          '
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы говорите четко, обладаете хорошим произношением, окружающие понимают вашу речь.

- Вы понимаете, где делать логические паузы в предложениях, в какой части предложения повышать или понижать голос.
- Вы говорите довольно бегло, не делаете длительные паузы во время разговора.
- Вы можете описывать внешность, рассказывать о своем образовании и опыте работы, выражаете свое мнение по разным вопросам, можете говорить практически на любую тему.
- Вы используете в речи фразовые глаголы и некоторые идиомы.
- Вы не упрощаете речь, используете довольно сложные грамматические конструкции: разные типы условных предложений, пассивный залог, различные времена, косвенную речь.

                          '
                        ],
                         [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы хорошо понимаете адаптированную литературу своего уровня.

- Вы понимаете статьи общей тематики в Интернете, газетах и журналах, хотя и встречаете незнакомую вам лексику.
- Вы начинаете читать несложную литературу в оригинале, понимаете смысл прочитанного, но можете встречать незнакомые слова.


                          '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы отлично понимаете адаптированные для своего уровня аудиозаписи.

- Вы понимаете смысл неадаптированных аудио, даже если не знаете каких-то слов, а диктор говорит с акцентом.
- Вы отличаете акцент носителей языка от акцента неанглоязычных спикеров.
- Вы смотрите фильмы и сериалы на языке оригинала с субтитрами.
- Вы можете слушать несложные оригинальные или адаптированные для вашего уровня аудиокниги.



                          '
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы грамматически правильно строите предложения.

- Вы можете написать неофициальное или небольшое официальное письмо.
- При необходимости сможете заполнить официальные бумаги на английском языке.
- Можете дать письменное описание каких-либо мест, событий, людей, прокомментировать предлагаемый текст.



                          '
                        ],
                    ]
                ],
                [
                    'title' => 'Upper-intermediate',
                    'lessons' => [
                          [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => "Вы разбираетесь во всех аспектах вре-мен английского языка: Present, Past и Future Simple; Present, Past и Future Con-tinuous; Present, Past и Future Perfect; Present, Past и Future Perfect Continuous.

Вы знаете, в каком именно будущем времени выразить ваши планы, предло-жения, обещания, решения, предсказа-ния (different ways of expressing future).
Вы знаете, как сказать «чем больше он читает, тем больше понимает»: The more he reads, the more he understands (comparative structures).
Вы понимаете разницу между: If you stay at home, I’ll take your car; If you stayed at home, I would take your car; If you had stayed at home, I would have taken your car (первый, второй и третий тип услов-ных предложений).
Вы знаете, что значит I wish I had bought that cake (предложения с I wish); If only I had bought that cake (предложения с If only); I would rather you had bought that cake (предложения с would rather).
Вы понимаете смысл предложений He must have broken your vase и He may be watching TV now (модальные глаголы с разными видами инфинитивов).
Вы понимаете разницу между I forgot to dance with Lisa и I forgot dancing with Lisa (употребление герундия и инфини-тива после глагола).
Вы знаете, в чем разница в предложени-ях I used to bake cookies; I’m used to bak-ing cookies и I get used to baking cookies (конструкции used to do, be used to do-ing и get used to doing).
Вы понимаете смысл предложения This house will have been built by 2019 (пас-сивный залог).
Вы можете правильно перефразировать прямую речь He said: “This shop will open next week” в косвенную He said that shop would open the week after (reported speech).
Вы понимаете, в каких случаях исполь-зовать фразы You can call me if you need anything, а когда Please, do not hesitate to contact me (неформальный и формаль-ный стили английского языка).

"
                        ],
                         [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Ваш словарный запас составляет от 3000 до 4000 слов и фраз.

Вы знаете немало идиом и используете в речи фразовые глаголы английского языка.
Вы можете общаться с деловыми партнерами, не углубляясь в специфику деятельности (формальный стиль общения в английском языке).
Активно используете в речи различные конструкции, например: the more the better, so/such, neither ... nor, had better, whenever, whatever, probably, likely и т. п.

                          '
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы можете поддержать беседу на ан-глийском языке на любую тему.

В разговоре вы используете разные грамматические конструкции, оперируе-те всеми временами, условными пред-ложениями, фразами в пассивном и ак-тивном залоге.
Вы можете составить монолог на не-сколько минут на любую тему.
Вы говорите связно, длинными предло-жениями, не используете короткие об-рывистые фразы.
Вы не теряетесь при вопросах собесед-ника, можете ответить на любые вопро-сы.


                          '
                        ],
                         [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированную литера-туру своего уровня.

Вы понимаете литературу в оригинале, хотя и встречаете в тексте незнакомые слова.
Вы читаете и понимаете новости и ста-тьи в Интернете на английском языке.

                          '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированные для сво-его уровня аудиозаписи с первого про-слушивания.

Вы понимаете носителей языка, даже если они говорят с акцентом или в быстром темпе.
Вы смотрите фильмы и сериалы общей тематики на английском с субтитрами и учитесь смотреть их без субтитров.
Вы слушаете адаптированные аудиокни-ги на английском языке.


                          '
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы грамотно строите предложения, используете разные времена и конструкции.

Вы умеете писать неофициальные и простые официальные письма.
Вы можете заполнять различную документацию на английском языке.
Вы можете написать эссе (сочинение) на любую тему, четко выражая свои мысли.

                          '
                        ],
                    ]
                ],
                
            ],
            // 2 => [
            //     [
            //         'title' => 'Introduction 1'
            //     ],
            //     [
            //         'title' => 'Getting started'
            //     ],
            //     [
            //         'title' => 'Basics'
            //     ],
            //     [
            //         'title' => 'Tips'
            //     ],
            //     [
            //         'title' => 'Repeat the past'
            //     ],
            // ],
            3 => [
                [
                    'title' => 'Elementary',
                    'lessons' => [
                        [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => '- Вы понимаете, как используется глагол to be (I am a student, It is cold).

                                -   Вы знаете три простых времени (Present, Future и Past Simple), настоящее длительное время (Present Continuous), имеете представление о настоящем совершенном времени (Present Perfect).
                                -   Вы понимаете разницу между предложениями в будущем времени: I’m going to bake a cake (конструкция to be going to), I’ll bake a cake (Future Simple), I’m baking a cake (Present Continuous для обозначения будущего действия).
                                -   Вы знаете три формы неправильных глаголов (drive-drove-driven).
                                -   Вы можете задавать вопросы вашему собеседнику (Word order in questions).
                                - Вы понимаете разницу между a cat и the cat (неопределенный и определенный артикли).
                                - Вы не удивляетесь, что можно сказать a cookie, но нельзя a toast (тост, поджаренный кусочек хлеба) (Countable and uncountable nouns).
                                - Вы понимаете, что значит lady’s dress, James’ house (Possessive Case).
                                -   Вы знаете степени сравнения прилагательных (big-bigger-the biggest).
                                -   Вы понимаете разницу между that cup, this cup, these cups, those cups (Demonstrative pronouns)
                                - Вы знаете объектные местоимения (me, him, her, us, them) и правила их использования.
                                - Вы знаете некоторые наречия частотности (often, usually, always, sometimes) и образа действия (well, quickly, hard).
                                - Вы знаете, что значит There is no snow on the ground (There is/are/was/were).
                                - Вы знаете, что значат предложения I can read, I can’t swim, You should work (Modal verbs can/can’t/should).
                                - Вы понимаете, что значит I like reading, I hate shopping (Конструкция like/love/hate + -ing).
                                ',
                            'lesson_time_lines' => [
                                [
                                    'title' => 'Hello',
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'Answer the question: What do you do? Do you like your job? Why/why not?',
                                            'type' => 'read',
                                            'content' => [
                                                [
                                                    'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger.'
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Answer the question: What do you do? Do you like your job? Why/why not?',
                                            'type' => 'video',
                                            'content' => [
                                                [
                                                    'video' => '/videos/routine.mp4',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'subtitle' => 'Vocabulary',
                                                    'vocabularies' => [
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
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'task_id' => 1,
                                                    'sort_order' => 2
                                                ]
                                            ]
                                        ],
                                        [
                                            'title' => 'Answer the question: What do you do? Do you like your job? Why/why not?',
                                            'type' => 'audio',
                                            'content' => [
                                                [
                                                    'audio_name' => 'Listening part 1',
                                                    'audio' => '/audios/audio.mp3',
                                                    'sort_order' => 0
                                                ],
                                                [
                                                    'task_id' => 1,
                                                    'sort_order' => 1
                                                ],
                                                [
                                                    'task_id' => 2,
                                                    'sort_order' => 2
                                                ],
                                            ]
                                        ],
                                    ]
                                ],
                                [
                                    'title' => 'Hello 2',
                                    'lesson_blocks' => [
                                        [
                                            'title' => 'Answer the question: What do you do? Do you like your job? Why/why not?',
                                            'type' => 'read',
                                            'content' => [
                                                [
                                                    'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger.'
                                                ],
                                            ]
                                        ],
                                        [
                                            'title' => 'Answer the question: What do you do? Do you like your job? Why/why not?',
                                            'type' => 'read',
                                            'content' => [
                                                [
                                                    'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger.'
                                                ],
                                            ]
                                        ],
                                    ]
                                ],
                            ],
                        ],
                        [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Ваш словарный запас составляет от 1000 до 1500 слов и фраз.
                                            - Вы знаете часто употребляемые слова и фразы на английском языке.'
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => '- Вы можете рассказать о себе, своей семье и доме несколькими простыми предложениями.
                                - Вы знаете, как рассказать о своих предпочтениях и увлечениях.
                                - Вы с легкостью описываете ваш рабочий день и отдых в выходные.
                                - Вы можете поделиться собеседником о своих планах на отпуск.
                                - Вы можете совершать покупки в магазине за границей или общаться с персоналом в отеле в пределах знакомой вам лексики.
                                - Вы можете говорить на простые бытовые темы.
                                - Вы можете отвечать на простые вопросы в рамках знакомых вам тем.
                                '
                        ],
                        [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированную литературу своего уровня.

                            Вы можете понять надписи и объявления в общественных заведениях или на улице.
                            Вы можете понять суть новостей общей тематики.
                            '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированные для своего уровня аудиозаписи.

Вы понимаете, что вам говорят носители языка, если они произносят фразы медленно и используют знакомую вам лексику.'
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы можете написать простое личное письмо другу.

Вы можете написать краткий текст о себе, своем хобби, семье, доме.
Вы можете заполнять простые анкетные данные.
'
                        ],
                    ]
                ],
                [
                    'title' => 'Pre-intermediate',
                    'lessons' => [
                          [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы знаете времена Present, Past и Fu-ture Simple, Present и Past Continuous, Present и Past Perfect.

                            - Вы понимаете, что значит I’m going to travel in autumn, I used to work hard и I’m used to working hard (Конструкции to be going to, used to do и to be used to).
                            - Вы можете задать собеседнику вопро-сы разных типов (Порядок слов в вопро-сах).
                            - Вы знаете степени сравнения прилага-тельных.
                            - Вам знакома разница между a little flour и a few strawberries (Quantifiers).
                            - Вы знаете, после одних глаголов ис-пользуется форма на -ing – I enjoy read-ing, а после других – инфинитив с to – I want to study English (Gerunds and infini-tives).
                            - Вы знаете, чем отличаются I mustn’t work и I don’t have to work (Понимаете модальные глаголы have to/don’t have to, must/musn’t, can/could, may/might, should/shouldn’t).
                            - Вы видите разницу между “If it rains, I’ll stay at home и If it rained, I would stay at home” (Первый и второй тип условных предложений).
                            - Вы понимаете, что значит “A big pie was baked by Sara” (Пассивный залог).
                            - Вы можете грамотно перефразировать прямую речь He said: “I’m working” в кос-венную He said that he was working
                            '
                        ],
                         [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Ваш словарный запас составляет от 1500 до 2000 слов и фраз.

- Вам знакомы различные формы слов, некоторые идиомы и фразовые глаголы.
- Вы употребляете в речи структуры со словами so, either, neither, no more, anymore, too, enough, no longer, whenever, if, when, as, like.                            '
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы говорите довольно четко, обладаете правильным произношением.

- Вы можете составить рассказ из 15-18 предложений о себе, своей семье, вкусах, взглядах, профессии, хобби.
- Вы знаете, что глагол с предлогом может иметь какое-то специфическое значение, а не переводиться дословно (фразовые глаголы).
- Вы понимаете главную мысль бытовой англоязычной речи, даже если вам неизвестны некоторые слова в ней.
- Вы можете общаться с носителем языка, если он строит беседу в рамках знакомых вам слов.
- Если вы не можете вспомнить какое-то слово, то не теряетесь, а объясняете его значение своими словами.
                          '
                        ],
                         [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы понимаете несложные рекламные тексты, газетные и журнальные статьи, адаптированную для своего уровня ли-тературу.

- Можете понять основную идею про-стых неадаптированных текстов, даже если вам встретятся незнакомые слова.

                          '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы понимаете разговорную речь среднего темпа со знакомыми вам словами.

- Вы можете уловить смысл фильма или телевизионного шоу на языке оригинала, если читаете и переводите субтитры.
- Вы хорошо различаете интонацию, ударение, звуки.
- Вы понимаете адаптированные для вашего уровня аудиокниги.


                          '
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы можете написать небольшой рас-сказ о себе, своем городе, описать пред-ложенную картинку, выразить свое мне-ние.

- Вы можете составить личное письмо на общие темы, текст поздравления и т. п.



                          '
                        ],
                    ]
                ],
                [
                    'title' => 'Intermediate',
                     'lessons' => [
                          [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => "- Вы знаете все времена английского: Present, Past и Future Simple; Present, Past и Future Continuous; Present, Past и Future Perfect; Present, Past и Future Perfect Continuous.

- Знаете, в чем суть предложений I used to play football и I’m used to playing football (конструкции used to do и to be used to doing).
- Когда вы говорите о будущем времени, то понимаете разницу между: I’m going to visit John (конструкция to be going to), I’m visiting John tomorrow at 5 o’clock (Present Continuous для будущего действия) и I’ll visit John next month (Future Simple).
- Вы понимаете разницу между You mustn't do exercises и You don't have to do exercises (модальные глаголы).
- Понимаете, в чем разница между: I stopped to rest и I stopped resting (употребление герундия и инфинитива после глагола).
- Вы знаете сравнительные степени прилагательных (hot-hotter-hottest).
- Понимаете, в каких случаях употребляются слова little/few и a little/a few (слова, обозначающие количество в английском языке).
- Вы видите разницу между: If you come home, we’ll go shopping, If you came home, we would go shopping и If you had come home, we would have gone shopping (первый, второй и третий тип условных предложений).
- Можете верно перефразировать прямую речь She asked: “What are you doing?” в косвенную She asked what I was doing.
- Вы легко создаете вопросы с целью уточнить что-либо: You don’t like coffee, do you? (Question tags)
"
                        ],
                         [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Ваш словарный запас составляет от 2000 до 3000 слов и фраз.

- Вам знакомы некоторые идиомы и фразовые глаголы.
- Вы можете общаться с деловыми партнерами, не углубляясь в специальную бизнес-терминологию (владеете базовой деловой лексикой).
- Активно используете в речи конструкции neither... nor, in addition to, as well as, apart from, due to, because of.
                          '
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы говорите четко, обладаете хорошим произношением, окружающие понимают вашу речь.

- Вы понимаете, где делать логические паузы в предложениях, в какой части предложения повышать или понижать голос.
- Вы говорите довольно бегло, не делаете длительные паузы во время разговора.
- Вы можете описывать внешность, рассказывать о своем образовании и опыте работы, выражаете свое мнение по разным вопросам, можете говорить практически на любую тему.
- Вы используете в речи фразовые глаголы и некоторые идиомы.
- Вы не упрощаете речь, используете довольно сложные грамматические конструкции: разные типы условных предложений, пассивный залог, различные времена, косвенную речь.

                          '
                        ],
                         [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы хорошо понимаете адаптированную литературу своего уровня.

- Вы понимаете статьи общей тематики в Интернете, газетах и журналах, хотя и встречаете незнакомую вам лексику.
- Вы начинаете читать несложную литературу в оригинале, понимаете смысл прочитанного, но можете встречать незнакомые слова.


                          '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы отлично понимаете адаптированные для своего уровня аудиозаписи.

- Вы понимаете смысл неадаптированных аудио, даже если не знаете каких-то слов, а диктор говорит с акцентом.
- Вы отличаете акцент носителей языка от акцента неанглоязычных спикеров.
- Вы смотрите фильмы и сериалы на языке оригинала с субтитрами.
- Вы можете слушать несложные оригинальные или адаптированные для вашего уровня аудиокниги.



                          '
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => '- Вы грамматически правильно строите предложения.

- Вы можете написать неофициальное или небольшое официальное письмо.
- При необходимости сможете заполнить официальные бумаги на английском языке.
- Можете дать письменное описание каких-либо мест, событий, людей, прокомментировать предлагаемый текст.



                          '
                        ],
                    ]
                ],
                [
                    'title' => 'Upper-intermediate',
                    'lessons' => [
                          [
                            'title' => 'Грамматика (Grammar)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => "Вы разбираетесь во всех аспектах вре-мен английского языка: Present, Past и Future Simple; Present, Past и Future Con-tinuous; Present, Past и Future Perfect; Present, Past и Future Perfect Continuous.

Вы знаете, в каком именно будущем времени выразить ваши планы, предло-жения, обещания, решения, предсказа-ния (different ways of expressing future).
Вы знаете, как сказать «чем больше он читает, тем больше понимает»: The more he reads, the more he understands (comparative structures).
Вы понимаете разницу между: If you stay at home, I’ll take your car; If you stayed at home, I would take your car; If you had stayed at home, I would have taken your car (первый, второй и третий тип услов-ных предложений).
Вы знаете, что значит I wish I had bought that cake (предложения с I wish); If only I had bought that cake (предложения с If only); I would rather you had bought that cake (предложения с would rather).
Вы понимаете смысл предложений He must have broken your vase и He may be watching TV now (модальные глаголы с разными видами инфинитивов).
Вы понимаете разницу между I forgot to dance with Lisa и I forgot dancing with Lisa (употребление герундия и инфини-тива после глагола).
Вы знаете, в чем разница в предложени-ях I used to bake cookies; I’m used to bak-ing cookies и I get used to baking cookies (конструкции used to do, be used to do-ing и get used to doing).
Вы понимаете смысл предложения This house will have been built by 2019 (пас-сивный залог).
Вы можете правильно перефразировать прямую речь He said: “This shop will open next week” в косвенную He said that shop would open the week after (reported speech).
Вы понимаете, в каких случаях исполь-зовать фразы You can call me if you need anything, а когда Please, do not hesitate to contact me (неформальный и формаль-ный стили английского языка).

"
                        ],
                         [
                            'title' => 'Словарный запас (Vocabulary)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Ваш словарный запас составляет от 3000 до 4000 слов и фраз.

Вы знаете немало идиом и используете в речи фразовые глаголы английского языка.
Вы можете общаться с деловыми партнерами, не углубляясь в специфику деятельности (формальный стиль общения в английском языке).
Активно используете в речи различные конструкции, например: the more the better, so/such, neither ... nor, had better, whenever, whatever, probably, likely и т. п.

                          '
                        ],
                        [
                            'title' => 'Говорение (Speaking)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы можете поддержать беседу на ан-глийском языке на любую тему.

В разговоре вы используете разные грамматические конструкции, оперируе-те всеми временами, условными пред-ложениями, фразами в пассивном и ак-тивном залоге.
Вы можете составить монолог на не-сколько минут на любую тему.
Вы говорите связно, длинными предло-жениями, не используете короткие об-рывистые фразы.
Вы не теряетесь при вопросах собесед-ника, можете ответить на любые вопро-сы.


                          '
                        ],
                         [
                            'title' => 'Чтение (Reading)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированную литера-туру своего уровня.

Вы понимаете литературу в оригинале, хотя и встречаете в тексте незнакомые слова.
Вы читаете и понимаете новости и ста-тьи в Интернете на английском языке.

                          '
                        ],
                         [
                            'title' => 'Аудирование (Listening)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы понимаете адаптированные для сво-его уровня аудиозаписи с первого про-слушивания.

Вы понимаете носителей языка, даже если они говорят с акцентом или в быстром темпе.
Вы смотрите фильмы и сериалы общей тематики на английском с субтитрами и учитесь смотреть их без субтитров.
Вы слушаете адаптированные аудиокни-ги на английском языке.


                          '
                        ],
                        [
                            'title' => 'Письмо (Writing)',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => 'Вы грамотно строите предложения, используете разные времена и конструкции.

Вы умеете писать неофициальные и простые официальные письма.
Вы можете заполнять различную документацию на английском языке.
Вы можете написать эссе (сочинение) на любую тему, четко выражая свои мысли.

                          '
                        ],
                    ]
                ],
                
            ],
            5 => [
                [
                    'title' => 'Маркетинг и бизнес',
                    'lessons' => [
                        [
                            'title' => 'Базовые понятия маркетинга',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => null
                        ],
                        [
                            'title' => 'Как связаны маркетинг и продажи',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => null
                        ],
                        [
                            'title' => 'Цели, задачи интернет-маркетинга в компании',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => null
                        ],
                        [
                            'title' => 'Инструменты интернет-маркетинга',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => null
                        ],
                    ]
                ],
                [
                    'title' => 'Целевая аудитория',
                    'lessons' => [
                        [
                            'title' => 'Зачем искать свою целевую аудиторию',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => null
                        ],
                        [
                            'title' => 'Выявление потребностей аудитории',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => null
                        ],
                        [
                            'title' => 'Цели, задачи интернет-маркетинга в компании',
                            'level' => null,
                            'duration_minute' => 20,
                            'description' => null
                        ],
                        [
                            'title' => 'Зачем сегментировать свою аудиторию',
                            'level' => null,
                            'duration_minute' => 50,
                            'description' => null
                        ],
                    ]
                ],
                [
                    'title' => 'Анализ конкурентов'
                ],
                [
                    'title' => 'Формирование ценного предложения или УТП'
                ],
                [
                    'title' => 'Подготовка площадки для продвижения в Интернете'
                ],
            ],
        ];

        $courses = Course::whereIn('id', array_keys($courseSections))->get();
        $path = public_path('/videos/preview.mp4');
        foreach ($courses as $course) {
            foreach ($courseSections[$course->id] as $sectionArr) {
                $lessons = isset($sectionArr['lessons']) ? $sectionArr['lessons'] : [];
                unset($sectionArr['lessons']);
                $section = $course->sections()->create($sectionArr);
                foreach ($lessons as $lessonArr) {
                    $timeLines = [];
                    if (isset($lessonArr['lesson_time_lines'])) {
                        $timeLines = $lessonArr['lesson_time_lines'];
                        unset($lessonArr['lesson_time_lines']);
                    }

                    $lesson = $section->lessons()->create($lessonArr);
                    $lesson->addMedia($path)
                        ->preservingOriginal()
                        ->toMediaCollection('video', 'public');
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

        $this->call(LessonSeeder::class);

    }
}
