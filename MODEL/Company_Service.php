<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/19/2015
 * Time: 9:17 PM
 */

class Company_Service {


	private $Company_ID;
	private $Company_Service;
	private $Company_Service_Amharic;


	function __construct($company_id,$company_service,$company_service_amharic){

		$this->Company_ID = $company_id;
		$this->Company_Service = $company_service;
		$this->Company_Service_Amharic = $company_service_amharic;

	}

	/**
	 * @return mixed
	 */
	public function getCompanyID()
	{
		return $this->Company_ID;
	}

	/**
	 * @param mixed $Company_ID
	 */
	public function setCompanyID($Company_ID)
	{
		$this->Company_ID = $Company_ID;
	}

	/**
	 * @return mixed
	 */
	public function getCompanyService()
	{
		return $this->Company_Service;
	}

	/**
	 * @param mixed $Company_Service
	 */
	public function setCompanyService($Company_Service)
	{
		$this->Company_Service = $Company_Service;
	}

	/**
	 * @return mixed
	 */
	public function getCompanyServiceAmharic()
	{
		return $this->Company_Service_Amharic;
	}

	/**
	 * @param mixed $Company_Service_Amharic
	 */
	public function setCompanyServiceAmharic($Company_Service_Amharic)
	{
		$this->Company_Service_Amharic = $Company_Service_Amharic;
	}



} 