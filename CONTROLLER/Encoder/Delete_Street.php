<?php



require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");
require("../../MODEL/Street.php");
$errors = array();


function encoder_redirect_success(){




	$dir = "VIEW/html/Encoder/Add_Place/Add_Place_Street_inc.php?success_delete=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the Streets add place
	exit();

}

function encoder_place_redirect($type_of_error,$Street_ID){

	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "The Street is Used by Company or Building, You can not delete it. If You want it to be deleted, First Deleted things that reference this Street, like Building or company.";
	}
	else if($type_of_error == Error_Type::SAME_USER_NAME){
		$error_type = "Error Same Street Name. Same Street name can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Place/Delete_Street.php?error=$error_type&Street_ID=$Street_ID";
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

			if(empty($_POST['Street_ID'])){
				$errors[] = "Street id should be filled";
			}
			else{
				$Street_ID = $_POST['Street_ID'];
			}


			if(empty($errors)){



				$deleted = $encoder_con->Delete_Street($Street_ID);


				if($deleted){
					encoder_redirect_success();
				}
				else{
					encoder_place_redirect(Error_Type::DATA_BASE,$Street_ID);
				}




			}
			else{
				encoder_place_redirect(Error_Type::FORM,$Street_ID);
			}

		}
	}

}