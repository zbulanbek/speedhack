<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            [
                'name' => 'Present Simple',
                'lesson_id' => 1,
                'file'=> '/images/logo.png'
            ],
            [
                'name' => 'Past Simple',
                'lesson_id' => 1,
                'file'=> '/images/logo.png'
            ],
            [
                'name' => 'Past Simple',
                'lesson_id' => 2,
                'file'=> '/images/logo.png'
            ],
            [
                'name' => 'Past Simple',
                'lesson_id' => 2,
                'file'=> '/images/logo.png'
            ],
        ];

        $cat = Material::insert($materials);

        DB::table('student_materials')->insert([
            'student_id' => 1,
            'material_id' => 1,
        ]);
    }
}
