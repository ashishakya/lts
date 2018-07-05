<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call([
            UserTableSeed::class,
            TypeTableSeeder::class,
            ClientTableSeeder::class,
            LoanTableSeeder::class,
            PaymentTableSeeder::class,
                    ]);
	}
}
