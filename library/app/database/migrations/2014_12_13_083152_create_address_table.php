<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function($table)
		{
			$table->increments('adr_id');
			$table->string('adr_city', 100)->nullable();
			$table->string('adr_street', 100)->nullable();
			$table->string('adr_house_number', 10)->nullable();
			$table->string('adr_postal_code', 10)->nullable();
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
		Schema::drop('address');
	}

}
