<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('loan_id');
            $table->integer('type_id');
            $table->float('amount',8,2);
            $table->dateTime('last_date');
            $table->decimal('interest_amount',8,2);
            $table->float('pbp');
            $table->float('pap');
            $table->tinyInteger('interest_paid')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
