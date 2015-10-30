<?php

//the user is a class that other classes are goign to extend
//because the user contains common actions that admin, encoder and also phone receptionist have
//which is login and logout



//variable that will hold the user on the session is $_SESSION[Logged_In_User]



class User_Controller{

	protected $user;
	protected $db;
	protected $dbc;
	function __construct(User $user){
		$this->user = $user;
		$this->db = new DataBase();
		$this->dbc = $this->db->connect();

	}


	function login(){


		$user_name = $this->user->getUserName();
		$user_password = $this->user->getUserPassword();

		$query = "SELECT * from user where User_Name= '$user_name' AND User_Password = sha1('$user_password')";

		$result = mysqli_query($this->dbc,$query);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$this->user->setUserID($row['ID']);
			$this->user->setUserType($row['User_Type']);

			//start session and put the user on the session
			session_start();
			$_SESSION["Logged_In_User"] = $this->user;
			return true;
		}
		else{
			//if the user cant login with his credentials
			return false;
		}


	}//end of login function

	function logout(){
		$_SESSION = array();//clear the session array

		if(session_destroy()){
			//this will close th connection of the database
			//and also returns true after closing the database connection
			//which is good programming, even if the database is going to close after the script ends
			setcookie ('PHPSESSID', '', time( )-3600, '/', '', 0, 0); // Destroy the cookie.
			$this->dbc->close();
			return true;

		}else{
			return false;
		}
	}

	/**
	 * @return DataBase
	 */
	public function getDb()
	{
		return $this->db;
	}

	/**
	 * @param DataBase $db
	 */
	public function setDb($db)
	{
		$this->db = $db;
	}

	/**
	 * @return mysqli
	 */
	public function getDbc()
	{
		return $this->dbc;
	}

	/**
	 * @param mysqli $dbc
	 */
	public function setDbc($dbc)
	{
		$this->dbc = $dbc;
	}

	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @param User $user
	 */
	public function setUser($user)
	{
		$this->user = $user;
	}
}