<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=10;$i++){
            Client::insert([
            'name'=>str_random(10),
            'address' => str_random(10),
            'contact'=>rand(1111111,9999999)
         ]);  
        }
       
    }
}
