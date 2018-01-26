<?php

use Illuminate\Database\Seeder;

class demo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('demo')->insert([
        	'demo_user'=>'admin',
        	'demo_pass' => '12345'
        	]);
    }
}
