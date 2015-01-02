<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWriterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('writer', function($table)
		{
			$table->increments('wtr_id');
			$table->string('wtr_name', 100)->nullable();;
			$table->string('wtr_surname', 100);
			$table->date('wtr_birth_date')->nullable();
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
		Schema::drop('writer');
	}

}
