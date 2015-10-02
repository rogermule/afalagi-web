<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Sub_City.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("Encoder_Controller.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();



function encoder_redirect_success(Sub_City $Sub_City){

	$new_sub_city_name = $Sub_City->getSubCity();


	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Sub_City_inc.php?success=1&SubCity_Name=$new_sub_city_name";
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
		$error_type = "Error Same Sub City Name. Same Sub City name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Sub_City_inc.php?error=$error_type";
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
			if(empty($_POST['SubCity_Name'])){
				$errors[] = "Sub City should be filled";
			}
			else{
				$sub_city_name = $_POST['SubCity_Name'];

			}

			if(empty($_POST['SubCity_Name_Amharic'])){
				$errors[] = "Sub city in amharic should be filled";
			}
			else{
				$sub_city_name_amharic =$_POST["SubCity_Name_Amharic"];
			}


			if(empty($errors)){

				$sub_city = new Sub_City($sub_city_name,$sub_city_name_amharic);
				if($encoder_con->Sub_City_Exists($sub_city)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME);
				}


				$added = $encoder_con->Add_Sub_City($sub_city);

				/**
				 * inform the encoder about the result
				 */

				if($added){
					encoder_redirect_success($sub_city);
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


