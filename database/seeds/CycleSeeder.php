<?php

use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('Cycle')->insert([
        'cycleName' => '1er Cycle',
        'typeCycle' => '-',
        'cycleDescription' => 'Premier cycle des lycées et collèges'
      ]);

      DB::table('Cycle')->insert([
        'cycleName' => '2nd Cycle',
        'typeCycle' => 'scientifique',
        'cycleDescription' => 'Second cycle des lycées et collèges'
      ]);

      DB::table('Cycle')->insert([
        'cycleName' => '2nd Cycle',
        'typeCycle' => 'litteraire',
        'cycleDescription' => 'Second cycle des lycées et collèges'
      ]);

    }
}
