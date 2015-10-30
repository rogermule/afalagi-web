<?php

/**
 * this php file will handle the form entry by the admin
 * and checks if the admin entered all the form entry and edits the user
 */

require("../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("Admin_Controller.php");
require("Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../MODEL/User_Type.php");
require("../MODEL/Error_Type.php");
$errors = array();


function admin_redirect_success(){
 	$dir = "VIEW/html/Admin/Employee_List.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");
	exit();
}


function admin_redirect_error($type_of_error,$user_id){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when Editing new user.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error, Use a different name. User name exists before.";
	}
	$dir = "VIEW/html/Admin/Edit_Employee.php?User_ID=$user_id&error=$error_type";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the admin to the Admin_Add_Users.php file
	exit();
}




if($_SERVER['REQUEST_METHOD'] == "POST"){


	/**
	 * check if the user is logged in
	 * check login status is from php file "controller secure access"
	 * it checks if the use is logged in
	 */
	if(TRUE == check_login_status()){

	 		$user_type = get_user_type();

 		if($user_type == User_Type::ADMIN){

 			$user_admin = $_SESSION['Logged_In_User'];

 			$admin_controller = new Admin_Controller($user_admin);
 			if(empty($_POST['User_Name'])){
				$errors[] = "User Name Should be filled";
			}
			else{
				$User_Name = $_POST['User_Name'];
			}

 			if(empty($_POST['User_Password'])){
				$errors[] = "Password should be filled";
			}
			else{
				$User_Password = $_POST['User_Password'];
			}

 			if(empty($_POST['User_Phone'])){
				$errors[] = "Phone Number is required";
			}
			else{
				$User_Phone = $_POST['User_Phone'];
			}

 			if(!isset($_POST['User_Type'])){
				$errors[] = "User type is required";
			}
			else{
				$User_Type = $_POST['User_Type'];
			}

			if(!isset($_POST['User_ID'])){
				$errors[] = "Please go back and refresh the site!";
			}
			else{
				$User_ID = $_POST['User_ID'];
			}

 			if($admin_controller->Check_User_Name_For_Edit($User_Name,$User_ID)){
				admin_redirect_error(Error_Type::SAME_USER_NAME);
			}
 			if(empty($errors)){

 				$new_user= new User($User_Name,$User_Password,$User_Type,$User_Phone,$User_ID);
  				$edited= $admin_controller->Edit_User($new_user);

 				if($edited){
					admin_redirect_success();
				}
				else{
					admin_redirect_error(Error_Type::DATA_BASE,$User_ID);
				}

			}
 			else{
 				admin_redirect_error(Error_Type::FORM,$User_ID);
			}

		}
	}

}







