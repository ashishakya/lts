<?php

use App\Loan;
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
//        factory(Client::class, 10)->create()->each(
//            function (Client $client) {
//            $client->loans()->save(factory(Loan::class,20)->make());
//            }
//        );
        factory(Client::class, 10);
    }
}
