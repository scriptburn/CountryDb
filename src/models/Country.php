<?php

namespace Scriptburn\CountryDb\Models;

use Illuminate\Database\Eloquent\Model;
use Scriptburn\CharityVoting\Models\BaseModel;

class Country extends BaseModel
{
	/**
	 * @var array
	 */
	protected $fillable = ['name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency', 'flag', 'wikiDataId'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function states()
	{
		return $this->hasMany(State::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
