<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/19/2015
 * Time: 7:26 PM
 */

class Company {

	private $Company_Name;
	private $Company_Name_Amharic;


	function __construct($company_name,$company_name_amharic ){

		$this->Company_Name = $company_name;
		$this->Company_Name_Amharic = $company_name_amharic;

	}

	/**
	 * @return mixed
	 */
	public function getCompanyName()
	{
		return $this->Company_Name;
	}

	/**
	 * @param mixed $Company_Name
	 */
	public function setCompanyName($Company_Name)
	{
		$this->Company_Name = $Company_Name;
	}

	/**
	 * @return mixed
	 */
	public function getCompanyNameAmharic()
	{
		return $this->Company_Name_Amharic;
	}

	/**
	 * @param mixed $Company_Name_Amharic
	 */
	public function setCompanyNameAmharic($Company_Name_Amharic)
	{
		$this->Company_Name_Amharic = $Company_Name_Amharic;
	}


} 