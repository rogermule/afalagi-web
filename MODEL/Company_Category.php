<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 6:59 PM
 */

class Company_Category {

	private $Company_ID;
	private $Category_ID;

	function __construct($company_id,$category_id){
		$this->Company_ID = $company_id;
		$this->Category_ID = $category_id;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryID()
	{
		return $this->Category_ID;
	}

	/**
	 * @param mixed $Category_ID
	 */
	public function setCategoryID($Category_ID)
	{
		$this->Category_ID = $Category_ID;
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