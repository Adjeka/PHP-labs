<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacancies')->insert(
            [
                'firm_id' => 1,
                'staff_id' => 1
            ]
        );
        DB::table('vacancies')->insert(
            [
                'firm_id' => 1,
                'staff_id' => 2
            ]
        );
        DB::table('vacancies')->insert(
            [
                'firm_id' => 3,
                'staff_id' => 2
            ]
        );
    }
}
