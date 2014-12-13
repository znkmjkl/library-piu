<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rental', function($table)
		{
			$table->increments('rtl_id');
			$table->integer('rtl_bok_id')->references('bok_id')->on('book')
      									 ->onDelete('cascade');
			$table->integer('rtl_usr_id')->references('usr_id')->on('user')
      									 ->onDelete('cascade');
			$table->date('rtl_start_date');
			$table->date('rtl_end_date');
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
		Schema::drop('rental');
	}

}
