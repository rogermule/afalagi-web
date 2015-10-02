<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/19/2015
 * Time: 7:32 PM
 */

class Payment_Status {

	private $Company_ID;

	private $Expiration_Date;

	function __construct($company_id,$expiration_date){
		$this->Company_ID = $company_id;

		$this->Expiration_Date = $expiration_date;
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

	/**
	 * @return mixed
	 */
	public function getExpirationDate()
	{
		return $this->Expiration_Date;
	}

	/**
	 * @param mixed $Expiration_Date
	 */
	public function setExpirationDate($Expiration_Date)
	{
		$this->Expiration_Date = $Expiration_Date;
	}


} 