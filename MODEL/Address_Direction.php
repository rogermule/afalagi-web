<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 3:09 AM
 */

class Address_Direction {


	private $Address_ID;
	private $Direction_ID;

	function __construct($address_id,$direction_id){

		$this->Address_ID = $address_id;
		$this->Direction_ID = $direction_id;

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
	public function getDirectionID()
	{
		return $this->Direction_ID;
	}

	/**
	 * @param mixed $Direction_ID
	 */
	public function setDirectionID($Direction_ID)
	{
		$this->Direction_ID = $Direction_ID;
	}



} 