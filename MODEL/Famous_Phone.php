<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/23/2015
 * Time: 9:40 PM
 */

class Famous_Phone {

	private $Phone;
	private $Description;
	private $Description_Amharic;

	function __construct($phone,$description,$description_amharic){
		$this->Phone = $phone;
		$this->Description = $description;
		$this->Description_Amharic = $description_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->Description;
	}

	/**
	 * @param mixed $Description
	 */
	public function setDescription($Description)
	{
		$this->Description = $Description;
	}

	/**
	 * @return mixed
	 */
	public function getPhone()
	{
		return $this->Phone;
	}

	/**
	 * @param mixed $Phone
	 */
	public function setPhone($Phone)
	{
		$this->Phone = $Phone;
	}

	/**
	 * @return mixed
	 */
	public function getDescriptionAmharic()
	{
		return $this->Description_Amharic;
	}

	/**
	 * @param mixed $Description_Amharic
	 */
	public function setDescriptionAmharic($Description_Amharic)
	{
		$this->Description_Amharic = $Description_Amharic;
	}




} 