<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ApplicationStatusSeeder::class,
            CourseCategorySeeder::class,
            VocabularySeeder::class,
            LessonSeeder::class,
            CourseSeeder::class,
            CertificateSeeder::class,
            NewsSeeder::class,
            FeedbackSeeder::class,
            CourseFactsSeeder::class,
            CourseInfoSeeder::class,
            CourseCasesSeeder::class,
            MaterialSeeder::class,
            TaskSeeder::class,
            HomeworkSeeder::class,
            TabCourseSeeder::class,
            TeacherSliderSeeder::class,
            SettingSeeder::class,
            TimetableSeeder::class,
            SpeakingClubSeeder::class,
            TopicSeeder::class,
            ModeSeeder::class,
            CourseClassSeeder::class,
            TrialLessonSeeder::class,
        ]);

    }
}
