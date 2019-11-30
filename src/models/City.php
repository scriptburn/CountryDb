<?php

namespace Scriptburn\CountryDb\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = ['name','state_id','state_code', 'country_id','country_code' ,  'latitude', 'longitude','flag','wikiDataId' ];

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

	 
}
 