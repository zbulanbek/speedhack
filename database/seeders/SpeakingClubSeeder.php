<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpeakingClub;

class SpeakingClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = [
            [
                'date' => '2021-02-15 00:00:00',
                'time' => '10:54:26',
                'teacher_id' => 2,
                'title' => 'Happy New Year',
                'subtitle' => 'Elementary',
                'text' => "The year is almost over. Let's talk about this past year and what happened in your life and in the world. When he was small he liked to take everything to pieces. My grandmother told me a story that once.",
                'places' => '6',
                'period' => '50'
            ],
            [
                'date' => '2021-02-25 00:00:00',
                'time' => '15:54:26',
                'teacher_id' => 2,
                'title' => 'Happy New Year 2',
                'subtitle' => 'Elementary 2',
                'text' => "The year is almost over. Let's talk about this past year and what happened in your life and in the world. When he was small he liked to take everything to pieces. My grandmother told me a story that once.",
                'places' => '10',
                'period' => '30'
            ],
            [
                'date' => '2021-02-18 00:00:00',
                'time' => '15:54:26',
                'teacher_id' => 2,
                'title' => 'Happy New Year 2',
                'subtitle' => 'Elementary 2',
                'text' => "The year is almost over. Let's talk about this past year and what happened in your life and in the world. When he was small he liked to take everything to pieces. My grandmother told me a story that once.",
                'places' => '10',
                'period' => '40'
            ],
        ];

        SpeakingClub::insert($clubs);
    }
}
