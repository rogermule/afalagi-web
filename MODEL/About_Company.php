<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/19/2015
 * Time: 7:36 PM
 */

class About_Company {

	private $Company_ID;
	private $Branch;
	private $Branch_Amharic;
	private $Working_Hours;
	private $Working_Hours_Amharic;


	function __construct($company_id,$branch,$branch_amharic,$working_hours,$working_hours_amharic){

		$this->Company_ID = $company_id;
		$this->Branch = $branch;
		$this->Branch_Amharic = $branch_amharic;
		$this->Working_Hours = $working_hours;
		$this->Working_Hours_Amharic = $working_hours_amharic;


	}

	/**
	 * @return mixed
	 */
	public function getBranch()
	{
		return $this->Branch;
	}

	/**
	 * @param mixed $Branch
	 */
	public function setBranch($Branch)
	{
		$this->Branch = $Branch;
	}

	/**
	 * @return mixed
	 */
	public function getBranchAmharic()
	{
		return $this->Branch_Amharic;
	}

	/**
	 * @param mixed $Branch_Amharic
	 */
	public function setBranchAmharic($Branch_Amharic)
	{
		$this->Branch_Amharic = $Branch_Amharic;
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
	public function getWorkingHours()
	{
		return $this->Working_Hours;
	}

	/**
	 * @param mixed $Working_Hours
	 */
	public function setWorkingHours($Working_Hours)
	{
		$this->Working_Hours = $Working_Hours;
	}

	/**
	 * @return mixed
	 */
	public function getWorkingHoursAmharic()
	{
		return $this->Working_Hours_Amharic;
	}

	/**
	 * @param mixed $Working_Hours_Amharic
	 */
	public function setWorkingHoursAmharic($Working_Hours_Amharic)
	{
		$this->Working_Hours_Amharic = $Working_Hours_Amharic;
	}


} 