<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 2:55 AM
 */

class Address_Place {

	private $Address_ID;
	private $Place_ID;

	function __construct($address_id,$place_id){
		$this->Address_ID = $address_id;
		$this->Place_ID = $place_id;
	}

	/**
	 * @return mixed
	 */
	public function getAddressID()
	{
		return $this->Address_ID;
	}

	/**
	 * @param mixed $Address_ID
	 */
	public function setAddressID($Address_ID)
	{
		$this->Address_ID = $Address_ID;
	}

	/**
	 * @return mixed
	 */
	public function getPlaceID()
	{
		return $this->Place_ID;
	}

	/**
	 * @param mixed $Place_ID
	 */
	public function setPlaceID($Place_ID)
	{
		$this->Place_ID = $Place_ID;
	}


} 