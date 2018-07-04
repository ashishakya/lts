<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(TypeTableSeeder::class);
		// $this->call(ClientTableSeeder::class);
		// $this->call(PaymentTableSeeder::class);

		factory(\App\Client::class, 5)->create();
		//factory(App\Type::class, 4)->create();


//		$this->call([
//            TypeTableSeeder::class,
//            ClientTableSeeder::class,
//            PaymentTableSeeder::class,
//                    ]);
	}
}
