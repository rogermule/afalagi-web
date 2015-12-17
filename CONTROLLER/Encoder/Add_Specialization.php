<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Specialization.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();

function encoder_redirect_success(){





	$dir = "VIEW/html/Encoder/Add_Specialization/Specialization_List.php?success=1";
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
		$error_type = "Error when adding new Street.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same specialization Name. Same specialization can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Specialization/Add_Specialization.php?error=$error_type";
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

//			/**
//			 * get the street name in english
//			 */
//			if(!isset($_POST['Category'])){
//				$errors[] = "Category Name Should be filled";
//			}
//			else{
// 				$Category_ID = $_POST['Category'];
//			}


			//get the general category
			if(isset($_POST['General_Category'])){
				$General_Category = $_POST['General_Category'];
			}
			else{
				$errors[] = "General category should be filled";

			}


			/**
			 * get the street name in amharic
			 */
			if(empty($_POST['Name'])){
				$errors[] = "Name Should be filled";
			}
			else{

				$Name =$_POST['Name'];
			}

			/**
			 * get the about street in english
			 */
			if(empty($_POST["Name_Amharic"])){

				 $errors[] = "Name in Amharic Should be filled";

			}
			else{

				$Name_Amharic = $_POST['Name_Amharic'];
			}



			if(empty($errors)){


				//make a specialization object
				$Specialization_C = new Specialization($General_Category,$Name,$Name_Amharic);

				//check if the specialization is registered before
				//if the specialization exists redirect, saying the specialization us repetition

				if($encoder_con->Specialization_Exists($Specialization_C)){
					encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA);
				}

				//add the specialization to the databse
				$added = $encoder_con->Add_Specialization($Specialization_C);

				if($added){
					encoder_redirect_success();
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


