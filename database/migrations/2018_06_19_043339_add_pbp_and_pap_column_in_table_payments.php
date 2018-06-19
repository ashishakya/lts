<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPbpAndPapColumnInTablePayments extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('payments', function (Blueprint $table) {
			//
			$table->float('pbp')->nullable();
			$table->float('pap')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('payments', function (Blueprint $table) {
			//
			$table->dropColumn('pbp');
			$table->dropColumn('pap');

		});
	}
}
