<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $certificates = [
            [
                'title' => 'Вы получите сертификат',
                'image' => '/images/bg/certificate.png',
                'body' => 'После окончания курса вы получите Сертификат. Данный сертификат будет подтверждением тому, что вы успешно прошли 3.5-месячную обучающую программу по курсу “General English” в онлайн-школе “SpeedHack”.',
                'course_id' => '1',
            ],
            [
                'title' => 'Вы получите сертификат',
                'image' => '/images/bg/certificate.png',
                'body' => 'После окончания курса вы получите Сертификат. Данный сертификат будет подтверждением тому, что вы успешно прошли 3.5-месячную обучающую программу по курсу “General English” в онлайн-школе “SpeedHack”.',
                'course_id' => '2',
            ],
            // [
            //     'title' => 'Вы получите сертификат',
            //     'image' => '/images/bg/certificate.png',
            //     'body' => 'После окончания курса вы получите Сертификат. Данный сертификат будет подтверждением тому, что вы успешно прошли 3.5-месячную обучающую программу по курсу “General English” в онлайн-школе “SpeedHack”.',
            //     'course_id' => '3',
            // ],
            // [
            //     'title' => 'Вы получите сертификат',
            //     'image' => '/images/bg/certificate.png',
            //     'body' => 'После окончания курса вы получите Сертификат. Данный сертификат будет подтверждением тому, что вы успешно прошли 3.5-месячную обучающую программу по курсу “General English” в онлайн-школе “SpeedHack”.',
            //     'course_id' => '4',
            // ],

        ];
        Certificate::insert($certificates);
    }
}
