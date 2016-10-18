<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // id = 1
      DB::table('roles')->insert([
        'name' => 'Enseingnant',
      ]);

      // id = 2
      DB::table('roles')->insert([
        'name' => 'Admin',
      ]);

      // id = 3
      DB::table('roles')->insert([
        'name' => 'Proviseur',
      ]);

      // id = 4
      DB::table('roles')->insert([
        'name' => 'Super Admin',
      ]);
    }
}
