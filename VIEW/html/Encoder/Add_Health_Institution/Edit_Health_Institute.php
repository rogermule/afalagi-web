
<?php
require("Require.php");

include "Encoder_Header.php";
include "Includeables.php";

//checks if the value exists in the specialization array
function exists($value,$array){

	for($i = 0; $i < 5; $i++){
		if($value == $array[$i]){
			return TRUE;
		}
	}
	return FALSE;
}

//in here we are going to fetch data that is going to feel the drop downs
$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

$Regions = $encoder->Get_Regions();      //get regions
$Cities   = $encoder->Get_City();        //get cities
$SubCities = $encoder->Get_Sub_City();   //get sub cities
$Weredas = $encoder->Get_Wereda();       //get weredas
$Sefers = $encoder->Get_Sefer();        //get sefer
$buildings = $encoder->Get_Buildings();  //get the buildings
$Street = $encoder->Get_Streets();       //get street
$categories = $encoder->GetGeneralCategory(GeneralCategory::HEALTH);//get category that are in a generic health category
$company_ownership = $encoder->Get_Ownerships();//get different type of ownership

if($_SERVER['REQUEST_METHOD']== 'GET'){

	if(isset($_GET['CA'])){

		$Company_ID = $_GET['company_id'];
		$single_company = $encoder->Get_Company_With_Out_Building($Company_ID);
		$Company_Spec = mysqli_fetch_array($single_company,MYSQLI_ASSOC);

		//get place
		$Com_Region_ID = $Company_Spec["Region"];
		$Com_City_ID = $Company_Spec["City"];
		$Com_Sub_City_ID = $Company_Spec["Sub_City"];
		$Com_Sefer_ID = $Company_Spec["Sefer"];
		$Com_Wereda_ID = $Company_Spec["Wereda"];
		$Com_Street_ID = $Company_Spec["Street"];
		$Com_Direction = $Company_Spec["Direction"];
		$Com_Direction_Amharic = $Company_Spec["Direction_Amharic"];

		//contact
		$Com_House_No = $Company_Spec["House_No"];
		$Com_POBOX = $Company_Spec["POBOX"];
		$Com_Telephone = $Company_Spec["Telephone"];
		$Com_Fax = $Company_Spec["FAX"];
		$Com_Email = $Company_Spec["Email"];

		//get category and type
		$Com_Category_ID = $Company_Spec["Category_ID"];
		$Com_Company_Type_ID = $Company_Spec["Company_Type_ID"];

		//about company
		$Com_Company_Name = $Company_Spec["Company_Name"];
		$Com_Company_Name_Amharic = $Company_Spec["Company_Name_Amharic"];
		$Com_Working_Hours = $Company_Spec["Working_Hours"];
		$Com_Working_Hours_Amharic = $Company_Spec["Working_Hours_Amharic"];
		$Com_Company_Service = $Company_Spec["Product_Service"];
		$Com_Company_Service_Amharic = $Company_Spec["Product_Service_Amharic"];
		$Com_Branch = $Company_Spec["Branch"];
		$Com_Branch_Amharic = $Company_Spec["Branch_Amharic"];
		$Com_Expiration_Date = $Company_Spec["Expiration_Date"];
		$Com_Registration_Type = $Company_Spec["Registration_Type"];


		//right_side
		$About_Company_ID = $Company_Spec["About_Company_ID"];
		$Payment_Status_ID = $Company_Spec["Payment_Status_ID"];
		$Company_Service_ID = $Company_Spec["Company_Service_ID"];
		$Company_Ownership_ID =$Company_Spec["Company_Ownership_ID"];
		$Company_Category_ID = $Company_Spec["Company_Category_ID"];
		$Contact_ID = $Company_Spec["Contact_ID"];

		//left side
		$Direction_ID = $Company_Spec["Direction_ID"];
		$Place_ID = $Company_Spec["Place_ID"];



	}
	else if(isset($_GET['CB'])){

		$Company_ID = $_GET['company_id'];
		$single_company = $encoder->Get_Company_With_Building($Company_ID);
		$Company_Spec = mysqli_fetch_array($single_company,MYSQLI_ASSOC);

		//company spec
		$Com_Company_Name = $Company_Spec["Company_Name"];
		$Com_Company_Name_Amharic = $Company_Spec["Company_Name_Amharic"];
		$Com_Working_Hours = $Company_Spec["Working_Hours"];
		$Com_Working_Hours_Amharic = $Company_Spec["Working_Hours_Amharic"];
		$Com_Company_Service = $Company_Spec["Product_Service"];
		$Com_Company_Service_Amharic = $Company_Spec["Product_Service_Amharic"];
		$Com_Branch = $Company_Spec["Branch"];
		$Com_Branch_Amharic = $Company_Spec["Branch_Amharic"];
		$Com_Expiration_Date = $Company_Spec["Expiration_Date"];
		$Com_Registration_Type = $Company_Spec["Registration_Type"];

		//contact
		$Com_House_No = $Company_Spec["House_No"];
		$Com_POBOX = $Company_Spec["POBOX"];
		$Com_Telephone = $Company_Spec["Telephone"];
		$Com_Fax = $Company_Spec["FAX"];
		$Com_Email = $Company_Spec["Email"];
		$Com_Category_ID = $Company_Spec["Category_ID"];
		$Com_Company_Type_ID = $Company_Spec["Company_Type_ID"];
		$Com_Floor = $Company_Spec["Floor"];
		$Com_Building_ID = $Company_Spec["Building_ID"];

		//left_side
		$About_Company_ID = $Company_Spec["About_Company_ID"];
		$Payment_Status_ID = $Company_Spec["Payment_Status_ID"];
		$Company_Service_ID = $Company_Spec["Company_Service_ID"];
		$Company_Ownership_ID =$Company_Spec["Company_Ownership_ID"];
		$Company_Category_ID = $Company_Spec["Company_Category_ID"];
		$Contact_ID = $Company_Spec["Contact_ID"];

		//building stuff
		$Address_Building_ID = $Company_Spec["Address_Building_Floor_ID"];
		$Building_ID = $Company_Spec["Building_ID"];
		$Floor =$Company_Spec["Floor"];

	}


	//this are the specialization of the generic group health
	$specialization = $encoder->GetSpecialization(GeneralCategory::HEALTH);
	//there are the specialization of the company
	$company_specialization = $encoder->Get_Company_Specialization($Company_ID);

	$spec_array = array();
	$Spec_1 =  $company_specialization['Spec_1'];
	$spec_array[] = $Spec_1;
	$Spec_2 =  $company_specialization['Spec_2'];
	$spec_array[] = $Spec_2;
	$Spec_3 =  $company_specialization['Spec_3'];
	$spec_array[] = $Spec_3;
	$Spec_4 =  $company_specialization['Spec_4'];
	$spec_array[] = $Spec_4;
	$Spec_5 =  $company_specialization['Spec_5'];
	$spec_array[] = $Spec_5;


}

