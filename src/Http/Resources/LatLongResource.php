<?php

namespace Scriptburn\CountryDb\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LatLongResource extends JsonResource
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
			'id' => $this->id,
			'name' => $this->name,
			'country_id' => $this->country_id,
			'country_name' => $this->country->name,
			'state_id' => $this->state_id,
			'state_name' => $this->state->name,
			'name' => $this->name,
			'latitude' => $this->latitude,
			'longitude' => $this->longitude,

		];
	}
}
