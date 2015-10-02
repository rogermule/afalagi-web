<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/10/2015
 * Time: 7:18 PM
 */

class City {

	private $City;
	private $City_Amharic;

	function __construct($city,$city_amharic){
		$this->City = $city;
		$this->City_Amharic = $city_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getCity()
	{
		return $this->City;
	}

	/**
	 * @param mixed $City
	 */
	public function setCity($City)
	{
		$this->City = $City;
	}

	/**
	 * @return mixed
	 */
	public function getCityAmharic()
	{
		return $this->City_Amharic;
	}

	/**
	 * @param mixed $City_Amharic
	 */
	public function setCityAmharic($City_Amharic)
	{
		$this->City_Amharic = $City_Amharic;
	}


} 