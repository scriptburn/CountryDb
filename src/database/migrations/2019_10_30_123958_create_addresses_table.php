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
		if (!@Schema::hasTable('addresses'))
		{
			Schema::create('addresses', function (Blueprint $table)
			{
				$table->bigIncrements('id');
				$table->uuid('uuid');

				$table->unsignedBigInteger('addressable_id')->nullable();
				$table->string('addressable_type')->nullable();
				$table->unsignedBigInteger('country_id');
				$table->unsignedBigInteger('state_id');
				$table->unsignedBigInteger('city_id');
				$table->text('landmark')->nullable();
				$table->text('full_address')->nullable();
				$table->decimal('latitude', 10, 8)->nullable();
				$table->decimal('longitude', 11, 8)->nullable();
				$table->string('zip')->nullable();

				$this->extraFields($table);

				$table->foreign('country_id')->references('id')->on('countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
				$table->foreign('state_id')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
				$table->foreign('city_id')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			});
		}
	}
	private function extraFields(&$table)
	{
		$table->unsignedBigInteger('created_by')->nullable();
		$table->unsignedBigInteger('updated_by')->nullable();
		$table->unsignedBigInteger('deleted_by')->nullable();

		$table->timestamps();
		$table->softDeletes();

		$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
		$table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
		$table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
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
