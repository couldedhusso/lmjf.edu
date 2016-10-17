<?php

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
      $nbrClass = 5;
      for ($i=1; $i <= $nbrClass*2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '6ème'.$i
        ]);
      };

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '5ème'.$i
        ]);
      };

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '4ème'.$i
        ]);
      };

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '3ème'.$i
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '2ndA'.$i,
          'typeClassRoom' => 'litteraire'
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '1èreA'.$i,
          'typeClassRoom' => 'scientifique'
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '1èreC'.$i,
          'typeClassRoom' => 'scientifique'
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => '1èreD'.$i,
          'typeClassRoom' => 'scientifique'
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => 'TleA'.$i,
          'typeClassRoom' => 'litteraire'
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => 'TleD'.$i,
          'typeClassRoom' => 'scientifique'
        ]);
      };

      for ($i=1; $i <= 2; $i++) {
        DB::table('Classroom')->insert([
          'ClassRoomName' => 'TleC'.$i,
          'typeClassRoom' => 'scientifique'
        ]);
      };
  }

}