?>

<div class="col-sm-7 list_container margin_0">

<div class="col-sm-12">

<div class="panel panel-default">
	<div class="panel-body text-center">

		<h4>Edit Health Instituite (የጤና ተቋማት ማስተካከያ)</h4>

	</div>
</div>




<div class=" margin_top_20">

<div class="panel panel-primary">
<div class="panel-heading">
	<h3 class="panel-title">Add Company</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" role="form"
      action="../../../../CONTROLLER/Encoder/Edit_Company.php" method="POST">

<div>
<div class="form-group">
	<label for="Building" class="col-sm-4 control-label">Building(ህንጻ)</label>
	<div class="col-sm-6">
		<select class="form-control " id="Building" name="Building">
			<option value="NOT_FILLED">- - - - - - - select building</option>
			<?php
			$Building_ID = "";
			$Building_Name = "";
			$Building_Name_Amharic = "";

			if($buildings){
				while($bul = mysqli_fetch_array($buildings,MYSQLI_ASSOC)){
					$Building_ID = $bul['ID'];
					$Building_Name = $bul['Name'];
					$Building_Name_Amharic = $bul['Name_Amharic'];

					?>
					<option <?php

					if(  isset($_GET['CB'])){
						if($Building_ID == $Com_Building_ID){
							echo("selected");
						}
					}

					?>  value="<?php echo($Building_ID);?>"><?php echo($Building_Name." (".$Building_Name_Amharic.") ");?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>
			<a href="../Add_Building/Add_Building.php" class="btn btn-info">new</a>

		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Building_Floor" class="col-sm-4 control-label">Building Floor (ፍሎር)</label>
	<div class="col-sm-6">
		<select class="form-control" id="Building_Floor" name="Building_Floor">

			<option value="NOT_FILLED">- - - - - - - select Floor</option>
			<option value="THE_WHOLE_FLOOR" <?php
			if(  isset($_GET['CB'])){
				$Value = "THE_WHOLE_FLOOR";
				if($Com_Floor == $Value){
					echo("selected");
				}
			}
			?>>THE WHOLE FLOOR</option>

			<?php
			$count = 0;
			while($count<50){
				$value = "$count Floor";
				?>
				<option
					<?php
					if(  isset($_GET['CB'])){
						if($Com_Floor == $value){
							echo("selected");
						}
					}
					?>
					value="<?php echo("$count Floor");?>">
					<?php echo("$count Floor");?>
				</option>
				<?php
				$count++;
			}
			?>


		</select>
	</div>

</div>

<hr>

<div class="form-group">
	<label for="Region" class="col-sm-4 control-label">Region (ክልል)</label>
	<div class="col-sm-6">
		<select class="form-control place" id="Region" name="Region"  >

			<option value="NOT_FILLED" >- - - - - - - select region</option>
			<?php
			$Region_ID = "";
			$Region_Name = "";
			$Region_Name_Amharic = "";

			if($Regions){
				while($reg = mysqli_fetch_array($Regions,MYSQLI_ASSOC)){
					$Region_ID = $reg['ID'];
					$Region_Name = $reg['Name'];
					$Region_Name_Amharic = $reg['Name_Amharic'];

					?>
					<option <?php

					if(isset($_GET['CA'])){
						if($Region_ID == $Com_Region_ID){
							echo("selected");
						}
					}


					?> value="<?php echo($Region_ID);?>"> <?php echo($Region_Name." (".$Region_Name_Amharic." )");?> </option>
				<?php
				}
			}

			?>

		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Place/Add_Place_Region_inc.php" class="btn btn-info place">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="City" class="col-sm-4 control-label">City (ከተማ)</label>
	<div class="col-sm-6">
		<select class="form-control place" id="City" name="City">
			<option value="NOT_FILLED">- - - - - - - select city</option>
			<?php
			$City_ID = "";
			$City_Name = "";
			$City_Name_Amharic = "";
			if($Cities){
				while($cit = mysqli_fetch_array($Cities,MYSQLI_ASSOC)){
					$City_ID = $cit['ID'];
					$City_Name = $cit['Name'];
					$City_Name_Amharic = $cit['Name_Amharic'];

					?>
					<option <?php
					if(isset($_GET['CA'])){
						if($City_ID == $Com_City_ID){
							echo("selected");
						}
					}


					?> value="<?php echo($City_ID);?>"><?php echo($City_Name." (".$City_Name_Amharic." )");?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Place/Add_Place_City_inc.php" class="btn btn-info place">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Sub_City" class="col-sm-4 control-label">Sub City (ክ/ከተማ)
	</label>
	<div class="col-sm-6">
		<select class="form-control place" id="Sub_City" name="Sub_City">

			<option value="NOT_FILLED">- - - - - - - select Sub city</option>
			<?php
			$SubCity_ID = "";
			$SubCity_Name = "";
			$SubCity_Name_Amharic = "";

			if($SubCities){
				while($SubCit = mysqli_fetch_array($SubCities,MYSQLI_ASSOC)){
					$SubCity_ID = $SubCit['ID'];
					$SubCity_Name = $SubCit['Name'];
					$SubCity_Name_Amharic = $SubCit['Name_Amharic'];
					?>
					<option <?php

					if(isset($_GET['CA'])){
						if($SubCity_ID == $Com_Sub_City_ID){
							echo("selected");
						}
					}
					?>  value="<?php echo($SubCity_ID);?>"><?php echo($SubCity_Name."( ".$SubCity_Name_Amharic." )");?></option>
				<?php
				}
			}

			?>

		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Place/Add_Place_Sub_City_inc.php" class="btn btn-info place">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Wereda" class="col-sm-4 control-label">Wereda (ወረዳ) </label>
	<div class="col-sm-6">
		<select class="form-control place" id="Wereda" name="Wereda">
			<option value="NOT_FILLED">- - - - - - - select Kebele/Wereda</option>
			<?php
			$Wereda_ID = "";
			$Wereda_Name = "";


			if($Weredas){
				while($Wer = mysqli_fetch_array($Weredas,MYSQLI_ASSOC)){
					$Wereda_ID = $Wer['ID'];
					$Wereda_Name = $Wer['Name'];
					?>
					<option <?php

					if(isset($_GET['CA'])){
						if($Wereda_ID == $Com_Wereda_ID){
							echo("selected");
						}
					}


					?>  value="<?php echo($Wereda_ID);?>"><?php echo($Wereda_Name);?></option>
				<?php
				}
			}
			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Place/Add_Place_Wereda_inc.php" class="btn btn-info place">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Sefer" class="col-sm-4 control-label">Sefer (ሰፈር)</label>
	<div class="col-sm-6">
		<select class="form-control place" id="Sefer" name="Sefer">
			<option value="NOT_FILLED">- - - - - - - select sefer</option>
			<?php
			$Sefer_ID = "";
			$Sefer_Name = "";
			$Sefer_Name_Amharic ="";

			if($Sefers){
				while($sef = mysqli_fetch_array($Sefers,MYSQLI_ASSOC)){
					$Sefer_ID = $sef['ID'];
					$Sefer_Name = $sef['Name'];
					$Sefer_Name_Amharic = $sef['Name_Amharic'];
					?>
					<option <?php
					if(isset($_GET['CA'])){
						if($Sefer_ID == $Com_Sefer_ID){
							echo("selected");
						}
					}
					?> value="<?php echo($Sefer_ID);?>"><?php echo($Sefer_Name." (".$Sefer_Name_Amharic." )");?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Place/Add_Place_Sefer_inc.php" class="btn btn-info place">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Street" class="col-sm-4 control-label">Street (መንገድ)</label>
	<div class="col-sm-6">
		<select class="form-control place" id="Street" name="Street">
			<option value="NOT_FILLED">- - - - - - - select street</option>

			<?php
			$Street_ID = "";
			$Street_Name = "";
			$Street_Name_Amharic = "";

			if($Street){
				while($str = mysqli_fetch_array($Street,MYSQLI_ASSOC)){
					$Street_ID = $str['ID'];
					$Street_Name = $str['Name'];
					$Street_Name_Amharic = $str['Name_Amharic'];

					?>
					<option <?php

					if(isset($_GET['CA'])){
						if($Street_ID == $Com_Street_ID){
							echo("selected");
						}
					}


					?> value="<?php echo($Street_ID);?>"><?php echo($Street_Name." (".$Street_Name_Amharic." )");?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Place/Add_Place_Street_inc.php" class="btn btn-info place">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Direction"
	       class="col-sm-4 control-label">Direction to the company</label>
	<div class="col-sm-6">

		<textarea name="Direction" class="form-control place"
		          rows="3"  id="Direction"
		          placeholder="Enter the direction to the companies location"><?php if(isset($_GET['CA'])){echo($Com_Direction);}?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="Direction_Amharic"
	       class="col-sm-4 control-label ">አቅጣጫ</label>
	<div class="col-sm-6">

		<textarea name="Direction_Amharic" class="form-control place"
		          rows="3"  id="Direction_Amharic"
		          placeholder="የድርጅቱን መገኛ አቅጣጫ ያሰገቡ"><?php if(isset($_GET['CA'])){echo($Com_Direction_Amharic);}?></textarea>
	</div>
</div>

<hr>

<div class="form-group">
	<label for="House_Number" class="col-sm-4 control-label">House number (የቤት ቁጥር)</label>
	<div class="col-sm-6">
		<input name="House_Number" type="text" class="form-control"
		       id="House_Number" placeholder="Enter House Number" value="<?php echo($Com_House_No);?>">
	</div>
</div>

<div class="form-group">
	<label for="POBOX" class="col-sm-4 control-label">PO-BOX (ፓስታ)</label>
	<div class="col-sm-6">
		<input name="POBOX" type="text" class="form-control"
		       id="POBOX" placeholder="Enter POBOX" value="<?php echo($Com_POBOX);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Telephone" class="col-sm-4 control-label">Telephone (ስልክ)</label>
	<div class="col-sm-6">
		<input name="Telephone" type="text" class="form-control"
		       id="Telephone" placeholder="Enter Phone" value="<?php echo($Com_Telephone);?>" >
	</div>
</div>

<div class="form-group">
	<label for="FAX" class="col-sm-4 control-label">FAX (ፋክስ)</label>
	<div class="col-sm-6">
		<input name="FAX" type="text" class="form-control"
		       id="FAX" placeholder="Enter FAX" value="<?php echo($Com_Fax);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Email" class="col-sm-4 control-label">Email/Website(ኢሜል/ድህረ ገጸ)</label>
	<div class="col-sm-6">
		<input name="Email" type="text" class="form-control"
		       id="Email" placeholder="Enter Email web site" value="<?php echo($Com_Email);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Category" class="col-sm-4 control-label">Category (የስራ መስክ)</label>
	<div class="col-sm-6">
		<select class="form-control" id="Category" name="Category">
			<option value="NOT_FILLED">- - - - - - - select category</option>
			<?php
			$Category_ID = "";
			$Category_Name = "";
			$Category_Name_Amharic = "";

			if($categories){
				while($cat = mysqli_fetch_array($categories,MYSQLI_ASSOC)){
					$Category_ID = $cat['ID'];
					$Category_Name = $cat['Name'];
					$Category_Name_Amharic = $cat['Name_Amharic'];

					?>
					<option  <?php

					if($Category_ID == $Com_Category_ID){
						echo("selected");
					}

					?>  value="<?php echo($Category_ID);?>"><?php echo($Category_Name."( ".$Category_Name_Amharic." )");?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>

			<a href="../Add_Category/Add_Category.php" class="btn btn-info">new</a>
		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Company_Type" class="col-sm-4 control-label">Company ownership Type <br> (የድርጅቱ ባለቤትነት)</label>
	<div class="col-sm-6">
		<select class="form-control" id="Company_Type" name="Company_Type">
			<option value="NOT_FILLED">- - - - - - - select company type</option>
			<?php


			$Name = "";
			$Name = "";
			$Name_Amharic  = "";

			if($company_ownership){
				while($com_own = mysqli_fetch_array($company_ownership,MYSQLI_ASSOC)){
					$Own_ID = $com_own["ID"];
					$Name = $com_own["Name"];
					$Name_Amharic = $com_own["Name_Amharic"];
					?>

					<option <?php
					if($Own_ID == $Com_Company_Type_ID){
						echo("selected");
					}
					?> value="<?php echo($Own_ID);?>"><?php echo($Name." ( ".$Name_Amharic." )");?></option>

				<?php
				}
			}
			?>
		</select>
	</div>
	<div class="col-sm-2">
		<?php if(get_encoder_type() == User_Type::ENCODER){


			?>
			<a href="../Add_Ownership/Add_Ownership.php" class="btn btn-info">new</a>

		<?php
		}?>

	</div>
</div>

<div class="form-group">
	<label for="Specialization" class="col-sm-4 control-label">Specialization (የስራ መስክ ስፔሻላይዜሽን) </label>
	<div class="col-sm-6">

		<?php
		$Name = "";
		$Name_Amharic = "";
		$S_ID = "";
		if($specialization){
			while($spec = mysqli_fetch_array($specialization,MYSQLI_ASSOC)){
				$S_ID = $spec['ID'];
				$Name = $spec['Name'];
				$Name_Amharic = $spec['Name_Amharic'];
				?>
				<input type="checkbox" value="<?php echo($S_ID);?>" id="<?php echo($S_ID);?>" name="Specialization[]" <?php if(exists($S_ID,$spec_array)){echo("checked");}?>>
				<label for="<?php echo($S_ID);?>"><?php echo($Name.'( '.$Name_Amharic.' )');?></label>
				<br/>
			<?php

			}
		}
		?>
	</div>
</div>
<!--this will notify the edit controller that it is from  specialization view-->
<input type="checkbox" name="with_specialization" hidden="hidden" value="1" checked="checked">
<hr>

<div class="form-group">
	<label for="Company_Name" class="col-sm-4 control-label">Company Name</label>
	<div class="col-sm-6">
		<input name="Company_Name" type="text" class="form-control"
		       id="Company_Name" placeholder="Enter Company Name" value="<?php echo($Com_Company_Name);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Company_Name_Amharic" class="col-sm-4 control-label">የድርጅቱ ስም</label>
	<div class="col-sm-6">
		<input name="Company_Name_Amharic" type="text" class="form-control"
		       id="Company_Name_Amharic" placeholder="የድርጅቱ ስም ያሰገቡ " value="<?php echo($Com_Company_Name_Amharic);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Working_Hours" class="col-sm-4 control-label">Working Hours</label>
	<div class="col-sm-6">
		<input name="Working_Hours" type="text" class="form-control"
		       id="Working_Hours" placeholder="Enter working hours" value="<?php echo($Com_Working_Hours);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Working_Hours_Amharic" class="col-sm-4 control-label">የስራ ሰዓት</label>
	<div class="col-sm-6">
		<input name="Working_Hours_Amharic" type="text" class="form-control"
		       id="Working_Hours_Amharic" placeholder="የስራ ሰዓት ያስገቡ " value="<?php echo($Com_Working_Hours_Amharic);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Product_Description_And_Service"
	       class="col-sm-4 control-label">Company Services</label>
	<div class="col-sm-6">
		<textarea name="Product_Description_And_Service" class="form-control"
		          rows="3"  id="Product_Description_And_Service"
		          placeholder="Enter product description or service"><?php echo($Com_Company_Service);?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="Product_Description_And_Service_Amharic"
	       class="col-sm-4 control-label">የስራ ውጤት ማብራርያ</label>
	<div class="col-sm-6">

		<textarea name="Product_Description_And_Service_Amharic" class="form-control"
		          rows="3"  id="Product_Description_And_Service_Amharic"
		          placeholder="የስራ ውጤት ማብራርያ ያስገቡ"><?php echo($Com_Company_Service_Amharic);?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="Branch" class="col-sm-4 control-label">Branch</label>
	<div class="col-sm-6">
		<input name="Branch" type="text" class="form-control"
		       id="Branch" placeholder="Enter Branch" value="<?php echo($Com_Branch);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Branch_Amharic" class="col-sm-4 control-label">ቅርንጫፍ</label>
	<div class="col-sm-6">
		<input name="Branch_Amharic" type="text" class="form-control"
		       id="Branch" placeholder="ቅርንጫፍ ያስገቡ"  value="<?php echo($Com_Branch_Amharic);?>" >
	</div>
</div>


<div class="form-group margin_top_51">
	<label for="Registration_Expiration_Date"
	       class="col-sm-4 control-label">Registration Type <br> (የምዝገባው አይነት)</label>
	<div class="input-group date  col-sm-5 ">

		<div class="col-sm-12">
			<input  type="radio" name="Registration_Type" id="GOLD" value="GOLD" <?php if($Com_Registration_Type == Registration_Type::GOLD){echo('checked');}?>> <label for="GOLD"> GOLD (ወርቅ)</label>
		</div>

		<div  class="col-sm-12" >
			<input type="radio" name="Registration_Type" id="SILVER" value="SILVER" <?php if($Com_Registration_Type == Registration_Type::SILVER){echo('checked');}?>>
			<label for="SILVER">SILVER (ነሃስ)</label>
		</div>

		<div class="col-sm-12">
			<input  type="radio" name="Registration_Type" id="BRONZE" value="BRONZE" <?php if($Com_Registration_Type == Registration_Type::BRONZE){echo('checked');}?>> <label for="BRONZE">BRONZE (ብር)</label>
		</div>

		<div  class="col-sm-12" >
			<input type="radio" name="Registration_Type" id="NOT_OFFICIAL" value="NOT_OFFICIAL" <?php if($Com_Registration_Type == Registration_Type::NOT_OFFICIAL){echo('checked');}?>>
			<label for="NOT_OFFICIAL">NOT OFFICIAL (ያልከፈለ)</label>
		</div>

	</div>
</div>



<div class="form-group margin_top_51">
	<label for="Registration_Expiration_Date"
	       class="col-sm-4 control-label">Registration Expiration Date</label>
	<div class="input-group date  col-sm-5 ">
		<input name="Registration_Expiration_Date"
		       type="text" class="form-control datepicker"
		       placeholder="yyyy/mm/dd" value="<?php echo($Com_Expiration_Date);?>">
	</div>
</div>
</div>
<?php
if(isset($_GET['CA'])){
	?>
	<input type="hidden" name="Direction_ID" value="<?php echo("$Direction_ID");?>">
	<input type="hidden" name="Place_ID" value="<?php echo("$Place_ID");?>">
<?php
}
if(isset($_GET['CB'])){
	?>

	<input type="hidden" name="Address_Building_Floor_ID" value="<?php echo($Address_Building_ID);?>">
	<input type="hidden" name="Building_ID" value="<?php echo($Building_ID);?>">
	<input type="hidden" name="Floor" value="<?php echo($Floor);?>">

<?php
}
?>
<input type="hidden" name="Company_ID" value="<?php echo($Company_ID);?>">
<input type="hidden" name="About_Company_ID" value="<?php echo($About_Company_ID);?>">
<input type="hidden" name="Payment_Status_ID" value="<?php echo($Payment_Status_ID);?>">
<input type="hidden" name="Company_Service_ID" value="<?php echo($Company_Service_ID);?>">
<input type="hidden" name="Company_Ownership_ID" value="<?php echo($Company_Ownership_ID);?>">
<input type="hidden" name="Company_Category_ID" value="<?php echo($Company_Category_ID);?>">
<input type="hidden" name="Contact_ID" value="<?php echo("$Contact_ID");?>">

<div class="form-group margin_top_30 margin_bottom_200">

	<div class="col-sm-5 col-lg-offset-4">
		<button type="submit" class="btn btn-success btn-block">
			<strong>Save</strong>
		</button>
	</div>
</div>

</form>



</div>
</div>

</div>

</div>

</div>


<?php

//if the company is found on a building disable the place forms
if(isset($_GET["CB"])){

	?>
	<script>
		$(document).ready( function(){
			Disable_Place_Forms();
		});
		//this will enable place forms
		function Disable_Place_Forms(){
			$(".place").attr('disabled','disabled');
		}

	</script>
<?php
}
?>


<?php
include "Encoder_Footer.php";
?>