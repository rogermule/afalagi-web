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
require("../../MODEL/Building.php");



require("../../MODEL/Address_Contact.php");
require("../../MODEL/Contact.php");
require("../../MODEL/Address_Direction.php");
require("../../MODEL/Direction.php");



require("User_Controller.php");//admin controller is going to extend this class so it should be included
require("All_Controllers.php");
require("../Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../MODEL/User_Type.php");
require("../../MODEL/Error_Type.php");


function encoder_redirect_success(){

	$dir = "VIEW/html/Encoder/Add_Building/Building_List.php?success_edit=1";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions add place
	exit();

}


function encoder_place_redirect($type_of_error,$Building_ID){


	$error_type = "";
	if($type_of_error == Error_Type::FORM){
		$error_type = "Fill out the form  correctly.";
	}
	else if($type_of_error == Error_Type::DATA_BASE){
		$error_type = "Error when adding new Building.";
	}
	else if($type_of_error == Error_Type::SAME_REGISTERED_DATA){
		$error_type = "Error Same Building Name. The Building is Registered Before";
	}
	$dir = "VIEW/html/Encoder/Add_Building/Edit_Building.php?error=$error_type&Building_ID=$Building_ID";
	$url = BASE_URL.$dir;
	header("Location:$url");//redirect the encoder to the regions
	exit();
}



if($_SERVER['REQUEST_METHOD'] == "POST"){



	if(TRUE == check_login_status()){


		$user_type = get_user_type();


		if($user_type == User_Type::ENCODER){


			$encoder = $_SESSION['Logged_In_User'];

			$encoder_con = new Encoder_Controller($encoder);
			$database = $encoder_con->getDbc();

			//get the address of the building

			//get the required id
			if(isset($_POST['Building_ID'])){
				$Building_ID = $_POST['Building_ID'];
			}
			else{
				$errors[] = 'Building id should be set';
			}

			//get the place ID
			if(isset($_POST['Place_ID'])){
				$Place_ID = $_POST['Place_ID'];
			}
			else{
				$errors[] = 'Place id should be filled';
			}

			//get the direction id
 			if(isset($_POST['Direction_ID'])){
				$Direction_ID = $_POST['Direction_ID'];
			}
			else{
				$errors[] = 'Direction id should be filled';
			}



			//1  get the region id
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

			// 5.1 get the street id
			if(empty($_POST['Street']) OR ($_POST['Street'] == 'NOT_FILLED')){
				$errors[] = "Choose which street the building is found";
			}
			else{
				$Street_ID = mysqli_real_escape_string($database,trim($_POST["Street"]));

			}


			//6    get the information about the building
			if(empty($_POST['Building_Name'])){
				$errors[] = "Building name should be filled";
			}
			else{
				$Building_Name =mysqli_real_escape_string($database,trim($_POST["Building_Name"]));
			}


			//7    get the building name in amharic
			if(empty($_POST['Building_Name_Amharic'])){
				$errors[] = "Building Name in Amharic should be filled";
			}
			else{
				$Building_Name_Amharic =mysqli_real_escape_string($database,trim($_POST['Building_Name_Amharic'])) ;
			}


			//8     get the direction to the building
			if(empty($_POST['Direction'])){
				$errors[] = "The Direction to the building should be filled";
			}
			else{
				$Direction =mysqli_real_escape_string($database,trim($_POST['Direction']));
			}


			//9     get the location of the building in amharic
			if(empty($_POST['Direction_Amharic'])){
				$errors[] = "The Direction to the building should be filled in amharic";
			}
			else{
				$Direction_Amharic =mysqli_real_escape_string($database,trim($_POST['Direction_Amharic']));
			}



			//12    get te building description
			if(empty($_POST['Building_Description'])){
				$errors[] = "Building description should be filled";
			}
			else{
				$Building_Description =mysqli_real_escape_string($database,trim($_POST["Building_Description"]));
			}


			//13    get the building description in amharic
			if(empty($_POST['Building_Description_Amharic'])){
				$errors[] ="Building Description in amharic should be filled";
			}
			else{
				$Building_Description_Amharic =
					mysqli_real_escape_string($database,trim($_POST['Building_Description_Amharic'])) ;
			}


			//14    get the parking area
			if(!isset($_POST["Parking_Area"])){
				$errors[] = "Parking area form should be filled";
			}
			else{
				$Parking_Area =mysqli_real_escape_string($database,trim($_POST["Parking_Area"]));
			}


			if(empty($errors)){



//				echo(" Region ID = $Region_ID");
//				echo("<br/>");
//				echo(" City ID = $City_ID");
//				echo("<br/>");
//				echo(" SubCity ID = $Sub_City_ID");
//				echo("<br/>");
//				echo(" Wereda ID = $Wereda_ID");
//				echo("<br/>");
//				echo(" Sefer ID = $Sefer_ID");
//				echo("<br/>");
//				echo(" Street ID = $Street_ID");
//				echo("<br/>");
// 				echo("Building Name = $Building_Name");
//				echo("<br/>");
//				echo("Building Name Amharic = $Building_Name_Amharic");
// 				echo("<br/>");
// 				echo("Building Description = $Building_Description");
//				echo("<br/>");
//				echo("Building Description Amh = $Building_Description_Amharic");
//				echo("<br/>");
//				echo("Parking Area = $Parking_Area");
//				echo("<br/>");
//				echo("Building Direction = $Direction");
//				echo("<br/>");
//				echo("Building Direction amh = $Direction_Amharic");


				$Building_C = new Building($Building_Name,$Building_Name_Amharic,$Building_Description,$Building_Description_Amharic,$Parking_Area);

				if($encoder_con->Building_Exists_For_Edit($Building_C,$Building_ID)){
					encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA,$Building_ID);
				}

				$Place_C = new Place($Region_ID,$City_ID,$Sub_City_ID,$Wereda_ID,$Sefer_ID,$Street_ID);
 				$Direction_C = new Direction($Direction,$Direction_Amharic);




				$edited = $encoder_con->Edit_Building($Building_C,$Building_ID,$Place_C,$Place_ID,$Direction_C,$Direction_ID);


				if($edited){
					encoder_redirect_success($Building_C);
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




