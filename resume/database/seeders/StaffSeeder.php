<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert(
            [
                'name' => 'Программист'
            ]
        );
        DB::table('staff')->insert(
            [
                'name' => 'Менеджер'
            ]
        );
        DB::table('staff')->insert(
            [
                'name' => 'Дизайнер'
            ]
        );
        DB::table('staff')->insert(
            [
                'name' => 'Дворник'
            ]
        );
    }
}
