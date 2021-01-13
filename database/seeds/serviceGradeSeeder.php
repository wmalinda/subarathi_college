<?php

use Illuminate\Database\Seeder;

class serviceGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('service_grades')->delete();

        DB::table('service_grades')->insert([
            [
                'id' => 1,
                'code' => 'SLPS_1',
                'name' => 'SLPS-1',
                'description' => 'SLPS-1',
                'status' => 1
            ],
            [
                'id' => 2,
                'code' => 'SLPS_2',
                'name' => 'SLPS-2',
                'description' => 'SLPS-2',
                'status' => 1
            ],
            [
                'id' => 3,
                'code' => 'SLPS_3',
                'name' => 'SLPS-3',
                'description' => 'SLPS-3',
                'status' => '1'
            ],
            [
                'id' => 4,
                'code' => 'SLTS_3_2',
                'name' => 'SLTS-(3-ii)',
                'description' => 'SLTS-(3-ii)',
                'status' => 1
            ],
            [
                'id' => 5,
                'code' => 'SLTS_3_1',
                'name' => 'SLTS-(3-i)',
                'description' => 'SLTS-(3-i)',
                'status' => 1
            ],
            [
                'id' => 6,
                'code' => 'SLTS_2_2',
                'name' => 'SLTS-(2-ii)',
                'description' => 'SLTS-(2-ii)',
                'status' => '1'
            ],
            [
                'id' => 7,
                'code' => 'SLTS_2_1',
                'name' => 'SLTS-(2-i)',
                'description' => 'SLTS-(2-i)',
                'status' => 1
            ],
            [
                'id' => 8,
                'code' => 'SLTS_1',
                'name' => 'SLTS-1',
                'description' => 'SLTS-1',
                'status' => 1
            ],
            [
                'id' => 9,
                'code' => 'OTHER',
                'name' => 'Other',
                'description' => 'Other',
                'status' => 1
            ]
        ]);
    }
}
