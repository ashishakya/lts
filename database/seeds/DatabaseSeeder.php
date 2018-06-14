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
        // $this->call(TypeTableSeeder::class);
        // $this->call(ClientTableSeeder::class);
         
        $this->call(PaymentTableSeeder::class);  	  	
    }
}
