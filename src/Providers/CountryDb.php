<?php

namespace Scriptburn\CountryDb\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CountryDb extends ServiceProvider
{
	protected $version = "1.0.0";
	protected $namespace = '\Scriptburn\CountryDb\Http\Controllers';

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
		$this->mapWebRoutes();
	}

	protected function mapWebRoutes()
	{
		if (file_exists(__DIR__.('/../routes/web.php')))
		{
			Route::middleware('web')
				->namespace($this->namespace)
				->group(__DIR__.('/../routes/web.php'));
		}
		if (file_exists(__DIR__.('/../routes/api.php')))
		{
			Route::prefix('api')
				->middleware('api')
				->namespace($this->namespace)
				->group(__DIR__.('/../routes/api.php'));
		}
	}
}
