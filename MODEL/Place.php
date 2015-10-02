<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/16/2015
 * Time: 1:40 AM
 */

class Place {



	private $Region_ID;
	private $City_ID;
	private $Sub_City_ID;
	private $Wereda_ID;
	private $Sefer_ID;
	private $Street_ID;


	function __construct($region_id,$city_id,$sub_city_id,$wereda_id,$sefer_id,$street_id){


		$this->Region_ID = $region_id;
		$this->City_ID = $city_id;
		$this->Sub_City_ID = $sub_city_id;
		$this->Wereda_ID = $wereda_id;
		$this->Sefer_ID = $sefer_id;
		$this->Street_ID = $street_id;
	}



	/**
	 * @return mixed
	 */
	public function getCityID()
	{
		return $this->City_ID;
	}

	/**
	 * @param mixed $City_ID
	 */
	public function setCityID($City_ID)
	{
		$this->City_ID = $City_ID;
	}

	/**
	 * @return mixed
	 */
	public function getRegionID()
	{
		return $this->Region_ID;
	}

	/**
	 * @param mixed $Region_ID
	 */
	public function setRegionID($Region_ID)
	{
		$this->Region_ID = $Region_ID;
	}

	/**
	 * @return mixed
	 */
	public function getSeferID()
	{
		return $this->Sefer_ID;
	}

	/**
	 * @param mixed $Sefer_ID
	 */
	public function setSeferID($Sefer_ID)
	{
		$this->Sefer_ID = $Sefer_ID;
	}

	/**
	 * @return mixed
	 */
	public function getSubCityID()
	{
		return $this->Sub_City_ID;
	}

	/**
	 * @param mixed $Sub_City_ID
	 */
	public function setSubCityID($Sub_City_ID)
	{
		$this->Sub_City_ID = $Sub_City_ID;
	}

	/**
	 * @return mixed
	 */
	public function getWeredaID()
	{
		return $this->Wereda_ID;
	}

	/**
	 * @param mixed $Wereda_ID
	 */
	public function setWeredaID($Wereda_ID)
	{
		$this->Wereda_ID = $Wereda_ID;
	}

	/**
	 * @return mixed
	 */
	public function getStreetID()
	{
		return $this->Street_ID;
	}

	/**
	 * @param mixed $Street_ID
	 */
	public function setStreetID($Street_ID)
	{
		$this->Street_ID = $Street_ID;
	}






} 