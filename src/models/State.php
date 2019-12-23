<?php
namespace Scriptburn\CountryDb\Models;

use Scriptburn\CharityVoting\Models\BaseModel;

class State extends BaseModel
{
	/**
	 * @var array
	 */
	protected $fillable = ['name', 'country_id', 'country_code', 'iso2', 'flag', 'wikiDataId'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
