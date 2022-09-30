<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = \Brackets\AdminAuth\Models\AdminUser::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => null,
            'activated' => true,
            'forbidden' => false,
            'language' => 'ru',
        ]);
        $adminUser->assignRole('Administrator');

        //Admin
        // $adminUser = \Brackets\AdminAuth\Models\AdminUser::create([
        //     'first_name' => 'admin',
        //     'last_name' => 'admin',
        //     'email' => 'speaker@gmail.com',
        //     'password' => bcrypt('password'),
        //     'remember_token' => null,
        //     'activated' => true,
        //     'forbidden' => false,
        //     'language' => 'ru',
        // ]);
        // $adminUser->assignRole('Speaker');

        Role::insert([
            [
                'name' => 'Ученик',
                'guard_name' => 'student'
            ],
            [
                'name' => 'Учитель',
                'guard_name' => 'teacher'
            ],
            [
                'name' => 'Методист',
                'guard_name' => 'metodist'
            ],
        ]);

        User::insert([
            [
                'name' => 'Zhansaya',
                'surname' => 'Bulanbek',
                'patronymic' => 'Talgatkyzy',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-11',
                'role_id' => 2
            ],
            [
                'name' => 'Айсауле',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-11',
                'role_id' => 1
            ],
            [
                'name' => 'Айсауле',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'metodist@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 4
            ],
            [
                'name' => 'Медет',
                'surname' => 'Шаяхметов',
                'patronymic' => 'Шегебаевич',
                'email' => 'spec_user@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-13',
                'role_id' => 2
            ],
            [
                'name' => 'metodist 2',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'metodist_two@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 4
            ],
             [
                'name' => 'metodist 3',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'metodist_three@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 4
            ],
            [
                'name' => 'metodist 4',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'metodist_four@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 4
            ],
            [
                'name' => 'metodist 5',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'metodist_five@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 4
            ],

            [
                'name' => 'teacher 1',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'teacher_one@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 3
            ],
            [
                'name' => 'teacher 2',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'teacher_two@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 3
            ],
            [
                'name' => 'teacher 3',
                'surname' => 'Азаматова',
                'patronymic' => 'Азаматкызы',
                'email' => 'teacher_three@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '7 (711)-111-11-12',
                'role_id' => 3
            ],
        ]);
    }
}
