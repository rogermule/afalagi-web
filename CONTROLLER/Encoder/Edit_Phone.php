<?php

require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Famous_Phone.php");
$errors = array();



function encoder_redirect_success(Famous_Phone $new_Phone){

	$new_Phone_name = $new_Phone->getPhone();


	$dir = "VIEW/html/Encoder/Add_Phone/Phone_List.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Phones add place
	exit();

}

function encoder_place_redirect($type_of_error,$Phone_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new user.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Phone Name. Same Phone name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Phone/Edit_Phone.php?error=$error_type&Phone_ID=$Phone_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Phones
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
		if(($user_type == User_Type::ENCODER) or ($user_type == User_Type::NORMAL_ENCODER)){


			/**
			 * get the logged in user
			 */
			$encoder = $_SESSION['Logged_In_User'];


			/**
			 * instantiate admin controller with the logged in user
			 */
			$encoder_con = new Encoder_Controller($encoder);

			if(empty($_POST['Phone_ID'])){
				$errors[] = "Phone Id is not filled";
			}
			else{
				$Phone_ID = $_POST['Phone_ID'];
			}

			if(empty($_POST['Phone'])){
				$errors[] = "Phone should be filled";
			}
			else{
 				$Phone = $_POST['Phone'];
			}


			//get Phone name in amharic
			if(empty($_POST['Description'])){
				$errors[] = "Amharic name should be filled";
			}
			else{
 				$Description = $_POST['Description'];
			}

			//get about Phone
			if(empty($_POST['Description_Amharic'])){
				$errors[] = "About Phone should be filled";
			}
			else{
				$Description_Amharic = $_POST['Description_Amharic'];
			}


			if(empty($errors)){


 				$Phone = new Famous_Phone($Phone,$Description,$Description_Amharic);

				if($encoder_con->Phone_Number_Exists_For_Edit($Phone,$Phone_ID)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME,$Phone_ID);
				}
 				$added = $encoder_con->Edit_Phone($Phone,$Phone_ID);

				if($added){
					encoder_redirect_success($Phone);
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Phone_ID);
				}

			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Phone_ID);
			}

		}
	}

}