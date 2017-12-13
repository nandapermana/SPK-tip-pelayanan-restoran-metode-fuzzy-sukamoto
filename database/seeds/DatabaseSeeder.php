<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
          /*DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user@email.com',
            'password' => bcrypt('1234')

        ]);*/

            DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@email.com',
            'password' => bcrypt('1234')

        ]);

    }
}
