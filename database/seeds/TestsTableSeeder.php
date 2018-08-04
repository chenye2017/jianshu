<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$testsModel = new \App\Test();
        $testsModel->name = 'hello';
        $testsModel->save();*/
        DB::table('tests')->insert([
            ['name'=>'cy'],
            ['name'=>'cy1']
            ]
        );
    }
}
