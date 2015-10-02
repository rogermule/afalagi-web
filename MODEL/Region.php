<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/10/2015
 * Time: 2:06 AM
 */

class Region {

	private $Region_Name;
	private $Region_Name_Amharic;

	function __construct($region_name,$region_name_amharic){
		$this->Region_Name = $region_name;
		$this->Region_Name_Amharic = $region_name_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getRegionName()
	{
		return $this->Region_Name;
	}

	/**
	 * @param mixed $Region_Name
	 */
	public function setRegionName($Region_Name)
	{
		$this->Region_Name = $Region_Name;
	}

	/**
	 * @return mixed
	 */
	public function getRegionNameAmharic()
	{
		return $this->Region_Name_Amharic;
	}

	/**
	 * @param mixed $Region_Name_Amharic
	 */
	public function setRegionNameAmharic($Region_Name_Amharic)
	{
		$this->Region_Name_Amharic = $Region_Name_Amharic;
	}

} 