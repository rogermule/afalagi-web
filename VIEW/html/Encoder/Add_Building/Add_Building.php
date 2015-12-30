<?php
require("Require.php");

include "Encoder_Header.php";
include "Includeables.php";

//in here we are going to fetch the regions city sub city kebele sefer

		$user = $_SESSION['Logged_In_User'];
		$encoder = new Encoder_Controller($user);//make an encoder object

 		$Regions = $encoder->Get_Regions();         //gets the region
		$City = $encoder->Get_City();               //gets the city
		$Sub_City = $encoder->Get_Sub_City();       //gets the sub city
		$Wereda = $encoder->Get_Wereda();           //gets the wereda
		$Sefer = $encoder->Get_Sefer();             //gets the sefer
		$Street = $encoder->Get_Streets();          //gets the street name

?>

	<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">

	<div class="panel panel-default">
		<div class="panel-body text-center">
			<h4>Add Building ( ህንጻ መጨመርያ )</h4>

		</div>
	</div>


<!--start of the feedback place-->
	<?php
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
			      action="../../../../CONTROLLER/Encoder/Add_Building.php" method="POST">


				<div class="form-group">
					<label for="Region" class="col-sm-4 control-label">Region (ክልል)</label>
					<div class="col-sm-5">
						<select class="form-control" id="Region" name="Region">
							<option value="NOT_FILLED" >- - - - select region (ክልል ይምረጡ)</option>
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
								        <option value="<?php echo($Region_ID);?>"><?php echo($Region_Name." (".$Region_Name_Amharic." )");?></option>
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
					<label for="City" class="col-sm-4 control-label">City (ከተማ)</label>
					<div class="col-sm-5">
						<select class="form-control" id="City" name="City">
							<option value="NOT_FILLED">- - - - select city (ከተማ ይምረጡ)</option>
							<?php
							$City_ID = "";
							$City_Name = "";
							$City_Name_Amharic = "";

							if($City){
								while($cit = mysqli_fetch_array($City,MYSQLI_ASSOC)){
									$City_ID = $cit['ID'];
									$City_Name = $cit['Name'];
									$City_Name_Amharic = $cit['Name_Amharic'];

									?>
									<option value="<?php echo($City_ID);?>"><?php echo($City_Name." (".$City_Name_Amharic." )");?></option>
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
					<label for="Sub_City" class="col-sm-4 control-label">Sub City (ክ/ከተማ)</label>
					<div class="col-sm-5">
						<select class="form-control" id="Sub_City" name="Sub_City">
							<option value="NOT_FILLED">- - - - select Sub city ( ክ/ከተማ ይምረጡ </option>
							<?php
							$SubCity_ID = "";
							$SubCity_Name = "";
							$SubCity_Name_Amharic = "";

							if($Sub_City){
								while($SubCit = mysqli_fetch_array($Sub_City,MYSQLI_ASSOC)){
									$SubCity_ID = $SubCit['ID'];
									$SubCity_Name = $SubCit['Name'];
									$SubCity_Name_Amharic = $SubCit['Name_Amharic'];
									?>
								<option value="<?php echo($SubCity_ID);?>">
									<?php echo($SubCity_Name."( ".$SubCity_Name_Amharic." )");?>
								</option>
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
					<label for="Wereda" class="col-sm-4 control-label">Wereda (ወረዳ)</label>
					<div class="col-sm-5">
						<select class="form-control" id="Wereda" name="Wereda">
							<option value="NOT_FILLED">- - - - select wereda (ወረዳ ይምረጡ) </option>
							<?php
							$Wereda_ID = "";
							$Wereda_Name = "";

							if($Wereda){
								while($Wer = mysqli_fetch_array($Wereda,MYSQLI_ASSOC)){
									$Wereda_ID = $Wer['ID'];
									$Wereda_Name = $Wer['Name'];
									?>
								<option value="<?php echo($Wereda_ID);?>"><?php echo($Wereda_Name);?></option>
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
					<label for="Sefer" class="col-sm-4 control-label">Sefer (ሰፈር)</label>
					<div class="col-sm-5">
						<select class="form-control" id="Sefer" name="Sefer">
							<option value="NOT_FILLED"class="not_filled">- - - - select sefer (ሰፈር ይምረጡ)</option>
							<?php
							$Sefer_ID = "";
							$Sefer_Name = "";
							$Sefer_Name_Amharic ="";

							if($Sefer){
								while($sef = mysqli_fetch_array($Sefer,MYSQLI_ASSOC)){
									$Sefer_ID = $sef['ID'];
									$Sefer_Name = $sef['Name'];
									$Sefer_Name_Amharic = $sef['Name_Amharic'];
 									?>
									<option value="<?php echo($Sefer_ID);?>"><?php echo($Sefer_Name." (".$Sefer_Name_Amharic." )");?></option>
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
					<label for="Street" class="col-sm-4 control-label">Street (መንገድ)</label>
					<div class="col-sm-5">
						<select class="form-control" id="Street" name="Street">
							<option value="NOT_FILLED">- - - - select street (መንገድ ይምረጡ)</option>
 							<?php
							$Street_ID = "";
							$Street_Name = "";
						    $Street_Name_Amharic = "";

							if($Street){
								while($Str = mysqli_fetch_array($Street,MYSQLI_ASSOC)){
									$Street_ID = $Str['ID'];
									$Street_Name = $Str['Name'];
									$Street_Name_Amharic = $Str['Name_Amharic'];
									?>
									<option value="<?php echo($Street_ID);?>"><?php echo($Street_Name." (".$Street_Name_Amharic." )");?></option>
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
						       id="House_NO" placeholder="Enter Building Name" >
					</div>
				</div>

				<div class="form-group">
					<label for="Building_Name_Amharic" class="col-sm-4 control-label">የህንጸ ስም</label>
					<div class="col-sm-5">
						<input name="Building_Name_Amharic" type="text" class="form-control"
						       id="Building_Name_Amharic" placeholder="የህንጸውን ስም ያስገቡ" >
					</div>
				</div>

				<div class="form-group">
					<label for="Direction"
					       class="col-sm-4 control-label">Building location Direction</label>
					<div class="col-sm-5">

						<textarea name="Direction" class="form-control"
						          rows="3"  id="Direction"
						          placeholder="Enter the location of the building "></textarea>

					</div>
				</div>

				<div class="form-group">
					<label for="Direction_Amharic"
					       class="col-sm-4 control-label">የህንጻ መገኛ አቅጣጫ</label>
					<div class="col-sm-5">

						<textarea name="Direction_Amharic" class="form-control"
						          rows="3"  id="Direction_Amharic"
						          placeholder="የህንጻ መገኛ አቅጣጫዉን ያስግቡ "></textarea>

					</div>
				</div>

				<div class="form-group">
					<label for="Building_Description"
					       class="col-sm-4 control-label">Building Description</label>
					<div class="col-sm-5">

						<textarea name="Building_Description" class="form-control"
						          rows="3"  id="Building_Description"
						          placeholder="Enter Building Description like color,location to other building "></textarea>

					</div>
				</div>

				<div class="form-group">
				<label for="Building_Description_Amharic"
				       class="col-sm-4 control-label">የህንጻው መገለጫ</label>
				<div class="col-sm-5">

					<textarea name="Building_Description_Amharic" class="form-control"
					          rows="3"  id="Building_Description_Amharic"
					          placeholder="የህንጻው መገለጫ ለምሳሌ ቀለም፣ ልዩምልክት "></textarea>
 				</div>
			</div>

				<div class="form-group">
					<label for="Parking_Area"
					       class="col-sm-4 control-label">Parking Area (ፓርኪንግ ቦታ)</label>

					<div class="col-sm-4 col-sm-offset-1">

						<div class="col-sm-6">

							<div class="radio">
								<label>
									<input type="radio" value="1" name="Parking_Area"> yes(አለው)
								</label>
							</div>


						</div>


						<div class="col-sm-6">

							<div class="radio">
								<label>
									<input type="radio" value="0" name="Parking_Area" > no (የለውም)
								</label>
							</div>


						</div>

					</div>


				</div>

				<div class="form-group margin_top_30">

					<div class="col-sm-5 col-lg-offset-4">
						<button type="submit" class="btn btn-success btn-block">
							<strong>Add Building</strong>
						</button>
					</div>
				</div>

				<div class="margin_top_70">

				</div>



			</form>
		</div>
	</div>



	</div>

	</div>

	</div>
<?php
	include "Encoder_Footer.php";
?>