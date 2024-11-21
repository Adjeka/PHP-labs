<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firms')->insert(
            [
                'name' => 'ОАО Этажи',
                'address' => 'Тюмень, ул.Ленина, 35'
            ]
        );
        DB::table('firms')->insert(
            [
                'name' => 'ИП Зуевский',
                'address' => 'Тюмень, ул.Пирогова, 34-61'
            ]
        );
        DB::table('firms')->insert(
            [
                'name' => 'ООО Престиж',
                'address' => 'Тюмень, ул.Профсоюзная, 8'
            ]
        );
    }
}
