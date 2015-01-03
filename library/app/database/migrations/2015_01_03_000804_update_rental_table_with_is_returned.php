<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRentalTableWithIsReturned extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rental', function($table)
		{
		    $table->boolean('rtl_is_returned')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rental', function($table)
		{
		    $table->dropColumn('rtl_is_returned');
		});
	}

}
