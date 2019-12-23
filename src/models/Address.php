<?php

namespace Scriptburn\CountryDb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Scriptburn\CharityVoting\Models\BaseModel;
use Scriptburn\ElequentUuid\Traits\UuidModel;
use Wildside\Userstamps\Userstamps;

class Address extends BaseModel
{
	use Userstamps, SoftDeletes, UuidModel;
	/**
	 * @var array
	 */
	protected $fillable = ['state_id', 'country_id', 'city_id', 'latitude', 'longitude', 'landmark', 'address', 'zip'];

	public function getRouteKeyName()
	{
		return 'uuid';
	}
	public function resolveRouteBinding($value)
	{
		return $this->uuid($value,false)->with(['country:id,name', 'state:id,name', 'city:id,name'])->first() ?? abort(404);
	}
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
	public function addressable()
	{
		return $this->morphTo();
	}
}
