<?php

use Illuminate\Database\Seeder;

class CourseChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $courses = [
        '2' => 'ANGLAIS', '3'=> 'HISTOIRE-GÉOGRAPHIE',
        '4' => 'ALLEMAND', '5' => 'ESPAGNOL', '6' => 'PHILOSOPHIE',
        '7' => 'MATHÉMATIQUES', '8' => 'PHYSIQUE - CHIMIE',
        '9' => 'SCIENCES DE LA VIE ET DE LA TERRE',
        '10' => 'EDUCATION PHYSIQUE ET SPORTIVE',
        '11' => 'Musique', '12' => 'Conduite', '13' => 'Education des Droits de l\'Homme'
      ];

      // Discipline du premier cycle

        // ====== CourseChild

          foreach ($courses as $key => $value) {
            DB::table('CourseChild')->insert([
              'courseID' => $key,
              'labelCourse' => $value,
            ]);
        }
      }
}
