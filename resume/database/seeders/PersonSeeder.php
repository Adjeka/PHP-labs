<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert(
            [
                'FIO' => 'Калугин',
                'staff_id' => 3,
                'phone' => '555555',
                'stage' => 6,
                'image' => 'ava5.jpg',
                'created_at' => null,
                'updated_at' => null
            ]
        );
        DB::table('persons')->insert(
            [
                'FIO' => 'Веселина',
                'staff_id' => 3,
                'phone' => '666665',
                'stage' => 8,
                'image' => 'ava6.jpg',
                'created_at' => null,
                'updated_at' => null
            ]
        );
        DB::table('persons')->insert(
            [
                'FIO' => 'Мистер Х',
                'staff_id' => 2,
                'phone' => '00-00-00',
                'stage' => 3,
                'image' => 'ava1.jpg',
                'created_at' => '2017-12-05 17:40:47',
                'updated_at' => '2017-12-05 17:40:47'
            ]
        );
        DB::table('persons')->insert(
            [
                'FIO' => 'Мистер Х',
                'staff_id' => 2,
                'phone' => '00-00-00',
                'stage' => 3,
                'image' => 'ava1.jpg',
                'created_at' => '2017-12-05 17:41:02',
                'updated_at' => '2017-12-05 17:41:02'
            ]
        );
        DB::table('persons')->insert(
            [
                'FIO' => 'Алейников',
                'staff_id' => 1,
                'phone' => '00-00-00',
                'stage' => 3,
                'image' => 'ava4.jpg',
                'created_at' => '2017-12-10 16:20:15',
                'updated_at' => '2017-12-10 16:20:15'
            ]
        );
    }
}
