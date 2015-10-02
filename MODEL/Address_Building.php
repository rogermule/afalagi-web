<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/19/2015
 * Time: 9:28 PM
 */

class Address_Building {

	private $Address_ID;
	private $Building_ID;
	private $Floor;

	function __construct($address_id,$building_id,$floor){
		$this->Address_ID = $address_id;
		$this->Building_ID = $building_id;
		$this->Floor = $floor;
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
	public function getFloor()
	{
		return $this->Floor;
	}

	/**
	 * @param mixed $Floor
	 */
	public function setFloor($Floor)
	{
		$this->Floor = $Floor;
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