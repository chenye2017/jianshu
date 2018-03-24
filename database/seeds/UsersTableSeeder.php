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
        //
        $users = factory(\App\User::class)->times(20)->make();
        \App\User::insert($users->toArray());

        $first = \App\User::first();
        $first->name = 'cy';
        $first->email = '1967196626@qq.com';
        $first->password = bcrypt('12345');
        $first->save();
    }
}
