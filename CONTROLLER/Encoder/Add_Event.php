<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Event.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();



function encoder_redirect_success(Event $event){

	$Name = $event->getName();
	$Name_Amharic = $event->getNameAmharic();

	$dir = "VIEW/html/Encoder/Add_Event/Add_Events.php?success=1&Name=$Name&Name_Amharic=$Name_Amharic";
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
		$error_type = "Error when adding new Event.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Event type. Same Event cant be added";
	}
	$dir = "VIEW/html/Encoder/Add_Event/Add_Events.php?error=$error_type";
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
			if(empty($_POST['Name'])){
				$errors[] = "Event Name Should be filled";
			}
			else{

				$Name = $_POST["Name"];

			}

			if(empty($_POST['Name_Amharic'])){
				$errors[] = "Name of event in amharic should be filled";
			}
			else{
				$Name_Amharic = $_POST["Name_Amharic"];
			}

			if(empty($_POST['About_Event'])){
				$errors[] = "Description in amharic should be filled";
			}
			else{
				$About_Event  = $_POST["About_Event"];
			}


			if(empty($_POST['About_Event_Amharic'])){
				$errors[] = "Description in amharic should be filled";
			}
			else{
				$About_Event_Amharic  = $_POST["About_Event_Amharic"];
			}

			//get the event start
			if(empty($_POST['Event_Start'])){
				$Event_Start = '';
			}
			else if(!(empty($_POST['Event_Start']))){
				$Event_Start = $_POST['Event_Start'];
			}

			//get the event end
			if(empty($_POST['Event_End'])){
				$Event_End = '';
			}
			else if(!(empty($_POST['Event_End']))){
				$Event_End = $_POST['Event_End'];
			}



			if(empty($errors)){

				$Event_C = new Event($Name,$Name_Amharic,$About_Event,$About_Event_Amharic);

				if($encoder_con->Event_Exists($Event_C)){
					encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA);
				}

 				$added = $encoder_con->Add_Event($Event_C);

    			if($added){
					encoder_redirect_success($Event_C);
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


