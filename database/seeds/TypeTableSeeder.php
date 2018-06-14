<?php

use Illuminate\Database\Seeder;
use App\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	Type::insert([
            'name'=>str_random(10),
                'rate'=>rand(0,1)
             ]);          
    }
 
}
