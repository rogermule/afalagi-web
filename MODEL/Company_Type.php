<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/19/2015
 * Time: 9:24 PM
 */

class Company_Type {

	private $Company_Type;
	private $Company_Type_Amharic;

	function __construct($company_type,$company_type_amharic){
		$this->Company_Type = $company_type;
		$this->Company_Type_Amharic = $company_type_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getCompanyType()
	{
		return $this->Company_Type;
	}

	/**
	 * @param mixed $Company_Type
	 */
	public function setCompanyType($Company_Type)
	{
		$this->Company_Type = $Company_Type;
	}

	/**
	 * @return mixed
	 */
	public function getCompanyTypeAmharic()
	{
		return $this->Company_Type_Amharic;
	}

	/**
	 * @param mixed $Company_Type_Amharic
	 */
	public function setCompanyTypeAmharic($Company_Type_Amharic)
	{
		$this->Company_Type_Amharic = $Company_Type_Amharic;
	}


} 