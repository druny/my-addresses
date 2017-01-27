<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'name' => 'Moscow',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'Kiev',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'October',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'Frunze',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'Ordzhonikidze',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'Chervonozavodskoy',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
           'name' => 'Comintern',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'Lenin',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'Dzerzhinsk',
            'city_id' => 1,
        ]);
        DB::table('areas')->insert([
            'name' => 'October',
            'city_id' => 2,
        ]);
        DB::table('areas')->insert([
            'name' => 'Illichivsk',
            'city_id' => 2,
        ]);
        DB::table('areas')->insert([
            'name' => 'Ordzhonikidze',
            'city_id' => 2,
        ]);
        DB::table('areas')->insert([
            'name' => 'Seaside',
            'city_id' => 2,
        ]);

    }
}
