<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 8/24/2015
 * Time: 5:42 PM
 */

class User{

	private $User_ID;
	private $User_Name;
	private $User_Password;
	private $User_Type;
	private $User_Phone;

	function __construct($user_name,$user_pass,$user_type = null,$user_phone = null,$user_id = null){
		$this->User_Name = $user_name;
		$this->User_Password = $user_pass;

		//if the user id is not null set the user id to the user
		if(!$user_id == null){
			$this->User_ID = $user_id;
		}

 		//if the user type is not null set the user
		if(!$user_type == null){
			$this->User_Type = $user_type;
		}

		//if the user phone is not null set the phone, this happens at registration
		if(!$user_phone == null){
			$this->User_Phone = $user_phone;
		}

	}

	/**
	 * @return mixed
	 */

	public function getUserID()
	{
		return $this->User_ID;
	}

	/**
	 * @param mixed $User_ID
	 */
	public function setUserID($User_ID)
	{
		$this->User_ID = $User_ID;
	}

	/**
	 * @return mixed
	 */
	public function getUserName()
	{
		return $this->User_Name;
	}

	/**
	 * @param mixed $User_Name
	 */
	public function setUserName($User_Name)
	{
		$this->User_Name = $User_Name;
	}

	/**
	 * @return mixed
	 */
	public function getUserPassword()
	{
		return $this->User_Password;
	}

	/**
	 * @param mixed $User_Password
	 */
	public function setUserPassword($User_Password)
	{
		$this->User_Password = $User_Password;
	}

	/**
	 * @return mixed
	 */
	public function getUserType()
	{
		return $this->User_Type;
	}

	/**
	 * @param mixed $User_Type
	 */
	public function setUserType($User_Type)
	{
		$this->User_Type = $User_Type;
	}

	/**
	 * @return mixed
	 */
	public function getUserPhone()
	{
		return $this->User_Phone;
	}

	/**
	 * @param mixed $User_Phone
	 */
	public function setUserPhone($User_Phone)
	{
		$this->User_Phone = $User_Phone;
	}



} 