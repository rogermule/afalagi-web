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

	$dir = "VIEW/html/Encoder/Add_Specialization/Specialization_List.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions add place
	exit();

}


function encoder_place_redirect($type_of_error,$Specialization_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new Street.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Specialization Name. Same Specialization name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Specialization/Edit_Specialization.php?error=$error_type&Specialization_ID=$Specialization_ID";
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
			if(!isset($_POST['General_Category'])){
				$errors[] = "Category Name Should be filled";
			}
			else{

				$General_Category = $_POST['General_Category'];
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


			if(isset($_POST["Specialization_ID"])){
				$Specialization_ID = $_POST['Specialization_ID'];
			}
			else{
				$errors[] = "specialization id is not filled";
			}

			if(empty($errors)){


				//make a specialization object
				$Specialization_C = new Specialization($General_Category,$Name,$Name_Amharic);




				if($encoder_con->Specialization_Exists_For_Edit($Specialization_C,$Specialization_ID)){
					encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA,$Specialization_ID);
				}
				//add the specialization to the database
	$edited = $encoder_con->Edit_Specialization($Specialization_C,$Specialization_ID);


				if($edited){
					encoder_redirect_success();
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Specialization_ID);
				}

			}
			/**
			 * if there are errors when filling the form
			 */
			else{
				encoder_place_redirect(Error_Type::FORM,$Specialization_ID);
			}

		}
	}

}


