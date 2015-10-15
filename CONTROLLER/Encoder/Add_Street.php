<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Street.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();


/**
 * @param Category $new_category
 * this will redirect the user to the add street
 */
function encoder_redirect_success(Street $street){


	$street_name = $street->getStreetName();
	$street_name_amharic = $street->getStreetNameAmharic();


	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Street_inc.php?success=1&street_name=$street_name&street_name_amharic=$street_name_amharic";
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
		$error_type = "Error when adding new Street.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Street Name. Same Street can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Street_inc.php?error=$error_type";
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
			 * get the street name in english
			 */
			if(empty($_POST['Street_Name'])){
				$errors[] = "Street name should be filled";
			}
			else{
				$Street_Name = $_POST["Street_Name"];
			}


			/**
			 * get the street name in amharic
			 */
			if(empty($_POST['Street_Name_Amharic'])){
				$errors[] = "Street Name should be filled in amharic";
			}
			else{
				$Street_Name_Amharic = $_POST["Street_Name_Amharic"];
			}

			/**
			 * get the about street in english
			 */
			if(!empty($_POST["About_Street"])){

				$About_Street = $_POST["About_Street"];

			}
			else{
				$About_Street = "Not Filled";
			}

			/**
			 * get the about the street in amharic
			 */
			if(!empty($_POST["About_Street_Amharic"])){
				$About_Street_Amharic = $_POST["About_Street_Amharic"];
			}
			else{
				$About_Street_Amharic = "Not Filled";
			}

			if(empty($errors)){

				//make a street object
				$Street_C = new Street($Street_Name,$Street_Name_Amharic,$About_Street,$About_Street_Amharic);

				//check if the street exists in the database
				//if the street exists redirect, saying the street is repetition
				if($encoder_con->Street_Exists($Street_C)){
                     encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA);
 				}

				//add the street to the database
                $added = $encoder_con->Add_Street($Street_C);



				if($added){
					encoder_redirect_success($Street_C);
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


