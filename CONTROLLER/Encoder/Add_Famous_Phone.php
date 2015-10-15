<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Famous_Phone.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();



function encoder_redirect_success(Famous_Phone $famous_phone){

	$Phone = $famous_phone->getPhone();


	$dir = "VIEW/html/Encoder/Add_Phone/Add_Phone_Number.php?success=1&Phone=$Phone";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions add place
	exit();

}


function encoder_place_redirect($type_of_error){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new Company Type.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Company type. Same company type can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Phone/Add_Phone_Number.php?error=$error_type";
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
			if(empty($_POST['Phone'])){
				$errors[] = "Phone should be filled";
			}
			else{

				$Phone = $_POST["Phone"];

			}

			if(empty($_POST['Description'])){
				$errors[] = "Description should be filled in english";
			}
			else{
 				$Description = $_POST["Description"];
			}

			if(empty($_POST['Description_Amharic'])){
				$errors[] = "Description in amharic should be filled";
			}
			else{
				$Description_Amharic  = $_POST["Description_Amharic"];
			}



			if(empty($errors)){




				$Famous_Phone_C = new Famous_Phone($Phone,$Description,$Description_Amharic);

				if($encoder_con->Famous_Phone_Exists($Famous_Phone_C)){
					encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA);
				}

 				$added = $encoder_con->Add_Famous_Phones($Famous_Phone_C);

				/**
				 * inform the encoder about the result
				 */
				if($added){
					encoder_redirect_success($Famous_Phone_C);
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


