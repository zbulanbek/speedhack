<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mode;

class ModeSeeder extends Seeder
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
                'user_id' => 3,
                'monday' => json_encode([
            		[
            			'start' => '09:20',
            			'end' => '13:00'
            		],
            		[ 
            			'start' => '15:00',
            			'end' => '18:00'
            		],
                ]),
                'tuesday' => json_encode([
            		[
            			'start' => '10:00',
            			'end' => '15:00'
            		],
            	]),
            	'wednesday' => json_encode([
            		[ 
            			'start' => '13:00',
            			'end' => '16:00'
            		],
            	]),
            	'thursday' => json_encode([
            		[
            			'start' => '09:00',
            			'end' => '18:00'
            		],
            	]),
            	'friday' => json_encode([
            		[ 
            			'start' => '11:00',
            			'end' => '13:00'
            		],
            	]),
				'saturday' => json_encode([
            		[ 
            			'start' => '12:00',
            			'end' => '17:00'
            		],
            	]),
            	'sunday' => null
            ],
            
            
        ];

        Mode::insert($items);
    }
}
