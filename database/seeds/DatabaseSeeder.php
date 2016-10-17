<?php

use Illuminate\Database\Seeder;

use schoolManagementPlatform\Domain\Entities\EmpRole;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //appeler une classe seeder
        //$this->call(ClassroomSeeder::class);
        //$this->call(CycleSeeder::class);
        $this->call(CourseSeeder::class);
        //$this->call(AnneeScolaireSeeder::class);
        //$this->call(SemestreSeeder::class);
    }
}
