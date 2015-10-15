<?php

require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Company_Type.php");
require("../../MODEL/Belong.php");

require("../../MODEL/Region.php");
require("../../MODEL/City.php");
require("../../MODEL/Sub_City.php");
require("../../MODEL/Wereda.php");
require("../../MODEL/Sefer.php");


require("../../MODEL/Street.php");
require("../../MODEL/Company.php");
require("../../MODEL/Company_Category.php");
require("../../MODEL/Company_Ownership.php");

require("../../MODEL/About_Company.php");
require("../../MODEL/Payment_Status.php");
require("../../MODEL/Company_Service.php");

require("../../MODEL/Company_Address.php");
require("../../MODEL/Place.php");
require("../../MODEL/Address_Place.php");
require("../../MODEL/Address_Building.php");


require("../../MODEL/Address_Contact.php");
require("../../MODEL/Contact.php");
require("../../MODEL/Address_Direction.php");
require("../../MODEL/Direction.php");


require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");


$errors = array();


function encoder_redirect_success(){


	$dir = "VIEW/html/Encoder/Add_Company/Company_List.php?success_delete=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions add place
	exit();

}


function encoder_place_redirect($type_of_error){

	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Data fill error";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new Company.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Company Name. The Company is Registered Before";
	}
	$dir = "VIEW/html/Encoder/Add_Company/Company_List.php?error=$error_type";
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

			$database = $encoder_con->getDbc();






			//get common things to both types


			//get 1 company id
			if(isset($_POST['Company_ID'])){
				$Company_ID = $_POST['Company_ID'];
			}
			else{
				$errors[] = "Company id should be filled";
			}

			//get 2 about company id
			if(isset($_POST['About_Company_ID'])){
				$About_Company_ID = $_POST['About_Company_ID'];
			}
			else{
				$errors[] = "Company id should be filled";
			}

			//get 3 payment status id
			if(isset($_POST['Payment_Status_ID'])){
				$Payment_Status_ID = $_POST['Payment_Status_ID'];
			}
			else{
				$errors[] = "Payment status id should be filled";
			}

			//4 get company service id
			if(isset($_POST['Company_Service_ID'])){
				$Company_Service_ID = $_POST['Company_Service_ID'];
			}
			else{
				$errors[] = "Company service ID";
			}

			//5 get company ownership
 			if(isset($_POST['Company_Ownership_ID'])){
				$Company_Ownership_ID = $_POST['Company_Ownership_ID'];
			}
			else{
				$errors[] = 'Company ownership should be filled';
			}

			//6 get company category
			if(isset($_POST['Company_Category_ID'])){
				$Company_Category_ID = $_POST['Company_Category_ID'];
			}
			else{
				$errors[] = 'Company category should be filled';
			}

			//7 get contact ID
			if(isset($_POST['Contact_ID'])){
				$Contact_ID =$_POST['Contact_ID'];
			}
			else{
				$errors[] = 'Contact id should be filled';
			}

			//if the building is not chosen
			if( isset($_POST['Address_Building_Floor_ID'])){

				$with_building = TRUE;
 				$Address_Building_Floor_ID = $_POST['Address_Building_Floor_ID'];


			}

			else if(!isset($_POST['Address_Building_Floor_ID'])){

				//indicates the company is not on a building
				$with_building = FALSE;
				//get the direction id
				if(isset($_POST['Direction_ID'])){
					$Direction_ID = $_POST['Direction_ID'];
				}
				else{
					$errors[] = "Direction id should be filled";
				}

				//get the place id

				if(isset($_POST['Place_ID'])){
					$Place_ID = $_POST['Place_ID'];
				}
				else{
					$errors[] = "Place should be filled";
				}

			}



			if(empty($errors)){








				if(!$with_building){
					$deleted = $encoder_con->Delete_Company_With_Out_Building($Company_ID,
						$About_Company_ID,
						$Payment_Status_ID,
						$Company_Service_ID,
						$Company_Ownership_ID,
						$Company_Category_ID,
						$Contact_ID,
						$Direction_ID,
						$Place_ID);
				}
				else if($with_building){
					$deleted =$encoder_con->Delete_Company_With_Building($Company_ID,
						$About_Company_ID,
						$Payment_Status_ID,
						$Company_Service_ID,
						$Company_Ownership_ID,
						$Company_Category_ID,
						$Contact_ID,
						$Address_Building_Floor_ID);


				}

				//if the company is deleted redirect the user with success
				if($deleted){
					encoder_redirect_success();
				}
				//if the company is not deleted make a database error notification
				else{
					encoder_place_redirect(Error_Type::DATA_BASE);
				}


			}
			else{
				encoder_place_redirect(Error_Type::FORM);
			}






		}
	}

}
