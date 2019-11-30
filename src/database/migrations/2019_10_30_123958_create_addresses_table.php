<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function (Blueprint $table)
		{
			if (!@Schema::hasTable('addresses'))
			{
				if (!@Schema::hasTable('addresses'))
				{
					$table->bigIncrements('id');
					$table->uuid('uuid');

					$table->unsignedBigInteger('country_id');
					$table->unsignedBigInteger('state_id');
					$table->unsignedBigInteger('city_id');
					$table->text('landmark')->nullable();
					$table->text('full_address')->nullable();
					$table->decimal('latitude', 10, 8)->nullable();
					$table->decimal('longitude', 11, 8)->nullable();
					$table->string('zip')->nullable();

					$table->timestamps();
					$table->foreign('country_id')->references('id')->on('countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
					$table->foreign('state_id')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
					$table->foreign('city_id')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
				}
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
		Schema::dropIfExists('addresses');
	}
}
