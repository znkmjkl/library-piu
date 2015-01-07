<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function($table)
		{
			$table->increments('id');
			$table->string('usr_name', 30);
			$table->string('usr_surname', 30);
			$table->integer('usr_adr_id')->references('adr_id')->on('address')
      									 ->onDelete('cascade')->nullable();
			$table->string('usr_phone', 12)->nullable();
			$table->string('usr_number', 12)->nullable();
			$table->string('usr_pesel', 11)->nullable();
			$table->boolean('usr_active')->nullable();
			$table->boolean('usr_verified')->nullable();
			$table->string('email', 256)->unique();
			$table->string('password', 64);
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('user');
	}

}
