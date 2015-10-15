<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Sefer.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();



function encoder_redirect_success(Sefer $sefer){

	$new_sefer_name = $sefer->getSefer();


	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_sefer_inc.php?success=1&Sefer_Name=$new_sefer_name";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions add place
	exit();

}

/**
 * @param $type_of_error
 * this function takes an error type
 * and redirect the encoder to the add regions place
 */
function encoder_place_redirect($type_of_error){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new user.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same sefer Name. Same sefer name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_sefer_inc.php?error=$error_type";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions
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
			if(empty($_POST['Sefer_Name'])){
				$errors[] = "sefer should be filled";
			}
			else{
				$sefer_name = $_POST['Sefer_Name'];


			}

			if(empty($_POST["Sefer_Name_Amharic"])){
				$errors[] = "Sefer name in amharic should be filled";
			}
			else{
				$sefer_name_amharic = $_POST['Sefer_Name_Amharic'];
			}



			if(empty($errors)){

				$sefer = new Sefer($sefer_name,$sefer_name_amharic);

				if($encoder_con->Sefer_Exists($sefer)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME);
				}


				$added = $encoder_con->Add_Sefer($sefer);

				/**
				 * inform the encoder about the result
				 */

				if($added){
					encoder_redirect_success($sefer);
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE);
				}

			}
			/**
			 * if there are errors when filling the form
			 */
			else{
				encoder_place_redirect(Error_Type::FORM);
			}

		}
	}

}


