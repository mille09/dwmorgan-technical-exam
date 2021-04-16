<?php

namespace App\Covid\Controllers;

use App\Http\Controllers\Controller;
use App\Covid\CovidService;
use Illuminate\Http\Request;

/**
 * CovidController
 */
class CovidController extends Controller
{
	/**
	 * @var CovidService $oCovidService
	 */
	private $oCovidService;

	/**
	 * CovidController constructor
	 */
	public function __construct()
	{
		$this->oCovidService = new CovidService();
	}

	/**
	 * initializeData
	 * @return array
	 */
	public function initializeData()
	{
		return $this->oCovidService->storeCovidData();
	}

	/**
	 * getTopConfirmedCases
	 * controller function for retrieving top contries with confirmed cases
	 * @param Request
	 * @return array
	 */
    public function getTopConfirmedCases(Request $oRequest)
	{
		return $this->oCovidService->getTopConfirmedCases($oRequest->input('observation_date'), $oRequest->input('max_results'));
	}
}
