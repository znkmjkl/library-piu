<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservation', function($table)
		{
			$table->increments('rvn_id');
			$table->integer('rvn_bok_id')->references('bok_id')->on('book')
      									 ->onDelete('cascade');
			$table->integer('rvn_usr_id')->references('usr_id')->on('user')
      									 ->onDelete('cascade');
			$table->date('rvn_date')->nullable();
			$table->boolean('rvn_status');
			$table->boolean('rvn_is_ready');
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
		Schema::drop('reservation');
	}

}
