<?php

use Illuminate\Database\Seeder;

class user2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users2')->insert([
        	'user_name'=>'admin',
        	'user_pass' => md5(123456),
        	'user_level' => 1
        	]);
    }
}
