<?php

require("Require.php");


include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object
	//get the id of the building
	if(isset($_GET['Building_ID'])){
		$Building_ID = $_GET['Building_ID'];
	}

	$Regions = $encoder->Get_Regions();         //gets the region
	$City = $encoder->Get_City();               //gets the city
	$Sub_City = $encoder->Get_Sub_City();       //gets the sub city
	$Wereda = $encoder->Get_Wereda();           //gets the wereda
	$Sefer = $encoder->Get_Sefer();             //gets the sefer
	$Street = $encoder->Get_Streets();          //gets the street name



$Building = $encoder->Get_Building_For_Edit($Building_ID);
	$Building = mysqli_fetch_array($Building,MYSQLI_ASSOC);

	$Building_Name = $Building['Building_Name'];
	$Building_Name_Amharic = $Building['Building_Name_Amharic'];
	$Building_Description = $Building['Building_Description'];
	$Building_Description_Amharic = $Building['Building_Description'];
	$Parking_Area = $Building["Parking_Area"];

	$Place_ID_E = $Building['Place_ID'];
	$Region_ID_E = $Building['Region'];
	$City_ID_E = $Building['City'];
	$Sub_City_ID_E = $Building['Sub_City'];
	$Wereda_ID_E =$Building['Wereda'];
	$Sefer_ID_E = $Building['Sefer'];
	$Street_ID_E =$Building['Street'];

	$Direction_ID_E = $Building['DIR_ID'];
	$Direction_E = $Building['Direction'];
	$Direction_Amharic_E = $Building['Direction_Amharic'];


$Buildings = $encoder->Get_Building_For_Listing();


?>



<div class="col-sm-7 list_container margin_0">

<div class="col-sm-12">

<div class="panel panel-default">
	<div class="panel-body text-center">
		<h4>Add Building</h4>

	</div>
</div>


<!--start of the feedback place-->
<?php

/**
 * if the get server request method has error set
 * inform the admin about the user
 */
if($_SERVER['REQUEST_METHOD'] == "GET") {

	if(isset($_GET['error'])){
		$error_msg = $_GET['error'];
		?>

		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Warning!</strong><?php echo($error_msg);?>
		</div>

	<?php
	}

	if(isset($_GET['success'])){
		$building_name = $_GET["building_name"];
		$building_name_amharic = $_GET["building_name_amharic"];
		?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>You have added a new building successfully.</strong>
			<br/>New Building --- <?php echo("$building_name ($building_name_amharic)");?>
			<br/>
		</div>
	<?php
	}
}
?>

<div class=" margin_top_20">

<div class="panel panel-primary">
<div class="panel-heading">
	<h3 class="panel-title">Building Address</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" role="form"
      action="../../../../CONTROLLER/Encoder/Edit_Building.php" method="POST">


<div class="form-group">
	<label for="Region" class="col-sm-4 control-label">Region</label>
	<div class="col-sm-5">
		<select class="form-control" id="Region" name="Region">
			<option value="NOT_FILLED" >- - - - - - - select region</option>
			<?php
			$Region_ID = "";
			$Region_Name = "";

			if($Regions){
				while($reg = mysqli_fetch_array($Regions,MYSQLI_ASSOC)){
					$Region_ID = $reg['ID'];
					$Region_Name = $reg['Name'];

					?>
					<option value="<?php echo($Region_ID);?>" <?php if($Region_ID == $Region_ID_E){
						echo("selected");
					} ?> > <?php echo($Region_Name);?></option>
				<?php
				}
			}

			?>

		</select>
	</div>
	<div class="col-sm-2">

		<a href="../Add_Place/Add_Place_Region_inc.php" class="btn btn-info">new</a>
	</div>
</div>

