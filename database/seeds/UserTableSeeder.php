<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
            'name'=>'admin',
            'email'=>'email@gmail.com',

            'password'=>bcrypt('admin')


        ]);
    }
}
