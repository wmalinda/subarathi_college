<?php

use Illuminate\Database\Seeder;

class MemberRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('member_roles')->delete();

        DB::table('member_roles')->insert([
            [
                'id' => 1,
                'code' => 'PRINCIPLE',
                'role' => 'Principle',
                'description' => 'Principle',
                'status' => 1
            ],
            [
                'id' => 2,
                'code' => 'WISE_PRINCIPLE',
                'role' => 'Wise principle',
                'description' => 'Wise principle',
                'status' => 1
            ],
            [
                'id' => 3,
                'code' => 'TEACHER',
                'role' => 'Teacher',
                'description' => 'Teacher',
                'status' => '1'
            ],
            [
                'id' => 4,
                'code' => 'STUDENT',
                'role' => 'Student',
                'description' => 'Student',
                'status' => 1
            ],
            [
                'id' => 5,
                'code' => 'STAFF',
                'role' => 'Staff',
                'description' => 'staff',
                'status' => 1
            ]
        ]);
    }
}
