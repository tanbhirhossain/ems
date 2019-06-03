<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'it.gmsbagroup@gmail.com',
          'phone' => '01758578360',
          'ban_id' => '578360',
          'role' => 'superAdmin',
          'password' => bcrypt('grk@server@2019'),
      ]);
    }
}
