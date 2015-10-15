<?php
require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Sub_City.php");
$errors = array();

function encoder_redirect_success(Sub_City $new_Sub_City){

	$new_Sub_City_name = $new_Sub_City->getSubCity();


	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Sub_City_inc.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");
	exit();

}

function encoder_place_redirect($type_of_error,$Sub_City_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Data Base Error.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Sub_City Name. Same Sub City name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Edit_Sub_City.php?error=$error_type&Sub_City_ID=$Sub_City_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the cities
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
				$errors[] = "Sub_City Name should be filled";
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

			if(empty($_POST['Sub_City_ID'])){
				$errors[] ="Sub_City ID should be filled";
			}
			else{

				$Sub_City_ID = $_POST['Sub_City_ID'];
			}




			if(empty($errors)){


				$Sub_City = new Sub_City($Name,$Name_Amharic);


				if($encoder_con->Sub_City_Exists_For_Edit($Sub_City,$Sub_City_ID)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME,$Sub_City_ID);
				}


				$added = $encoder_con->Edit_Sub_City($Sub_City,$Sub_City_ID);

				/**
				 * inform the encoder about the result
				 */

				if($added){
					encoder_redirect_success($Sub_City);
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Sub_City_ID);
				}

			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Sub_City_ID);
			}

		}
	}

}