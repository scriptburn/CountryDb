<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function (Blueprint $table)
		{
			if (!@Schema::hasTable('countries'))
			{
				$table->bigIncrements('id');
				$table->string('name', 100);
				$table->char('iso3', 3)->nullable();
				$table->char('iso2', 2)->nullable();
				$table->string('phonecode')->nullable();
				$table->string('capital')->nullable();
				$table->string('currency')->nullable();
				$table->timestamps();
				$table->boolean('flag')->default(1);
				$table->string('wikiDataId')->nullable()->comment('Rapid API GeoDB Cities');
			}
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
	}
}
