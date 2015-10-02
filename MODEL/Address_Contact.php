<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/23/2015
 * Time: 12:28 AM
 */

class Address_Contact {

	private $Address_ID;
	private $Contact_ID;

	function __construct($address_id,$contact_id){
		$this->Address_ID = $address_id;
		$this->Contact_ID = $contact_id;
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
	public function getContactID()
	{
		return $this->Contact_ID;
	}

	/**
	 * @param mixed $Contact_ID
	 */
	public function setContactID($Contact_ID)
	{
		$this->Contact_ID = $Contact_ID;
	}




} 