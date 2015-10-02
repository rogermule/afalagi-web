<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 2:10 AM
 */

class Building_Address {

	private $Building_ID;
	private $Address_ID;

	function __construct($building_id,$address_id){

		$this->Building_ID = $building_id;
		$this->Address_ID = $address_id;
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
	public function getBuildingID()
	{
		return $this->Building_ID;
	}

	/**
	 * @param mixed $Building_ID
	 */
	public function setBuildingID($Building_ID)
	{
		$this->Building_ID = $Building_ID;
	}




} 