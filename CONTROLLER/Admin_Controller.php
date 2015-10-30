<?php

//admin controller is going to extend user_controller class and inherit login and logout methods


class Admin_Controller extends User_Controller{


	private $User_ID;
	private $User_Name;//will hold the name of the user
	private $User_Password;//will hold the password
	private $User_Phone;//will hold the user phone number
	private $User_Type;//will hold the use type

	function Add_User(User $new_user){


        $this->User_Name = mysqli_real_escape_string($this->getDbc(),trim($new_user->getUserName()));
		$this->User_Password = mysqli_real_escape_string($this->getDbc(),trim($new_user->getUserPassword()));
		$this->User_Phone = mysqli_real_escape_string($this->getDbc(),trim($new_user->getUserPhone()));
		$this->User_Type = mysqli_real_escape_string($this->getDbc(),$new_user->getUserType());


		//check if the user exists before
		//if the user exists before, return and inform


		//then add this user to the database
		$query =  "INSERT INTO user(User_Name,User_Password,User_Type,User_Phone,User_Registration_Date) VALUES('$this->User_Name',sha1('$this->User_Password'),'$this->User_Type','$this->User_Phone',Now())";

		//mysqli query will get the database connection from the User_Controller getDbc function.
		//getDbc will return a database connection
		$result = mysqli_query($this->getDbc(),$query);


		//if the user is added successfully return true
		if($result){
			//user added successfully
			return TRUE;
		}
		else{
			//error while adding a users
			return FALSE;
		}

	}



	/**
	 * @param $user_type
	 * @return bool|mysqli_result
	 *
	 * this function takes what type of user we want it to fetch from the database
	 * and after fetching from the database it will return it to the caller function
	 */
	function Get_Users($user_type){

		$query = "";
		$user = "";

		if($user_type == User_Type::ENCODER){
			 $user = $user_type;
		}
		else if($user_type == User_Type::OPERATOR){
			 $user = $user_type;
		}

		else if($user_type == User_Type::NORMAL_ENCODER){
			$user =$user_type;
		}

		$query = "SELECT ID,User_Name,User_Type,User_Phone,DATE_FORMAT(User_Registration_Date,'%M %D %Y') as User_Registration_Date
				      FROM User
				      WHERE User_Type ='$user_type' ORDER BY User_Name";

		$users = mysqli_query($this->getDbc(),$query);

		if($users){
			return $users;
		}
		else{
			return null;
		}


	}


	/**
	 * @param $user_name
	 * @return bool
	 * checks if the user name exists
	 * if the name exists it will return false
	 * if the name doesn't exit it will return
	 */
	function User_Name_Exists($user_name){

		$query = "SELECT * from  user where User_Name='$user_name'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}

	}


	function Check_User_Name_For_Edit($user_name,$user_id){

		$query = "SELECT * FROM user where User_Name='$user_name' AND ID != '$user_id'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}
	}

	/**
	 * @param $user_id
	 * @return bool|mysqli_result
	 *
	 * this function takes a user id and returns the user to the caller function
	 * if the user is not found with the given id the function returns false
	 */
	function Get_User($user_id){

		 $query = "SELECT * from USER WHERE ID='$user_id'";

		$user = mysqli_query($this->getDbc(),$query);

		if($user){
			return $user;
		}
		else{
			return FALSE;
		}
	}



	/**
	 * @param User $edited_user
	 * @return bool|User
	 * this function takes a user and update the user with the new edited user
	 */
	function Edit_User(User $edited_user){

		$this->User_ID = mysqli_real_escape_string($this->getDbc(),trim($edited_user->getUserID()));
		$this->User_Name = mysqli_real_escape_string($this->getDbc(),trim($edited_user->getUserName()));
		$this->User_Password = mysqli_real_escape_string($this->getDbc(),trim($edited_user->getUserPassword()));
		$this->User_Phone = mysqli_real_escape_string($this->getDbc(),trim($edited_user->getUserPhone()));
		$this->User_Type = mysqli_real_escape_string($this->getDbc(),trim($edited_user->getUserType()));

		$query = "UPDATE user
				  SET User_Name='$this->User_Name',User_Password=sha1('$this->User_Password'),User_Phone='$this->User_Phone',User_Type='$this->User_Type'
				  WHERE ID='$this->User_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		/**
		 * if the user is updated
		 */

			return $edited_user;


	}


	/**
	 * @param $user_id
	 * @return bool
	 * this function returns true if the user is deleted
	 * and returns false if the user is not deleted
	 */
	function Delete_User($user_id){
		$query = "DELETE FROM user where ID='$user_id'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	/**
	 * @param User $admin
	 * @return bool
	 * this will edit the admin profile
	 */
	function Admin_Edit_Profile(User $admin){

		$this->User_Name = mysqli_real_escape_string($this->getDbc(),trim($admin->getUserName()));
 		$this->User_Password = mysqli_real_escape_string($this->getDbc(),trim($admin->getUserPassword()));
		$this->User_ID = mysqli_real_escape_string($this->getDbc(),trim($admin->getUserID()));


		$query = "UPDATE user
			      SET User_Name='$this->User_Name',User_Password=sha1('$this->User_Password')
			      WHERE ID='$this->User_ID'";

		$result = mysqli_query($this->getDbc(),$query);



			$updated_admin = new User($this->User_Name,$this->User_Password);
			$updated_admin->setUserID($this->User_ID);
			$updated_admin->setUserType(User_Type::ADMIN);

			/**
			 * update the logged in user
			 * and return true
			 */


			session_start();
			$_SESSION["Logged_In_User"] = $updated_admin;
			return TRUE;


	}





}




















































