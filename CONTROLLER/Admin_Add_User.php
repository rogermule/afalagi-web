<?php



/**
 * this php file will handle the form entry by the admin
 * and checks if the admin entered all the form
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


/**
 * @param User $new_user
 * this function takes a new added user and sends the user name and type of the
 * user to Admin_Add_User.php file
 */
function admin_redirect_success(User $new_user){


	$new_user_name = $new_user->getUserName();//get user name
	$new_user_type = $new_user->getUserType();//get user type


	$dir = "VIEW/html/Admin/Add_Employee.php?success=1";
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
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same user name, Choose a different name.";
	}
	$dir = "VIEW/html/Admin/Add_Employee.php?error=$error_type";
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


			if($admin_controller->User_Name_Exists($User_Name)){
				admin_redirect_error(Error_Type::SAME_USER_NAME);
			}

 					if(empty($errors)){

						/**
						 * instantiate a new user
						 */
						$new_user= new User($User_Name,$User_Password,$User_Type,$User_Phone);

						/**
						 * add the user to the database
						 */
						$added = $admin_controller->Add_User($new_user);

						/**
						 * inform the admin about the result
						 */
							if($added){
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







