<?php

use Illuminate\Database\Seeder;

class PersonalDataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('personal_data_types')->delete();

        DB::table('personal_data_types')->insert([
            [
                'id' => 1,
                'type' => 'Height Education Collification',
                'status' => 1
            ],
            [
                'id' => 2,
                'type' => 'Height Proficinal Collification',
                'status' => 1
            ],
            [
                'id' => 3,
                'type' => 'Special Responsibilities',
                'status' => 1
            ],
            [
                'id' => 4,
                'type' => 'Special Skils',
                'status' => 1
            ]
        ]);
    }
}
