<?php



require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Famous_Phone.php");
$errors = array();


function encoder_redirect_success(){




	$dir = "VIEW/html/Encoder/Add_Phone/Phone_List.php?success_delete=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Phones add place
	exit();

}

function encoder_place_redirect($type_of_error,$Phone_ID){

	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "The Phone is Used by Company or Building, You can not delete it. If You want it to be deleted, First Deleted things that reference this Phone, like Building or company.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Phone Name. Same Phone name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Delete_Phone.php?error=$error_type&Phone_ID=$Phone_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");
	exit();

}

if($_SERVER['REQUEST_METHOD'] == "POST"){


	if(TRUE == check_login_status()){


		$user_type = get_user_type();

		if(($user_type == User_Type::ENCODER) or ($user_type == User_Type::NORMAL_ENCODER)){

			$encoder = $_SESSION['Logged_In_User'];
			$encoder_con = new Encoder_Controller($encoder);

			if(empty($_POST['Phone_ID'])){
				$errors[] = "Phone id should be filled";
			}
			else{
				$Phone_ID = $_POST['Phone_ID'];
			}


			if(empty($errors)){

				$deleted = $encoder_con->Delete_Phone($Phone_ID);

				if($deleted){
					encoder_redirect_success();
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Phone_ID);
				}

			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Phone_ID);
			}

		}
	}

}