<div class="form-group">
	<label for="City" class="col-sm-4 control-label">City</label>
	<div class="col-sm-5">
		<select class="form-control" id="City" name="City">
			<option value="NOT_FILLED">- - - - - - - select city</option>
			<?php
			$City_ID = "";
			$City_Name = "";

			if($City){
				while($cit = mysqli_fetch_array($City,MYSQLI_ASSOC)){
					$City_ID = $cit['ID'];
					$City_Name = $cit['Name'];

					?>
					<option value="<?php echo($City_ID);?>"  <?php if($City_ID == $City_ID_E){
						echo("selected");
					}?>><?php echo($City_Name);?></option>
				<?php
				}
			}

			?>

		</select>
	</div>
	<div class="col-sm-2">
		<a href="../Add_Place/Add_Place_City_inc.php" class="btn btn-info">new</a>
	</div>
</div>

<div class="form-group">
	<label for="Sub_City" class="col-sm-4 control-label">Sub City</label>
	<div class="col-sm-5">
		<select class="form-control" id="Sub_City" name="Sub_City">
			<option value="NOT_FILLED">- - - - - - - select Sub city</option>
			<?php
			$SubCity_ID = "";
			$SubCity_Name = "";

			if($Sub_City){
				while($SubCit = mysqli_fetch_array($Sub_City,MYSQLI_ASSOC)){
					$SubCity_ID = $SubCit['ID'];
					$SubCity_Name = $SubCit['Name'];
					?>
					<option value="<?php echo($SubCity_ID);?>" <?php if($SubCity_ID == $Sub_City_ID_E){
						echo("selected");
					}?> ><?php echo($SubCity_Name);?></option>
				<?php
				}
			}

			?>
		</select>

	</div>
	<div class="col-sm-2">
		<a href="../Add_Place/Add_Place_Sub_City_inc.php" class="btn btn-info">new</a>
	</div>
</div>

<div class="form-group">
	<label for="Wereda" class="col-sm-4 control-label">Kebele/Wereda</label>
	<div class="col-sm-5">
		<select class="form-control" id="Wereda" name="Wereda">
			<option value="NOT_FILLED">- - - - - - - select Wereda/Kebele</option>
			<?php
			$Wereda_ID = "";
			$Wereda_Name = "";

			if($Wereda){
				while($Wer = mysqli_fetch_array($Wereda,MYSQLI_ASSOC)){
					$Wereda_ID = $Wer['ID'];
					$Wereda_Name = $Wer['Name'];
					?>
					<option value="<?php echo($Wereda_ID);?>" <?php if($Wereda_ID == $Wereda_ID_E){
						echo("selected");
					}?> ><?php echo($Wereda_Name);?></option>
				<?php
				}
			}
			?>
		</select>
	</div>
	<div class="col-sm-2">
		<a href="../Add_Place/Add_Place_Wereda_inc.php" class="btn btn-info">new</a>
	</div>
</div>

