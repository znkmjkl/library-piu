<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('author', function($table)
		{
			$table->increments('atr_id');
			$table->integer('atr_bok_id')->references('book_id')->on('book')
      									 ->onDelete('cascade');
			$table->integer('atr_wtr_id')->references('wtr_id')->on('writer')
      									 ->onDelete('cascade');
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
		Schema::drop('author');
	}

}
