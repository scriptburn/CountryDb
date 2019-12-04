<?php

namespace Scriptburn\CountryDb\Models;

use Illuminate\Database\Eloquent\Model;
use Scriptburn\ElequentUuid\Traits\UuidModel;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;
class Address extends Model
{
	use Userstamps,SoftDeletes,UuidModel;
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
