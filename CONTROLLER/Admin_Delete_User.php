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


	$dir = "VIEW/html/Admin/Admin_Home_Page.php?success_delete=1";
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
	$dir = "VIEW/html/Admin/Admin_Add_Users.php?error=$error_type";
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

		/**
		 * check if the type of the user is admin
		 * get_user_type function is from a php file"Controller secure access"
		 * it returns the type of the user
		 */
		$user_type = get_user_type();

		/**
		 * if the user type is admin instantiate an Admin_controller and do what you got to do
		 */
		if($user_type == User_Type::ADMIN){


			/**
			 * get the logged in user
			 */
			$user_admin = $_SESSION['Logged_In_User'];


			/**
			 * instantiate admin controller with the logged in user
			 */
			$admin_controller = new Admin_Controller($user_admin);



			if(!isset($_POST['ID'])){
				$errors[] = "Please go back and refresh the site!";
			}
			else{
				$User_ID = $_POST['ID'];
			}


			/**
			 * if there is no error
			 */
			if(empty($errors)){


				/**
				 * Delete the user by the Id that is going to be sent through a hidden ID
				 */
				$edited= $admin_controller->Delete_User($User_ID);

				/**
				 * inform the admin about the result
				 */
				if($edited){
					admin_redirect_success($new_user);
				}
				else{
					admin_redirect_error(Error_Type::DATA_BASE);
				}

			}
			/**
			 * if there are errors when filling the form
			 */
			else{

				admin_redirect_error(Error_Type::FORM);
			}

		}
	}

}