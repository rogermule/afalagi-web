<?php


class Contact {

	private $Email;
	private $House_No;
	private $FAX;
	private $POBOX;
	private $Telephone;

	function __construct($email,$house_no,$fax,$pobox,$telephone){

		$this->Email = $email;
		$this->House_No = $house_no;
		$this->FAX = $fax;
		$this->POBOX = $pobox;
		$this->Telephone = $telephone;

	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->Email;
	}

	/**
	 * @param mixed $Email
	 */
	public function setEmail($Email)
	{
		$this->Email = $Email;
	}

	/**
	 * @return mixed
	 */
	public function getFAX()
	{
		return $this->FAX;
	}

	/**
	 * @param mixed $FAX
	 */
	public function setFAX($FAX)
	{
		$this->FAX = $FAX;
	}

	/**
	 * @return mixed
	 */
	public function getHouseNo()
	{
		return $this->House_No;
	}

	/**
	 * @param mixed $House_No
	 */
	public function setHouseNo($House_No)
	{
		$this->House_No = $House_No;
	}

	/**
	 * @return mixed
	 */
	public function getPOBOX()
	{
		return $this->POBOX;
	}

	/**
	 * @param mixed $POBOX
	 */
	public function setPOBOX($POBOX)
	{
		$this->POBOX = $POBOX;
	}

	/**
	 * @return mixed
	 */
	public function getTelephone()
	{
		return $this->Telephone;
	}

	/**
	 * @param mixed $Telephone
	 */
	public function setTelephone($Telephone)
	{
		$this->Telephone = $Telephone;
	}



} 