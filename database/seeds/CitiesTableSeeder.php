<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            [
                'name' => 'Kharkov'
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Mariupol'
            ]
        );
    }
}
