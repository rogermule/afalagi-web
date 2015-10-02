<?php


require("../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../MODEL/User.php");//user object will be created so it should be included in here
require("../../MODEL/Category.php");
require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("Encoder_Controller.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");

$errors = array();



function encoder_redirect_success(Category $new_category){

	$new_category_name = $new_category->getCategoryName();


	$dir = "VIEW/html/Encoder/Add_Category/Add_Category.php?success=1&Category_Name=$new_category_name";
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
		$error_type = "Error when adding new Category.";
	}
	else if($type_of_error == Error_Type::SAME_CATEGORY_NAME){
		$error_type = "Error Same Category Name. Same category can not be added";
	}
	$dir = "VIEW/html/Encoder/Add_Category/Add_Category.php?error=$error_type";
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
			if(empty($_POST['Category_Name'])){
				$errors[] = "Category should be filled";
			}
			else{
				$category_name = $_POST['Category_Name'];

			}

			if(empty($_POST['Category_Name_Amharic'])){
				$errors[] = "Category name in amharic should be filled";
			}
			else{
				$category_name_amharic = $_POST["Category_Name_Amharic"];
			}



			if(empty($errors)){

				$category = new Category($category_name,$category_name_amharic);

				if($encoder_con->Category_Exists($category)){
					encoder_place_redirect(Error_Type::SAME_CATEGORY_NAME);
				}

				$added = $encoder_con->Add_Category($category);

				/**
				 * inform the encoder about the result
				 */
				if($added){
					encoder_redirect_success($category);
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


