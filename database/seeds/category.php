<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
        	'cat_name' => 'Tin nóng',
        	'cat_slug' => 'tin-nong'
        	]);
        DB::table('category')->insert([
        	'cat_name' => 'Công nghệ',
        	'cat_slug' => 'cong-nghe'
        	]);
    }
}
