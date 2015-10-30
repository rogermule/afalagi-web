<?php

require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Category.php");
$errors = array();



function encoder_redirect_success(){

	$dir = "VIEW/html/Encoder/Add_Category/Category_List.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Category add place
	exit();

}

function encoder_place_redirect($type_of_error,$Category_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new user.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Category Name. Same Category name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Category/Edit_Category.php?error=$error_type&Category_ID=$Category_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Category
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
		if($user_type == User_Type::ENCODER){


			/**
			 * get the logged in user
			 */
			$encoder = $_SESSION['Logged_In_User'];


			/**
			 * instantiate admin controller with the logged in user
			 */
			$encoder_con = new Encoder_Controller($encoder);

			//get name
			if(empty($_POST['Name'])){
				$errors[] = "Category should be filled";
			}
			else{
				$Name = $_POST['Name'];


			}

			//get name amharic
			if(empty($_POST['Name_Amharic'])){
				$errors[] = "Amharic name should be filled";
			}
			else{
				$Name_Amharic = $_POST['Name_Amharic'];
			}


			//get category id
			if(empty($_POST['Category_ID'])){
				$errors[] ="Category ID should be filled";
			}
			else{
				$Category_ID = $_POST['Category_ID'];
			}


			if(empty($errors)){


				$Category = new Category($Name,$Name_Amharic);
				if($encoder_con->Category_Exists_For_Edit($Category,$Category_ID)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME,$Category_ID);
				}


				$added = $encoder_con->Edit_Category($Category,$Category_ID);

				if($added){
					encoder_redirect_success();
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Category_ID);
				}

			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Category_ID);
			}

		}
	}

}