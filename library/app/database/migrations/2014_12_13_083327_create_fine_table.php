<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fine', function($table)
		{
			$table->increments('fne_id');
			$table->integer('fne_rtl_id')->references('rtl_id')->on('rental')
      									 ->onDelete('cascade');
			$table->integer('fne_amount');
			$table->boolean('fne_status');
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
		Schema::drop('fine');
	}

}
