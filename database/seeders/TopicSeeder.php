<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\TopicBlock;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'Hello!',
                'lesson_id' => 7,
            ],
            [
                'title' => 'Introduction',
                'lesson_id' => 7,
            ],
            [
                'title' => 'Text about Peter',
                'lesson_id' => 7,
            ],
            
        ];

        Topic::insert($items);


        $items_2 = [
        	// 1
            [
            	'title'=>'Read and translate this text.',
                'topic_id' => 1,
                'type' => 'read',
                'is_show' => 1,
                'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.',
            ],

            [
            	'title'=>'2 Read and translate this text.',
                'topic_id' => 1,
                'type' => 'one',
                'is_show' => 1,
                'text' => null,
            ],

            [
            	'title'=>'3 Read and translate this text.',
                'topic_id' => 1,
                'type' => 'read',
                'is_show' => 0,
                'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.',
            ],

            [
            	'title'=>'4 Read and translate this text.',
                'topic_id' => 1,
                'type' => 'three',
                'is_show' => 0,
                'text' => null,
            ],
           	
           	//2 
           	[
           		'title'=>'5 Read and translate this text.',
                'topic_id' => 2,
                'type' => 'read',
                'is_show' => 1,
                'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.',
            ],

            [
            	'title'=>'6 Read and translate this text.',
                'topic_id' => 2,
                'type' => 'two',
                'is_show' => 0,
                'text' => null,
            ],

            //3 
            [
            	'title'=>'7 Read and translate this text.',
                'topic_id' => 3,
                'type' => 'read',
                'is_show' => 1,
                'text' => 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.',
            ],

            [
                'title'=>'8 Read and translate this text.',
                'topic_id' => 3,
                'type' => 'four',
                'is_show' => 0,
                'text' => null,
            ],

            [
                'title'=>'9 Read and translate this text.',
                'topic_id' => 3,
                'type' => 'five',
                'is_show' => 0,
                'text' => null,
            ],

        ];

        TopicBlock::insert($items_2);
    }
}
