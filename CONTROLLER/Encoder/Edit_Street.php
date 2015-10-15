<?php

require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Street.php");
$errors = array();



function encoder_redirect_success(Street $new_Street){

	$new_Street_name = $new_Street->getStreetName();


	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Street_inc.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Streets add place
	exit();

}

function encoder_place_redirect($type_of_error,$Street_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new user.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Street Name. Same Street name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Edit_Street.php?error=$error_type&Street_ID=$Street_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Streets
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

			/**
			 * get the user name from post
			 */
			if(empty($_POST['Name'])){
				$errors[] = "Street should be filled";
			}
			else{
				$Name = $_POST['Name'];


			}


			if(empty($_POST['Name_Amharic'])){
				$errors[] = "Amharic name should be filled";
			}
			else{
				$Name_Amharic = $_POST['Name_Amharic'];
			}


			//about street
			if(empty($_POST['About_Street'])){
				$errors[] = "About street should be filled";
			}
			else{
				$About_Street = $_POST["About_Street"];
			}


			//get about about street amharic

			if(empty($_POST['About_Street_Amharic'])){
				$errors[] = "About street in amharic should be filled";
			}
			else{
				$About_Street_Amharic = $_POST["About_Street_Amharic"];
			}


			if(empty($_POST['Street_ID'])){
				$errors[] ="Street ID should be filled";
			}
			else{
				$Street_ID = $_POST['Street_ID'];
			}





			if(empty($errors)){


				$Street = new Street($Name,$Name_Amharic,$About_Street,$About_Street_Amharic);
				if($encoder_con->Street_Exists_For_Edit($Street,$Street_ID)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME,$Street_ID);
				}


				$added = $encoder_con->Edit_Street($Street,$Street_ID);

				/**
				 * inform the encoder about the result
				 */

				if($added){
					encoder_redirect_success($Street);
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Street_ID);
				}

			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Street_ID);
			}

		}
	}

}