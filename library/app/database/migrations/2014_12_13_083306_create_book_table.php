<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book', function($table)
		{
			$table->increments('bok_id');
			$table->string('bok_isbn', 13);
			$table->string('bok_title', 100);
			$table->integer('bok_lng_id')->references('lng_id')->on('language')
      									 ->onDelete('cascade');
			$table->integer('bok_knd_id')->references('knd_id')->on('kind')
      									 ->onDelete('cascade');
			$table->date('bok_edition_date');
			$table->integer('bok_edition_number');
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
		Schema::drop('book');
	}

}
