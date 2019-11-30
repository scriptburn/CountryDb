<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function (Blueprint $table)
		{
			if (!@Schema::hasTable('cities'))
			{
				$table->bigIncrements('id');
				$table->string('name');
				$table->unsignedBigInteger('state_id')->index('cities_test_ibfk_1');
				$table->string('state_code');
				$table->unsignedBigInteger('country_id')->index('cities_test_ibfk_2');
				$table->char('country_code', 2);
				$table->decimal('latitude', 10, 8);
				$table->decimal('longitude', 11, 8);
				$table->dateTime('created_at')->default('2013-12-31 19:31:01');
				$table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP'));
				$table->boolean('flag')->default(1);
				$table->string('wikiDataId')->nullable()->comment('Rapid API GeoDB Cities');

				$table->foreign('state_id', 'cities_ibfk_1')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
				$table->foreign('country_id', 'cities_ibfk_2')->references('id')->on('countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		Schema::drop('cities');
	}
}
