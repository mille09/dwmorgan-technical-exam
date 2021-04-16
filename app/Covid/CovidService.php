<?php

namespace App\Covid;

use App\Covid\Models\CovidModel;

/**
* CovidService
* service layer for Covid cases
*/
class CovidService
{
	/**
	 * storeCovidData
	 * service function for storing covid data in database
	 */
	public function storeCovidData()
	{
		$handle = fopen('covid_19_data.csv', 'r');
		$bHeader = true;
		while ($csvLine = fgetcsv($handle, 1000, ',')) {
			if($bHeader) {
				$bHeader = false;
				continue;
			}
			CovidModel::firstOrNew([
				'sno'              => $csvLine[0],
				'observation_date' => date('Y-m-d', strtotime($csvLine[1])),
				'state'            => $csvLine[2],
				'country'          => $csvLine[3],
				'last_updated'     => date('Y-m-d H:i', strtotime($csvLine[4])),
				'confirmed'        => (int)$csvLine[5],
				'deaths'           => (int)$csvLine[6],
				'recovered'        => (int)$csvLine[7]
			]);
		}

		return CovidModel::all();
	}

	/**
	* getTopConfirmedCases
	* function for retrieving top confirmed covid cases by country
	* @param string $sObservationDate
	* @param int $iMaxResult
	* @return array
	*/
	public function getTopConfirmedCases(string $sObservationDate, int $iMaxResult)
	{
		if($iMaxResult !== 0) {
			return CovidModel::select('country', 'state', 'confirmed', 'deaths', 'recovered')->where('observation_date', $sObservationDate)->limit($iMaxResult)->orderBy('confirmed', 'DESC')->get()->toArray();
		} else {
			return CovidModel::select('country', 'state', 'confirmed', 'deaths', 'recovered')->where('observation_date', $sObservationDate)->orderBy('confirmed', 'DESC')->get()->toArray();
		}
	}
}
