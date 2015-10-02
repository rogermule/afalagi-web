<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/10/2015
 * Time: 7:31 PM
 */

class Sub_City {

	private $Sub_City;
	private $Sub_City_Amharic;

	function __construct($sub_city,$sub_city_amharic){

		$this->Sub_City = $sub_city;
		$this->Sub_City_Amharic = $sub_city_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getSubCity()
	{
		return $this->Sub_City;
	}

	/**
	 * @param mixed $Sub_City
	 */
	public function setSubCity($Sub_City)
	{
		$this->Sub_City = $Sub_City;
	}

	/**
	 * @return mixed
	 */
	public function getSubCityAmharic()
	{
		return $this->Sub_City_Amharic;
	}


} 