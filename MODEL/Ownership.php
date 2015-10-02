<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/21/2015
 * Time: 10:09 PM
 */

class Ownership {

	private $Name;
	private $Name_Amharic;

	function __construct($name,$name_amharic){
		$this->Name = $name;
		$this->Name_Amharic = $name_amharic;
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


} 