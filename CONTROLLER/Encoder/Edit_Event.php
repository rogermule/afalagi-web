<?php

require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Event.php");
$errors = array();



function encoder_redirect_success(Event $new_Event){

	$new_Event_name = $new_Event->getName();


	$dir = "VIEW/html/Encoder/Add_Event/Event_List.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Events add place
	exit();

}

function encoder_place_redirect($type_of_error,$Event_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new user.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Event Name. Same Event name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Event/Edit_Event.php?error=$error_type&Event_ID=$Event_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Events
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

			/**
			 * get the user name from post
			 */
			if(empty($_POST['Name'])){
				$errors[] = "Event should be filled";
			}
			else{
				$Name = $_POST['Name'];
 			}


			//get event name in amharic
			if(empty($_POST['Name_Amharic'])){
				$errors[] = "Amharic name should be filled";
			}
			else{
				$Name_Amharic = $_POST['Name_Amharic'];
			}

			//get about event
			if(empty($_POST['About_Event'])){
				$errors[] = "About event should be filled";
			}
			else{
				$About_Event = $_POST['About_Event'];
			}

			//get about event in amharic
			if(empty($_POST['About_Event_Amharic'])){
				$errors[] = "About event in amharic should be filled";
			}
			else{
				$About_Event_Amharic = $_POST['About_Event_Amharic'];
			}

			//get event start
			if(empty($_POST['Event_Start'])){
				$errors[] = "Event start should be filled";
			}
			else{
				$Event_Start = $_POST['Event_Start'];
			}

			//get event end
			if(empty($_POST['Event_End'])){
				$errors[] = "Event end should be filled";
 			}
			else{
				$Event_End = $_POST['Event_End'];
			}


			if(empty($_POST['Event_ID'])){
				$errors[] ="Event ID should be filled";
			}
			else{
				$Event_ID = $_POST['Event_ID'];
			}








			if(empty($errors)){


				$Event = new Event($Name,$Name_Amharic,$About_Event,$About_Event_Amharic,$Event_Start,$Event_End);

				if($encoder_con->Event_Exists_For_Edit($Event,$Event_ID)){
					encoder_place_redirect(Error_Type::SAME_USER_NAME,$Event_ID);
				}


				$added = $encoder_con->Edit_Event($Event,$Event_ID);

				/**
				 * inform the encoder about the result
				 */

				if($added){
					encoder_redirect_success($Event);
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Event_ID);
				}

			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Event_ID);
			}

		}
	}

}