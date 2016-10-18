<?php

use Illuminate\Database\Seeder;
use App\User;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $user = App\User::create([
          'userFirstName' => 'Nadje',
          'userLastName' => 'Freddy',
          'userContact' => '123',
          'email' => 'Freddy.Nadje@lmjf.com',
          'password' => bcrypt('lmjf'),
      ]);

      // $user->roles()->attach(1);
      // $user->roles()-attach(4);
    }
}
