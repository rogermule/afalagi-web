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
require("../../MODEL/Registration_Type.php");


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


function encoder_redirect_success(Company $company){

	$Company_Name = $company->getCompanyName();
	$Company_Name_Amharic = $company->getCompanyNameAmharic();


	$dir = "VIEW/html/Encoder/Add_Company/Company_List.php?success=1&Company_Name=$Company_Name&Company_Name_Amharic=$Company_Name_Amharic";
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
		$error_type = "Error when adding new Company.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Company Name. The Company is Registered Before";
	}
	$dir = "VIEW/html/Encoder/Add_Company/Add_Company.php?error=$error_type";
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
		if(($user_type == User_Type::ENCODER) or ($user_type == User_Type::NORMAL_ENCODER)){


			/**
			 * get the logged in user
			 */
			$encoder = $_SESSION['Logged_In_User'];


			/**
			 * instantiate admin controller with the logged in user
			 */
			$encoder_con = new Encoder_Controller($encoder);

			$database = $encoder_con->getDbc();


			//will hold a flag to tell us which one to choose from,
			//when adding the address of the company

			$with_building = TRUE;




			//if the building is not chosen
			if(($_POST['Building'] == 'NOT_FILLED')){

				//take the regions and stuff like that

				//1  get the region id

				$with_building = FALSE;

				if(empty($_POST['Region']) OR ( $_POST['Region'] == 'NOT_FILLED' )){
					$errors[] = "Choose which region the building is.";
				}
				else{
					$Region_ID = mysqli_real_escape_string($database,trim($_POST['Region']));
				}

				//2  get the city id
				if(empty($_POST['City']) OR ( $_POST['City'] == 'NOT_FILLED' )){
					$errors[] = "Choose which city the building is.";
				}
				else{
					$City_ID = mysqli_real_escape_string($database,trim($_POST['City']));
				}

				//3  get the sub city id
				if(empty($_POST['Sub_City']) OR ( $_POST['Sub_City'] == 'NOT_FILLED' )){
					$errors[] = "Choose which Sub city the building is";
				}
				else{
					$Sub_City_ID = mysqli_real_escape_string($database,trim($_POST['Sub_City']));
				}

				//4   get the kebele id
				if(empty($_POST['Wereda']) OR ( $_POST['Wereda'] == 'NOT_FILLED' )){
					$errors[] = "Choose which wereda the building is";
				}
				else{
					$Wereda_ID =mysqli_real_escape_string($database,trim($_POST['Wereda']));

				}

				//5   get the sefer id
				if(empty($_POST['Sefer']) OR ( $_POST['Sefer'] == 'NOT_FILLED' )){
					$errors[] = "Choose which sefer the building is";
				}
				else{
					$Sefer_ID =mysqli_real_escape_string($database,trim($_POST["Sefer"]));
				}

				//6 get the street id
				if(empty($_POST['Street']) OR ($_POST['Street'] == 'NOT_FILLED')){
					$errors[] = "Select which street the company is found";
				}
				else{
					$Street_ID = mysqli_real_escape_string($database,trim($_POST['Street']));
				}

				//7     get the direction to the building
				if(empty($_POST['Direction'])){
					$errors[] = "The Direction to the Company should be filled";
				}
				else{
					$Direction =mysqli_real_escape_string($database,trim($_POST['Direction']));
				}

				//8   get the location of the building in amharic
				if(empty($_POST['Direction_Amharic'])){
					$errors[] = "The Direction to the Company should be filled in amharic";
				}
				else{
					$Direction_Amharic =mysqli_real_escape_string($database,trim($_POST['Direction_Amharic']));
				}


			}
			else if(($_POST['Building'] != 'NOT_FILLED')){

				//indicates the company is in a building
				$with_building = TRUE;
				//1 get the building id
				if(empty($_POST['Building']) OR ($_POST['Building'] == 'NOT_FILLED')){
					$errors[] = "Choose which building the company is found";
				}
				else{
					$Building_ID = mysqli_real_escape_string($database,trim($_POST['Building']));
				}

				//get the floor 
				if(empty($_POST['Building_Floor']) OR ($_POST['Building_Floor'] == 'NOT_FILLED')){
					$errors[] = "Building Floor should be filled";
				}
				else{
					$Building_Floor =mysqli_real_escape_string($database,trim($_POST["Building_Floor"]));
				}


			}


			//concerned with contact
			//1 get the house number
			if(empty($_POST['House_Number'])){
				$errors[] = "House number should be filled";
			}
			else{
				$House_Number = mysqli_real_escape_string($database,trim($_POST['House_Number']));
			}

			//2 get the pobox
			if(empty($_POST['POBOX'])){
				$errors[] = "PoBox should be filled";
			}
			else{
				$POBOX = mysqli_real_escape_string($database,trim($_POST['POBOX']));
			}

			//3 get the phone
			if(empty($_POST['Telephone'])){
				$errors[] = "Telephone should be filled";
			}
			else{
				$Telephone = mysqli_real_escape_string($database,trim($_POST['Telephone']));
			}

			//4 get the fax
			if(empty($_POST['FAX'])){
				$errors[] = "Fax should be filled";
			}
			else{
				$FAX = mysqli_real_escape_string($database,trim($_POST['FAX']));
			}

			//5 get the email
			if(empty($_POST['Email'])){
				$errors[] = "Email should be filled";
			}
			else{
				$Email = mysqli_real_escape_string($database,trim($_POST['Email']));
			}

			//1 get the Category ID
			if(empty($_POST['Category']) OR ($_POST['Category'] == 'NOT_FILLED') ){
				$errors[] = "Category should be filled";
			}
			else{
				$Category_ID = mysqli_real_escape_string($database,trim($_POST['Category']));
			}

			//2    get the company type
			if(empty($_POST['Company_Type']) OR ($_POST['Company_Type'] == 'NOT_FILLED') ){
				$errors[] = "Company type should be filled";
			}
			else{
				$Company_Type_ID =mysqli_real_escape_string($database,trim($_POST["Company_Type"]));
			}

			//3 get the company name
			if(empty($_POST['Company_Name'])){
				$errors[] = "Company name should be filled";
			}
			else{
				$Company_Name = mysqli_real_escape_string($database,trim($_POST['Company_Name']));
			}

			//4 get the company name in amharic
			if(empty($_POST['Company_Name_Amharic'])){
				$errors[] = "Company name in amharic should be filled";
			}
			else{
				$Company_Name_Amharic = mysqli_real_escape_string($database,trim($_POST['Company_Name_Amharic']));
			}

			//5 get the company working hours
			if(empty($_POST['Working_Hours'])){
				$errors[] = "Working hours should be filled";
			}
			else{
				$Working_Hours = mysqli_real_escape_string($database,trim($_POST['Working_Hours']));
			}

			//6 get the working hours in amharic
			if(empty($_POST['Working_Hours_Amharic'])){
				$errors[] = "Working hours in amharic should be filled";
			}
			else{
				$Working_Hours_Amharic = mysqli_real_escape_string($database,trim($_POST['Working_Hours_Amharic']));
			}

			//7 get the company service and products
			if(empty($_POST['Product_Description_And_Service'])){
				$errors[] = "Company product description should be filled";
			}
			else{
				$Product_Description_And_Service = mysqli_real_escape_string($database,trim($_POST['Product_Description_And_Service']));
			}

			//8 get the company service and products in amharic
			if(empty($_POST['Product_Description_And_Service_Amharic'])){
				$errors[] = "Company product description should be filled in amharic";
			}
			else{
				$Product_Description_And_Service_Amharic =
					mysqli_real_escape_string($database,trim($_POST['Product_Description_And_Service_Amharic']));
			}

			//9 get the branch
			if(empty($_POST['Branch'])){
				$errors[] = "Branch should be filled";
			}
			else{
				$Branch = mysqli_real_escape_string($database,trim($_POST['Branch']));
			}

			//10 get the Branch in Amharic
			if(empty($_POST['Branch_Amharic'])){
				$errors[] = "Branch in Amharic should be filled";
			}
			else{
				$Branch_Amharic = mysqli_real_escape_string($database,trim($_POST['Branch_Amharic']));
			}

			//get the registration type

			if(isset($_POST['Registration_Type'])){
				$Registration_Type = $_POST['Registration_Type'];
			}
			else{
				$errors[] = "Registration type should be filled";
			}

			//12 get the expiration date
			if(empty($_POST['Registration_Expiration_Date'])){
				$errors[] = "Registration expiration date should be filled";
			}
			else{
				$Registration_Expiration_Date =
					mysqli_real_escape_string($database,trim($_POST['Registration_Expiration_Date']));
			}

			if(empty($errors)){

//				if(!$with_building){
//					//connected with place
//					echo(" Region ID = $Region_ID");
//					echo("<br/>");
//					echo(" City ID = $City_ID");
//					echo("<br/>");
//					echo(" SubCity ID = $Sub_City_ID");
//					echo("<br/>");
//					echo(" Wereda ID = $Wereda_ID");
//					echo("<br/>");
//					echo(" Sefer ID = $Sefer_ID");
//					echo("<br/>");
//					echo(" Street ID = $Street_ID");
//
//					//connected with direction
//					echo("<br/>");
//					echo(" Direction = $Direction");
//					echo("<br/>");
//					echo(" Direction amh = $Direction_Amharic");
//					echo("<br/>");
//				}
//				else if($with_building){
//					//connected with building
//					echo("<br/>");
//					echo(" Building ID = $Building_ID");
//					echo("<br/>");
//					echo(" Building Floor = $Building_Floor");
//				}
// 			//connected with contact
// 				echo(" POBOX = $POBOX");
//				echo("<br/>");
//				echo(" Phone = $Telephone");
//				echo("<br/>");
//				echo(" FAX = $FAX");
//				echo("<br/>");
//				echo(" Email = $Email");
//				echo("<br/>");
//				echo(" house number = $House_Number");
//				echo("<br/>");
//
//				//connected with company
//				echo(" Company Name = $Company_Name");
//				echo("<br/>");
//				echo(" Company Name amh = $Company_Name_Amharic");
//				echo("<br/>");
//
//				//connected with company type and its category
//				echo("Company type id = $Company_Type_ID");
//				echo("<br/>");
//				echo(" Category = $Category_ID");
//				echo("<br/>");
//
//				//connected with company product and service
//				echo(" Company product and Service = $Product_Description_And_Service");
//				echo("<br/>");
//				echo(" Company product and Service Amharic = $Product_Description_And_Service_Amharic");
//				echo("<br/>");
//
//				//connected with about company
//				echo(" Branch = $Branch");
//				echo("<br/>");
//				echo(" Branch Amh =$Branch_Amharic");
//				echo("<br/>");
//				echo(" Working Hours = $Working_Hours");
//				echo("<br/>");
//				echo(" Working Hours Amh = $Working_Hours_Amharic");
//				echo("<br/>");
//
//				//connected with payment status
//				echo("Registration Expiration Date =$Registration_Expiration_Date");

				$Company_ID = $_POST["Company_ID"];
				$About_Company_ID = $_POST["About_Company_ID"];
				$Payment_Status_ID = $_POST["Payment_Status_ID"];
				$Company_Service_ID = $_POST["Company_Service_ID"];
				$Company_Ownership_ID = $_POST['Company_Ownership_ID'];
				$Company_Category_ID = $_POST['Company_Category_ID'];
				$Contact_ID = $_POST['Contact_ID'];

				$Company_C = new Company($Company_Name,$Company_Name_Amharic);
				if($encoder_con->Company_Exists_For_Edit($Company_C,$Company_ID)){
					encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA);
				}

				$Contact_C = new Contact($Email,$House_Number,$FAX,$POBOX,$Telephone);


				if($with_building){


					//if it was on building before
					if(isset($_POST["Address_Building_Floor_ID"])){

						$Address_Building_Floor_ID = $_POST["Address_Building_Floor_ID"];

						$added = $encoder_con->Edit_Company_With_Building(
							$Company_Name,$Company_Name_Amharic,
							$Category_ID,$Company_Type_ID,
							$Branch,$Branch_Amharic,
							$Working_Hours,$Working_Hours_Amharic,
							$Product_Description_And_Service,$Product_Description_And_Service_Amharic,
							$Registration_Expiration_Date,$Registration_Type,$Building_ID,$Building_Floor,
							$Contact_C,$Company_ID,$About_Company_ID,$Payment_Status_ID,
							$Company_Service_ID,$Company_Ownership_ID,$Company_Category_ID,
							$Contact_ID,$Address_Building_Floor_ID);

					}

					//if it was not on building before
 					else if(!isset($_POST["Address_Building_Floor_ID"])){

					    $Direction_ID = $_POST['Direction_ID'];
					    $Place_ID = $_POST['Place_ID'];





					    $added = $encoder_con->Edit_Company_With_Out_Building_To_Building(
						    $Company_Name,$Company_Name_Amharic,
						    $Category_ID,$Company_Type_ID,$Branch,$Branch_Amharic,
					        $Working_Hours,$Working_Hours_Amharic,
						    $Product_Description_And_Service,$Product_Description_And_Service_Amharic,
						    $Registration_Expiration_Date,$Registration_Type,
						    $Building_ID,$Building_Floor,
						    $Contact_C,
						    $Company_ID,$About_Company_ID,
						    $Payment_Status_ID,$Company_Service_ID,
						    $Company_Ownership_ID,$Company_Category_ID,
						    $Contact_ID,$Direction_ID,$Place_ID
						    );


					}



				}

				else if(!$with_building){

					$Place_C = new Place($Region_ID,$City_ID,$Sub_City_ID,$Wereda_ID,$Sefer_ID,$Street_ID);

					//if the company was not on a building before
					if(isset($_POST['Place_ID'])){

						$Direction_ID = $_POST['Direction_ID'];
						$Place_ID = $_POST['Place_ID'];


						$added = $encoder_con->Edit_Company_With_Out_Building(
							$Company_Name,$Company_Name_Amharic,
							$Category_ID,$Company_Type_ID,
							$Branch,$Branch_Amharic,
							$Working_Hours,$Working_Hours_Amharic,
							$Product_Description_And_Service,$Product_Description_And_Service_Amharic,
							$Registration_Expiration_Date,$Registration_Type,$Contact_C,
							$Place_C,$Direction,$Direction_Amharic,
							$Company_ID,$About_Company_ID,$Payment_Status_ID,
							$Company_Service_ID,$Company_Ownership_ID,
							$Company_Category_ID,$Contact_ID,
							$Direction_ID,$Place_ID);
					}

					//if the company was o a building before

					else if(!isset($_POST['Place_ID'])){


						$added = $encoder_con->Edit_Company_With_Building_To_Not_Building(
							$Company_Name,$Company_Name_Amharic,
							$Category_ID,$Company_Type_ID,$Branch,$Branch_Amharic,
							$Working_Hours,$Working_Hours_Amharic,
							$Product_Description_And_Service,$Product_Description_And_Service_Amharic,
							$Registration_Expiration_Date,$Registration_Type,
							$Contact_C,$Place_C,$Direction,$Direction_Amharic,
							$Company_ID,$About_Company_ID,$Payment_Status_ID,
							$Company_Service_ID,$Company_Ownership_ID,$Company_Category_ID,$Contact_ID);


					}


				}

				if($added){
					encoder_redirect_success($Company_C);
				}
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


