<?php

namespace Scriptburn\CountryDb\Models;

use Illuminate\Database\Eloquent\Model;
use Scriptburn\ElequentUuid\Traits\UuidModel;

class Address extends Model
{
	use UuidModel;
	/**
	 * @var array
	 */
	protected $fillable = ['id', 'state_id', 'country_id', 'city_id', 'latitude', 'longitude', 'landmark', 'address', 'zip'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function country()
	{
		return $this->belongsTo(Country::Class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function state()
	{
		return $this->belongsTo(State::class);
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function city()
	{
		return $this->belongsTo(City::class);
	}
}
