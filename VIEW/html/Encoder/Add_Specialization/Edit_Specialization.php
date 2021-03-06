<?php

include "Require.php";
include "Encoder_Header.php";
include "Includeables.php";

//we have to get the category
//then also a text field to add the specialization

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

$categories = $encoder->Get_Category();

if(isset($_GET['Specialization_ID'])){

	$Specialization_ID = $_GET['Specialization_ID'];
	$Single_Specialization = $encoder->Get_Single_Specialization($Specialization_ID);
	$Single_Specialization = mysqli_fetch_array($Single_Specialization,MYSQLI_ASSOC);
 	$Name = $Single_Specialization['Name'];
	$Name_Amharic = $Single_Specialization['Name_Amharic'];
	$General_Category = $Single_Specialization['General_Category'];

}


?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Add Specialization (የስራ መስክ ስፔሻላይዜሽን መጨመርያ)</h4>

				</div>
			</div>

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
    				$Phone = $_GET['Phone'];

					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have added a new Specialization Successfully.</strong>

					</div>

				<?php

				}
			}

			?>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">About the number</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Edit_Specialization.php" method="POST">




							<div class="form-group">
								<label for="Name" class="col-sm-4 control-label">Specialization Name</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" placeholder="Enter Specialization" name="Name" value="<?php echo($Name);?>">
								</div>
							</div>

							<div class="form-group">
								<label for="Description_Amharic" class="col-sm-4 control-label">የስፔሻላይዜሽኑ ስም</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" placeholder="Enter Specialization" name="Name_Amharic" value="<?php echo($Name_Amharic);?>">
								</div>
							</div>



							<div class="form-group margin_top_30">

								<div class="form-group">
									<div class="col-sm-5 col-sm-offset-4">
										<input type="radio" name="General_Category" id="EDUCATIONAL" value="<?php echo(GeneralCategory::EDUCATIONAL);?>" <?php if($General_Category == GeneralCategory::EDUCATIONAL){echo("checked=\"\"");}?>> <label for="EDUCATIONAL"><?php echo(GeneralCategory::EDUCATIONAL);?> ( የትምህርት ተቋም )</label>
									</div>
									<div class="col-sm-5 col-sm-offset-4">
										<input  type="radio" name="General_Category" id="HEALTH" value="<?php echo(GeneralCategory::HEALTH);?>"<?php if($General_Category == GeneralCategory::HEALTH){echo("checked=\"\"");}?>> <label for="HEALTH"><?php echo(GeneralCategory::HEALTH);?> ( የጤና ተቋም )</label>
									</div>
									<div class="col-sm-5 col-sm-offset-4">
										<input type="radio" name="General_Category" id="RECREATIONAL" value="<?php echo(GeneralCategory::RECREATIONAL);?>" <?php if($General_Category == GeneralCategory::RECREATIONAL){echo("checked=\"\"");}?>> <label for="RECREATIONAL"><?php echo(GeneralCategory::RECREATIONAL);?> ( የመዝናኛ ተቋም )</label>
									</div>
									<div class="col-sm-5 col-sm-offset-4">
										<input type="radio" name="General_Category" id="NULL" value="<?php echo(GeneralCategory::NULL);?>" <?php if($General_Category == GeneralCategory::NULL){echo("checked=\"\"");}?>> <label for="NULL"><?php echo(GeneralCategory::NULL);?> ( ሌላ )</label>
									</div>
								</div>

								<input type="hidden" name="Specialization_ID" value="<?php echo($Specialization_ID);?>">
								<div class="col-sm-6 col-lg-offset-4">
									 <a href="Specialization_List.php" class="btn btn-default col-sm-5">
									<strong>Cancel</strong>
									</a>


									<button type="submit" class="btn btn-success col-sm-5 col-sm-offset-2">
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

include "Encoder_Footer.php";

?>