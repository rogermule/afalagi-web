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

$Building = $encoder->Get_Building_For_Edit($Building_ID);
$Building = mysqli_fetch_array($Building,MYSQLI_ASSOC);

$Building_Name = $Building['Building_Name'];
$Building_Name_Amharic = $Building['Building_Name_Amharic'];
$Building_Description = $Building['Building_Description'];
$Building_Description_Amharic = $Building['Building_Description'];
$Parking_Area = $Building["Parking_Area"];

$Place_ID = $Building['Place_ID'];

$Direction_ID = $Building['DIR_ID'];

?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

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
			}
			?>


			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Delete a Building from afalagi.</h4>
					<span>Are you sure you want to delete <?php echo($Building_Name);?></span>
				</div>
			</div>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Delete Building</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Delete_Building.php" method="POST">

							<div class="form-group">
								<label   class="col-sm-5 control-label">Building Name</label>
								<label   class="col-sm-6 control-label left"><?php echo($Building_Name);?></label>
							</div>

							<div class="form-group">
								<label   class="col-sm-5 control-label">የህንጸ ስም</label>
								<label   class="col-sm-6 control-label left"><?php echo($Building_Name_Amharic);?></label>
							</div>

							<div class="form-group">
								<label   class="col-sm-5 control-label">Building Description</label>
								<label   class="col-sm-6 control-label left"><?php echo($Building_Description);?></label>
							</div>
							<div class="form-group">
								<label   class="col-sm-5 control-label">የህንጻው መገለጫ</label>
								<label   class="col-sm-6 control-label left"><?php echo($Building_Description_Amharic);?></label>
							</div>



							<input type="hidden" name="Building_ID" value="<?php echo($Building_ID);?>">
							<input type="hidden" name="Place_ID" value="<?php echo($Place_ID);?>">
							<input type="hidden" name="Direction_ID" value="<?php echo($Direction_ID);?>">




							<div class="form-group margin_top_30 margin_bottom_200">
								<div class="col-sm-3 col-sm-offset-3 ">

									<a href="Building_List.php" class="btn btn-info btn-block">
										<strong>Cancel</strong>
									</a>
								</div>

								<div class="col-sm-3  ">
									<button type="submit" class="btn btn-danger btn-block">
										<strong>Delete</strong>
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
include "Encoder_Footer.php";
?>