<?php
//use Illuminate\Http\Request;
//use Scriptburn\CharityVoting\Acl;

Route::group(['middleware' => 'auth:api'], function ()
{
	Route::apiResource('address', 'AddressController');

	Route::prefix('address/search')->group(function ()
	{
		Route::get('countries', 'AddressController@countries');
		Route::get('states', 'AddressController@states');
		Route::get('cities', 'AddressController@cities');
		Route::get('latlong', 'AddressController@latlong');

	});

});
