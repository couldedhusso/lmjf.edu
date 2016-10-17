<?php

use Illuminate\Database\Seeder;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('anneeScolaire')->insert([
        'academicYear' => '2016-2017',
      ]);
    }
}
