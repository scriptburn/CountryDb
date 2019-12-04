<?php

namespace Scriptburn\CountryDb\Providers;

use Illuminate\Support\ServiceProvider;

class CountryDb extends ServiceProvider
{
	protected $version = "1.0.0";

	public function boot()
	{
		\Schema::defaultStringLength(191);
		$this->map();
		if (file_exists(__DIR__.'/../database/migrations'))
		{
			$this->loadMigrationsFrom(__DIR__.'/../database/migrations');
		}
		//$this->app->register(SeedServiceProvider::class);
	}

	public function register()
	{
	}

	public function map()
	{
	}
}
