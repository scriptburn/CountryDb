<?php

namespace Scriptburn\CountryDb\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
 		return [
			'id' => $this->uuid,
			'country_id' => $this->country_id,
			'country_name' => $this->country->name,
			'state_id' => $this->state_id,
			'state_name' => $this->state->name,
			'city_id' => $this->city_id,
			'city_name' => $this->city->name,
			'latitude' => $this->latitude,
			'longitude' => $this->longitude,
			'landmark' => $this->landmark,
			'address' => $this->address,
			'addressable_id' => $this->addressable ? (property_exists($this->addressable, 'uuid') ? $this->addressable->uuid : $this->addressable->id) : null,
			'addressable_type' => $this->addressable_type,

		];
	}
}
