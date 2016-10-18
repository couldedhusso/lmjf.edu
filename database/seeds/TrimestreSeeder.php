<?php

use Illuminate\Database\Seeder;

class TrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  `semestreID` INT(11) NOT NULL,
    //  `semestreDescription` VARCHAR(45) NULL DEFAULT NULL,
    //  `academicYear`VARCHAR(45) NOT NULL,
    //  `startDate` VARCHAR(45) NOT NULL,
    //  `endDate` VARCHAR(45) NOT NULL,
    public function run()
    {
      DB::table('Semestre')->insert([
        'semestreDescription' => '1er trimestre',
        'academicYear' => '2016-2017',
        'startDate' => '-',
        'endDate' => '-'
      ]);

      DB::table('Semestre')->insert([
        'semestreDescription' => '2e trimestre',
        'academicYear' => '2016-2017',
        'startDate' => '-',
        'endDate' => '-'
      ]);

      DB::table('Semestre')->insert([
        'semestreDescription' => '3e trimestre',
        'academicYear' => '2016-2017',
        'startDate' => '-',
        'endDate' => '-'
      ]);

    }
}
