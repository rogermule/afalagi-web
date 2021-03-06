<?php

require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Building.php");
$errors = array();


function encoder_redirect_success(){

	$dir = "VIEW/html/Encoder/Add_Building/Building_List.php?success_delete=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Buildings add place
	exit();

}

function encoder_place_redirect($type_of_error,$Building_ID){

	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "The Building is Used by Company, You can not delete it. If You want it to be deleted, First Delete things that reference this Building, like Building or company.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Building Name. Same Building name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Building/Delete_Building.php?error=$error_type&Building_ID=$Building_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");
	exit();

}


if($_SERVER['REQUEST_METHOD'] == "POST"){


	if(TRUE == check_login_status()){
		$user_type = get_user_type();
		if($user_type == User_Type::ENCODER){

			$encoder = $_SESSION['Logged_In_User'];
			$encoder_con = new Encoder_Controller($encoder);



			if(isset($_POST['Building_ID'])){
				$Building_ID =$_POST['Building_ID'];
			}
			else{
				$errors[] = "Building id should be filled";
			}

			if(isset($_POST['Place_ID'])){
				$Place_ID = $_POST['Place_ID'];
			}
			else{
				$errors[] = "Place id should be filled";
			}

			if(isset($_POST['Direction_ID'])){
				$Direction_ID = $_POST['Direction_ID'];
			}
			else{
				$errors[] = "Direction id should be filled";
			}

			if(empty($errors)){


				$deleted = $encoder_con->Delete_Building($Building_ID,$Place_ID,$Direction_ID);
				if($deleted){
					encoder_redirect_success();
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Building_ID);
				}
			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Building_ID);
			}

		}
	}

}