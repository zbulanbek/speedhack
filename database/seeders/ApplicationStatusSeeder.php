<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicationStatus;
use App\Models\{User, Role, MethodistStatus};
use Illuminate\Support\Facades\Hash;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $applicationStatuses = [
            [
                'name' => 'Новая заявка',
            ],
            [
                'name' => 'Ожидается',
            ],
            [
                'name' => 'Успешно',
            ],

        ];

        ApplicationStatus::insert($applicationStatuses);

        $methodistStatuses = [
            [
                'name' => 'Успешно',
            ],
            [
                'name' => 'Отказано',
            ],
            [
                'name' => 'Не берет трубку',
            ],

        ];

        MethodistStatus::insert($methodistStatuses);
    }
}