<div class="form-group">
	<label for="Sefer" class="col-sm-4 control-label">Sefer</label>
	<div class="col-sm-5">
		<select class="form-control" id="Sefer" name="Sefer">
			<option value="NOT_FILLED" class="not_filled">- - - - - - - select sefer</option>
			<?php
			$Sefer_ID = "";
			$Sefer_Name = "";

			if($Sefer){
				while($sef = mysqli_fetch_array($Sefer,MYSQLI_ASSOC)){
					$Sefer_ID = $sef['ID'];
					$Sefer_Name = $sef['Name'];
					?>
					<option value="<?php echo($Sefer_ID);?>" <?php if($Sefer_ID == $Sefer_ID_E){
						echo("selected");
					}?>  ><?php echo($Sefer_Name);?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<a href="../Add_Place/Add_Place_Sefer_inc.php" class="btn btn-info">new</a>
	</div>
</div>

<div class="form-group">
	<label for="Street" class="col-sm-4 control-label">Street</label>
	<div class="col-sm-5">
		<select class="form-control" id="Street" name="Street">
			<option value="NOT_FILLED">- - - - - - - select Street</option>



			<?php
			$Street_ID = "";
			$Street_Name = "";

			if($Street){
				while($Str = mysqli_fetch_array($Street,MYSQLI_ASSOC)){
					$Street_ID = $Str['ID'];
					$Street_Name = $Str['Name'];

					?>
					<option value="<?php echo($Street_ID);?>" <?php if($Street_ID == $Street_ID_E){
						echo("selected");
					}?>><?php echo($Street_Name);?></option>
				<?php
				}
			}

			?>
		</select>
	</div>
	<div class="col-sm-2">
		<a href="../Add_Place/Add_Place_Street_inc.php" class="btn btn-info">new</a>
	</div>
</div>

<hr>

<div class="form-group">
	<label for="Building_Name" class="col-sm-4 control-label">Building Name</label>
	<div class="col-sm-5">
		<input name="Building_Name" type="text" class="form-control"
		       id="House_NO" placeholder="Enter Building Name" value="<?php echo($Building_Name);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Building_Name_Amharic" class="col-sm-4 control-label">የህንጸ ስም</label>
	<div class="col-sm-5">
		<input name="Building_Name_Amharic" type="text" class="form-control"
		       id="Building_Name_Amharic" placeholder="የህንጸውን ስም ያስገቡ"
		       value="<?php echo($Building_Name_Amharic);?>" >
	</div>
</div>

<div class="form-group">
	<label for="Direction"
	       class="col-sm-4 control-label">Building location Direction</label>
	<div class="col-sm-5">

		<textarea name="Direction" class="form-control"
		          rows="3"  id="Direction"
		          placeholder="Enter the location of the building "><?php echo($Direction_E);?></textarea>

	</div>
</div>

<div class="form-group">
	<label for="Direction_Amharic"
	       class="col-sm-4 control-label">የህንጻ መገኛ አቅጣጫ</label>
	<div class="col-sm-5">

		<textarea name="Direction_Amharic" class="form-control"
		          rows="3"  id="Direction_Amharic"
		          placeholder="የህንጻ መገኛ አቅጣጫዉን ያስግቡ "><?php echo($Direction_Amharic_E);?></textarea>

	</div>
</div>

<div class="form-group">
	<label for="Building_Description"
	       class="col-sm-4 control-label">Building Description</label>
	<div class="col-sm-5">

		<textarea name="Building_Description" class="form-control"
		          rows="3"  id="Building_Description"
		          placeholder="Enter Building Description like color,location to other building "><?php echo($Building_Description);?></textarea>

	</div>
</div>

<div class="form-group">
	<label for="Building_Description_Amharic"
	       class="col-sm-4 control-label">የህንጻው መገለጫ</label>
	<div class="col-sm-5">

		<textarea name="Building_Description_Amharic" class="form-control"
		          rows="3"  id="Building_Description_Amharic"
		          placeholder="የህንጻው መገለጫ ለምሳሌ ቀለም፣ ልዩምልክት "><?php echo($Building_Description_Amharic);?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="Parking_Area"
	       class="col-sm-4 control-label">Parking Area</label>

	<div class="col-sm-4 col-sm-offset-1">

		<div class="col-sm-6">

			<div class="radio">
				<label>
					<input type="radio" value="1" name="Parking_Area" <?php if($Parking_Area == 1){
						echo("checked");
					}?>> yes
				</label>
			</div>


		</div>


		<div class="col-sm-6">

			<div class="radio">
				<label>
					<input type="radio" value="0" name="Parking_Area" <?php if($Parking_Area == 0){
						echo("checked");
					}?> > no
				</label>
			</div>


		</div>

	</div>


</div>

<div class="form-group margin_top_30">

	<div class="col-sm-5 col-lg-offset-4">
		<button type="submit" class="btn btn-success btn-block">
			<strong>Save</strong>
		</button>
	</div>
</div>

<div class="margin_top_70">


	<input type="hidden" name="Building_ID" value="<?php echo($Building_ID);?>">
	<input type="hidden" name="Direction_ID" value="<?php echo($Direction_ID_E);?>">
	<input type="hidden" name="Place_ID" value="<?php echo($Place_ID_E);?>">


</div>



</form>
</div>
</div>



</div>

</div>

</div>


<!--start of the footer-->
<script src="../../../js/jquery.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>


</body>
</html>

