<?php
namespace Scriptburn\CountryDb\Database\Seeds;

use Illuminate\Database\Seeder;
use Scriptburn\CountryDb\Models\City;
use Scriptburn\CountryDb\Models\Country;
use Scriptburn\CountryDb\Models\State;

class TestLocationsSeeder extends Seeder
{
	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		$this->import();
	}

	private function import()
	{
		$json = '{"232":{"data":{"name":"United Kingdom","iso3":"GBR","iso2":"GB","phonecode":"44","capital":"London","currency":"GBP","flag":1,"wikiDataId":"Q145"},"states":{"2335":{"data":{"name":"Scotland","country_code":"GB","iso2":"SCT","flag":1,"wikiDataId":"Q22"},"cities":[{"name":"Aberchirder","state_code":"SCT","country_code":"GB","latitude":"57.56012000","longitude":"-2.62856000","flag":1,"wikiDataId":"Q1017022"},{"name":"Aberdeen","state_code":"SCT","country_code":"GB","latitude":"57.14369000","longitude":"-2.09814000","flag":1,"wikiDataId":"Q36405"},{"name":"Aberdeen City","state_code":"SCT","country_code":"GB","latitude":"57.16667000","longitude":"-2.16667000","flag":1,"wikiDataId":"Q62274582"},{"name":"Aberdeenshire","state_code":"SCT","country_code":"GB","latitude":"57.16667000","longitude":"-2.66667000","flag":1,"wikiDataId":"Q189912"},{"name":"Aberdour","state_code":"SCT","country_code":"GB","latitude":"56.05417000","longitude":"-3.30058000","flag":1,"wikiDataId":"Q2014221"},{"name":"Aberfeldy","state_code":"SCT","country_code":"GB","latitude":"56.62196000","longitude":"-3.86693000","flag":1,"wikiDataId":"Q319566"},{"name":"Aberlady","state_code":"SCT","country_code":"GB","latitude":"56.00884000","longitude":"-2.85851000","flag":1,"wikiDataId":"Q1010412"},{"name":"Abernethy","state_code":"SCT","country_code":"GB","latitude":"56.33247000","longitude":"-3.31226000","flag":1,"wikiDataId":"Q744726"},{"name":"Aboyne","state_code":"SCT","country_code":"GB","latitude":"57.07546000","longitude":"-2.78023000","flag":1,"wikiDataId":"Q323196"},{"name":"Addiebrownhill","state_code":"SCT","country_code":"GB","latitude":"55.84289000","longitude":"-3.61667000","flag":1,"wikiDataId":"Q352863"}]},"2336":{"data":{"name":"England","country_code":"GB","iso2":"ENG","flag":1,"wikiDataId":"Q21"},"cities":[{"name":"Abbey Wood","state_code":"ENG","country_code":"GB","latitude":"51.48688000","longitude":"0.10747000","flag":1,"wikiDataId":"Q690421"},{"name":"Abbots Bromley","state_code":"ENG","country_code":"GB","latitude":"52.81705000","longitude":"-1.87694000","flag":1,"wikiDataId":"Q2167664"},{"name":"Abbots Langley","state_code":"ENG","country_code":"GB","latitude":"51.70573000","longitude":"-0.41757000","flag":1,"wikiDataId":"Q2167664"},{"name":"Abbotskerswell","state_code":"ENG","country_code":"GB","latitude":"50.50816000","longitude":"-3.61342000","flag":1,"wikiDataId":"Q2684937"},{"name":"Abbotts Ann","state_code":"ENG","country_code":"GB","latitude":"51.19016000","longitude":"-1.53234000","flag":1,"wikiDataId":"Q660124"},{"name":"Aberford","state_code":"ENG","country_code":"GB","latitude":"53.82604000","longitude":"-1.34231000","flag":1,"wikiDataId":"Q2853591"},{"name":"Abingdon","state_code":"ENG","country_code":"GB","latitude":"51.67109000","longitude":"-1.28278000","flag":1,"wikiDataId":"Q321381"},{"name":"Abram","state_code":"ENG","country_code":"GB","latitude":"53.50855000","longitude":"-2.59266000","flag":1,"wikiDataId":"Q4669333"},{"name":"Abridge","state_code":"ENG","country_code":"GB","latitude":"51.64950000","longitude":"0.12033000","flag":1,"wikiDataId":"Q2215683"},{"name":"Accrington","state_code":"ENG","country_code":"GB","latitude":"53.75379000","longitude":"-2.35863000","flag":1,"wikiDataId":"Q1622949"}]},"2338":{"data":{"name":"Wales","country_code":"GB","iso2":"WLS","flag":1,"wikiDataId":"Q25"},"cities":[{"name":"Aberaeron","state_code":"WLS","country_code":"GB","latitude":"52.24247000","longitude":"-4.25871000","flag":1,"wikiDataId":"Q1765460"},{"name":"Abercanaid","state_code":"WLS","country_code":"GB","latitude":"51.72361000","longitude":"-3.36611000","flag":1,"wikiDataId":"Q4666797"},{"name":"Abercarn","state_code":"WLS","country_code":"GB","latitude":"51.64733000","longitude":"-3.13476000","flag":1,"wikiDataId":"Q1868842"},{"name":"Abercynon","state_code":"WLS","country_code":"GB","latitude":"51.64548000","longitude":"-3.32727000","flag":1,"wikiDataId":"Q3404663"},{"name":"Aberdare","state_code":"WLS","country_code":"GB","latitude":"51.71438000","longitude":"-3.44918000","flag":1,"wikiDataId":"Q319369"},{"name":"Aberfan","state_code":"WLS","country_code":"GB","latitude":"51.68892000","longitude":"-3.34178000","flag":1,"wikiDataId":"Q3244565"},{"name":"Abergavenny","state_code":"WLS","country_code":"GB","latitude":"51.82098000","longitude":"-3.01743000","flag":1,"wikiDataId":"Q609161"},{"name":"Abergele","state_code":"WLS","country_code":"GB","latitude":"53.28436000","longitude":"-3.58220000","flag":1,"wikiDataId":"Q2771917"},{"name":"Aberkenfig","state_code":"WLS","country_code":"GB","latitude":"51.54000000","longitude":"-3.59556000","flag":1,"wikiDataId":"Q4667120"},{"name":"Aberporth","state_code":"WLS","country_code":"GB","latitude":"52.13248000","longitude":"-4.54173000","flag":1,"wikiDataId":"Q319672"}]}}},"233":{"data":{"name":"United States","iso3":"USA","iso2":"US","phonecode":"1","capital":"Washington","currency":"USD","flag":1,"wikiDataId":"Q30"},"states":{"1416":{"data":{"name":"California","country_code":"US","iso2":"CA","flag":1,"wikiDataId":"Q99"},"cities":[{"name":"Acalanes Ridge","state_code":"CA","country_code":"US","latitude":"37.90472000","longitude":"-122.07857000","flag":1,"wikiDataId":"Q4671652"},{"name":"Acton","state_code":"CA","country_code":"US","latitude":"34.46999000","longitude":"-118.19674000","flag":1,"wikiDataId":"Q2308667"},{"name":"Adelanto","state_code":"CA","country_code":"US","latitude":"34.58277000","longitude":"-117.40922000","flag":1,"wikiDataId":"Q354110"},{"name":"Agoura","state_code":"CA","country_code":"US","latitude":"34.14306000","longitude":"-118.73787000","flag":1,"wikiDataId":"Q9588470"},{"name":"Agoura Hills","state_code":"CA","country_code":"US","latitude":"34.13639000","longitude":"-118.77453000","flag":1,"wikiDataId":"Q395793"},{"name":"Agua Dulce","state_code":"CA","country_code":"US","latitude":"34.49638000","longitude":"-118.32563000","flag":1,"wikiDataId":"Q2827313"},{"name":"Aguanga","state_code":"CA","country_code":"US","latitude":"33.44281000","longitude":"-116.86502000","flag":1,"wikiDataId":"Q3476194"},{"name":"Ahwahnee","state_code":"CA","country_code":"US","latitude":"37.36550000","longitude":"-119.72627000","flag":1,"wikiDataId":"Q3458725"},{"name":"Alameda","state_code":"CA","country_code":"US","latitude":"37.76521000","longitude":"-122.24164000","flag":1,"wikiDataId":"Q490744"},{"name":"Alameda County","state_code":"CA","country_code":"US","latitude":"37.65055000","longitude":"-121.91789000","flag":1,"wikiDataId":"Q107146"}]},"1436":{"data":{"name":"Florida","country_code":"US","iso2":"FL","flag":1,"wikiDataId":"Q812"},"cities":[{"name":"Aberdeen","state_code":"FL","country_code":"US","latitude":"26.55063000","longitude":"-80.14866000","flag":1,"wikiDataId":"Q4666865"},{"name":"Alachua","state_code":"FL","country_code":"US","latitude":"29.75163000","longitude":"-82.42483000","flag":1,"wikiDataId":"Q985175"},{"name":"Alachua County","state_code":"FL","country_code":"US","latitude":"29.67476000","longitude":"-82.35770000","flag":1,"wikiDataId":"Q488826"},{"name":"Alafaya","state_code":"FL","country_code":"US","latitude":"28.56410000","longitude":"-81.21140000","flag":1,"wikiDataId":"Q4705552"},{"name":"Allapattah","state_code":"FL","country_code":"US","latitude":"25.81454000","longitude":"-80.22394000","flag":1,"wikiDataId":"Q1660549"},{"name":"Altamonte Springs","state_code":"FL","country_code":"US","latitude":"28.66111000","longitude":"-81.36562000","flag":1,"wikiDataId":"Q434355"},{"name":"Alturas","state_code":"FL","country_code":"US","latitude":"27.87169000","longitude":"-81.71508000","flag":1,"wikiDataId":"Q5671195"},{"name":"Alva","state_code":"FL","country_code":"US","latitude":"26.71562000","longitude":"-81.61008000","flag":1,"wikiDataId":"Q448123"},{"name":"Andover","state_code":"FL","country_code":"US","latitude":"25.96843000","longitude":"-80.21283000","flag":1,"wikiDataId":"Q492784"},{"name":"Anna Maria","state_code":"FL","country_code":"US","latitude":"27.53115000","longitude":"-82.73343000","flag":1,"wikiDataId":"Q561969"}]}}}}';
		$json = json_decode($json, true);
		//\DB::table('cities')->delete();
		//\DB::table('states')->delete();
		//\DB::table('countries')->delete();

		foreach ($json as $countryRow)
		{
			$country = Country::whereName($countryRow['data']['name'])->first();
			if (!$country)
			{
				$country = new Country($countryRow['data']);
				$country->save();
			}
			foreach ($countryRow['states'] as $stateRow)
			{
				$state = $country->states()->whereName($stateRow['data']['name'])->first();
				if (!$state)
				{
					$state = new State($stateRow['data']);
					$state->country()->associate($country);
					$state->save();
				}

				foreach ($stateRow['cities'] as $cityRow)
				{
					$city = $state->cities()->whereName($cityRow['name'])->first();
					if (!$city)
					{
						$city = new City($cityRow);
						$city->state()->associate($state);
						$city->country()->associate($country);

						$city->save();
					}
				}
			}
		}
	}
	private function export()
	{
		$arr = [];

		foreach (Country::all() as $country)
		{
			$arr[$country->id]['data'] = $country->only(['name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency', 'flag', 'wikiDataId']);
			foreach ($country->states as $state)
			{
				$arr[$country->id]['states'][$state->id]['data'] = $state->only(['name', 'country_code', 'iso2', 'flag', 'wikiDataId']);
				foreach ($state->cities as $city)
				{
					$arr[$country->id]['states'][$state->id]['cities'][] = $city->only(['name', 'state_code', 'country_code', 'latitude', 'longitude', 'flag', 'wikiDataId']);
				}
			}
		}
		print_r(($arr));
		print_r(json_encode($arr));
		/*
								delete from cities where id not in(select id from( select * from cities where (country_code='US' and state_code in ('CA','FL')) or (country_code='GB' and state_code in ('ENG','NIR','SCT','WLS'))) as a );

						 delete from cities where id in(SELECT  id FROM ( select id,name,ROW_NUMBER() OVER ( ORDER BY name ) row_num from cities where state_code='CA' and country_code='US' ) q WHERE   row_num > 10 )  ;

						delete from cities where id in(SELECT id FROM ( select id,name,ROW_NUMBER() OVER ( ORDER BY name ) row_num from cities where state_code='FL' and country_code='US' ) q WHERE row_num > 10);

						delete from cities where id in(SELECT id FROM ( select id,name,ROW_NUMBER() OVER ( ORDER BY name ) row_num from cities where state_code='ENG' and country_code='GB' ) q WHERE row_num > 10);

						delete from cities where id in(SELECT id FROM ( select id,name,ROW_NUMBER() OVER ( ORDER BY name ) row_num from cities where state_code='NIR' and country_code='GB' ) q WHERE row_num > 10);

						delete from cities where id in(SELECT id FROM ( select id,name,ROW_NUMBER() OVER ( ORDER BY name ) row_num from cities where state_code='SCT' and country_code='GB' ) q WHERE row_num > 10);
						delete from cities where id in(SELECT id FROM ( select id,name,ROW_NUMBER() OVER ( ORDER BY name ) row_num from cities where state_code='WLS' and country_code='GB' ) q WHERE row_num > 10);

						delete from states  where country_code not in('US','GB');

						delete from states where id in(select id from (select * from states where iso2  not   in(  'CA','FL') and country_Code='US'  ) as a);
						delete from states where id in(select id from (select * from states where iso2  not   in( 'ENG','NIR','SCT','WLS' ) and country_Code='GB'  ) as a);

			 			delete from countries where name not  in ('united states','united kingdom');
		*/
	}
}
