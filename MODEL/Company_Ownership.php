<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 7:02 PM
 */

class Company_Ownership {

	private $Company_ID;
	private $Ownership_ID;

	function __construct($company_id,$ownership_id){
		$this->Company_ID = $company_id;
		$this->Ownership_ID = $ownership_id;
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
	public function getOwnershipID()
	{
		return $this->Ownership_ID;
	}

	/**
	 * @param mixed $Ownership_ID
	 */
	public function setOwnershipID($Ownership_ID)
	{
		$this->Ownership_ID = $Ownership_ID;
	}




} 