<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 10:19 PM
 */

class Company_Address {

	private $Company_ID;
	private $Address_ID;

	function __construct($company_id,$address_id){
		$this->Company_ID = $company_id;
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
	public function getCompanyID()
	{
		return $this->Company_ID;
	}

	/**
	 * @param mixed $Company_ID
	 */
	public function setCompanyID($Company_ID)
	{
		$this->Company_ID = $Company_ID;
	}


} 