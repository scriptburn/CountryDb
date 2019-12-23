<?php

namespace Scriptburn\CountryDb\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Scriptburn\AddressVoting\JsonResponse;
use Scriptburn\AddressVoting\Models\User;
use Scriptburn\AddressVoting\Resources\UserResource;
use Scriptburn\CharityVoting\Http\Controllers\BaseController;
use Scriptburn\CountryDb\Models\Address;
use Scriptburn\CountryDb\Models\City;
use Scriptburn\CountryDb\Models\Country;
use Scriptburn\CountryDb\Models\State;
use Scriptburn\CountryDb\Resources\AddressResource;
use Scriptburn\CountryDb\Resources\LatLongResource;
use Validator;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class AddressController extends BaseController
{
	/**
	 * Display a listing of the user resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response|ResourceCollection
	 */
	public function index(Request $request)
	{
		$searchParams = $request->all();
		$orderBy = $request->has('order_by') ? $request->order_by : 'created_at';
		$order = $request->has('order') ? $request->order : 'desc';

		$addressQuery = Address::query()->with(['country:id,name', 'state:id,name', 'city:id,name']);
		$limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
		$keyword = Arr::get($searchParams, 'filter.keyword', '');
		if (!empty($keyword))
		{
			$addressQuery->where('latitude', 'LIKE', '%'.$keyword.'%')
				->orWhere('longitude', 'LIKE', '%'.$keyword.'%')
				->orWhere('zip', 'LIKE', '%'.$keyword.'%');
		}

		return AddressResource::collection($this->applyOrder($request, $addressQuery)->paginate($limit));
	}

	private function setOrder($request, $model)
	{
		return $model->order($request, 'name', 'desc');
	}
	private function search($class, $request)
	{
		$resource = 'Scriptburn\CountryDb\Resources\\'.$class.'Resource';
		$modelClass = 'Scriptburn\CountryDb\Models\\'.$class;

		return $resource::collection(
			$modelClass::filters($request)->order($request, 'name', 'desc')->get()
		);
	}
	public function countries(Request $request)
	{
		return $this->search('Country', $request);
	}
	public function states(Request $request)
	{
		return $this->search('State', $request);
	}
	public function cities(Request $request)
	{
		return $this->search('City', $request);
	}

	public function latlong(Request $request)
	{
		$latitude = Arr::get($request->filter, 'latitude');
		$longitude = Arr::get($request->filter, 'longitude');
		if ($latitude && $longitude)
		{
			\DB::enableQueryLog();
			$cities = City::with(['country:id,name', 'state:id,name'])->order($request, 'name', 'desc');
			$cities->select(
				array(
					'*',
					\DB::raw('SQRT(
    POW(69.1 * (latitude - '.((float) $latitude).'), 2) +
    POW(69.1 * ('.((float) $longitude).' - longitude) * COS(latitude / 57.3), 2)) AS distance'),
				))->havingRaw('distance <?', [1])
			;

			return LatLongResource::collection($cities->get());
		}
		else
		{
			return ['data' => []];
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			array_merge(
				$this->getValidationRules(true, $request->all())
			)
		);

		if ($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()], 422);
		}
		else
		{
			$country = Country::findOrFail($request->country_id);
			$state = State::findOrFail($request->state_id);
			$city = City::findOrFail($request->city_id);

			$address = new Address();
			$address->country()->associate($country);
			$address->state()->associate($state);
			$address->city()->associate($city);
			$address->landmark = $request->landmark;
			$address->latitude = $request->latitude;
			$address->longitude = $request->longitude;
			$address->zip = $request->zip;
			$address->save();

			return new AddressResource($address);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  User $user
	 * @return UserResource|\Illuminate\Http\JsonResponse
	 */
	public function show(Address $address)
	{
		return new AddressResource($address);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param User    $user
	 * @return UserResource|\Illuminate\Http\JsonResponse
	 */
	public function update(Request $request, Address $address)
	{
		//\DB::enableQueryLog();
		if ($address === null)
		{
			return response()->json(['error' => 'Address not found'], 404);
		}
		$validator = Validator::make($request->all(), $this->getValidationRules(false, $request->all()));
		if ($validator->fails())
		{
			return response()->json(['errors' => $validator->errors()], 422);
		}
		else
		{
			if ($request->has('country_id') || $request->has('state_id') | $request->has('city_id'))
			{
				$request->country_id = (int) $request->country_id;
				$request->state_id = (int) $request->state_id;
				$request->city_id = (int) $request->city_id;

				$country = Country::findOrFail($request->country_id);
				$state = State::findOrFail($request->state_id);
				$city = City::findOrFail($request->city_id);

				$address->country()->associate($country);
				$address->state()->associate($state);
				$address->city()->associate($city);
			}
			foreach ($request->only(['latitude', 'longitude', 'zip', 'landmark']) as $key => $value)
			{
				$address->{$key} = $value;
			}

			$address->save();

			return new AddressResource($address);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  User $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Address $address)
	{
		try
		{
			$address->delete();
		}
		catch (\Exception $ex)
		{
			response()->json(['error' => $ex->getMessage()], 403);
		}

		return response()->json(null, 204);
	}

	/**
	 * @param bool $isNew
	 * @return array
	 */
	private function getValidationRules($isNew = true, $data = [])
	{
		return [
			'country_id' => [Rule::exists('countries', 'id')],
			'state_id' => [Rule::exists('states', 'id')->where('country_id', @$data['country_id'])],
			'city_id' => [Rule::exists('cities', 'id')->where('state_id', @$data['state_id'])->where('country_id', @$data['country_id'])],

		];
	}
}
