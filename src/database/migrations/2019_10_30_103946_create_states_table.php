<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('states', function (Blueprint $table)
		{
			if (!@Schema::hasTable('states'))
			{
				$table->bigIncrements('id');
				$table->string('name');
				$table->unsignedBigInteger('country_id')->index('country_region');
				$table->char('country_code', 2);
				$table->string('fips_code')->nullable();
				$table->string('iso2')->nullable();
				$table->timestamps();
				$table->boolean('flag')->default(1);
				$table->string('wikiDataId')->nullable()->comment('Rapid API GeoDB Cities');

				$table->foreign('country_id', 'country_region_final')->references('id')->on('countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		Schema::drop('states');
	}
}
