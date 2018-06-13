<?php

use Illuminate\Database\Seeder;
use App\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(TypeTableSeeder::class);
          	Type::insert([
			'name'=>str_random(10),
		     	'rate'=>rand(0,1)
		     ]);    	
    }
}
