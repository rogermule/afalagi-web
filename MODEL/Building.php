<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/16/2015
 * Time: 4:27 AM
 */

class Building {

	private $Name;
	private $Name_Amharic;
	private $Building_Description;
	private $Building_Description_Amharic;
	private $Parking_Area;

	function __construct($name,$name_amharic,$building_description,$building_description_amharic,$parking_area){
		$this->Name = $name;
		$this->Name_Amharic = $name_amharic;
		$this->Building_Description = $building_description;
		$this->Building_Description_Amharic = $building_description_amharic;
		$this->Parking_Area = $parking_area;
	}

	/**
	 * @return mixed
	 */
	public function getBuildingDescription()
	{
		return $this->Building_Description;
	}

	/**
	 * @param mixed $Building_Description
	 */
	public function setBuildingDescription($Building_Description)
	{
		$this->Building_Description = $Building_Description;
	}

	/**
	 * @return mixed
	 */
	public function getBuildingDescriptionAmharic()
	{
		return $this->Building_Description_Amharic;
	}

	/**
	 * @param mixed $Building_Description_Amharic
	 */
	public function setBuildingDescriptionAmharic($Building_Description_Amharic)
	{
		$this->Building_Description_Amharic = $Building_Description_Amharic;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->Name;
	}

	/**
	 * @param mixed $Name
	 */
	public function setName($Name)
	{
		$this->Name = $Name;
	}

	/**
	 * @return mixed
	 */
	public function getNameAmharic()
	{
		return $this->Name_Amharic;
	}

	/**
	 * @param mixed $Name_Amharic
	 */
	public function setNameAmharic($Name_Amharic)
	{
		$this->Name_Amharic = $Name_Amharic;
	}

	/**
	 * @return mixed
	 */
	public function getParkingArea()
	{
		return $this->Parking_Area;
	}

	/**
	 * @param mixed $Parking_Area
	 */
	public function setParkingArea($Parking_Area)
	{
		$this->Parking_Area = $Parking_Area;
	}



} 