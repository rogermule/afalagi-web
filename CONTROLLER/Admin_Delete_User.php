<?php


require("../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("Admin_Controller.php");
require("Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../MODEL/User_Type.php");
require("../MODEL/Error_Type.php");

$errors = array();

/**
 * @param User $new_user
 * this function takes a new added user and sends the user name and type of the
 * user to Admin_Add_User.php file
 */
function admin_redirect_success( ){


	$dir = "VIEW/html/Admin/Employee_List.php?success_delete=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the admin to the Admin_Add_Users.php file
	exit();

}


/**
 * this function redirects the user
 */
function admin_redirect_error($type_of_error){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new user.";
	}
	$dir = "VIEW/html/Admin/Employee_List.php?error=$error_type";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the admin to the Admin_Add_Users.php file
	exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){



	if(TRUE == check_login_status()){


		$user_type = get_user_type();


		if($user_type == User_Type::ADMIN){
 			$user_admin = $_SESSION['Logged_In_User'];
 			$admin_controller = new Admin_Controller($user_admin);
 			if(!isset($_POST['User_ID'])){
				$errors[] = "Please go back and refresh the site!";
			}
			else{
				$User_ID = $_POST['User_ID'];
			}

 			if(empty($errors)){
  				$edited= $admin_controller->Delete_User($User_ID);
  				if($edited){
					admin_redirect_success($new_user);
				}
				else{
					admin_redirect_error(Error_Type::DATA_BASE);
				}
 			}
 			else{
 				admin_redirect_error(Error_Type::FORM);
			}

		}
	}

}