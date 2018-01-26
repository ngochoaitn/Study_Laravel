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
         //$this->call(user2::class);
         $this->call(category::class);
    	//$this->call(demo::class);
    }
}
