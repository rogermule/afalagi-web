<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 11/23/2015
 * Time: 5:45 PM
 */

class Specialization {

	private $General_Category;
	private $Name;
	private $Name_Amharic;

	function __construct($General_Category, $Name, $Name_Amharic)
	{
		$this->General_Category = $General_Category;
		$this->Name_Amharic = $Name_Amharic;
		$this->Name = $Name;
	}

	/**
	 * @return mixed
	 */
	public function getGeneralCategory()
	{
		return $this->General_Category;
	}

	/**
	 * @param mixed $General_Category
	 */
	public function setGeneralCategory($General_Category)
	{
		$this->General_Category = $General_Category;
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