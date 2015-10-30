<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

	//get the id of the region

	if(isset($_GET['Region_ID'])){
		$Region_ID = $_GET['Region_ID'];
	}



	$Single_Region = $encoder->Get_Single_Region($Region_ID);

	$Single_Region = mysqli_fetch_array($Single_Region,MYSQLI_ASSOC);

	$Region_Name = $Single_Region['Name'];
	$Region_Name_Amharic = $Single_Region['Name_Amharic'];





?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Edit Region</h4>

			</div>
		</div>

		<!--	    start of feedback place-->
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
 		<!--		end of the feed back place-->

		<div class=" margin_top_20">
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Edit_Region.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-4 control-label">Region</label>
					<div class="col-sm-6">
						<input name="Name" type="text" class="form-control" id="city" placeholder="Enter City" value="<?php echo($Region_Name);?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-4 control-label">ከተማ</label>
					<div class="col-sm-6">
						<input name="Name_Amharic" type="text" class="form-control" id="City_Name_Amharic" placeholder="የከተማ ስም ያስገቡ" value="<?php echo($Region_Name_Amharic);?>" >
					</div>
				</div>

				<input type="hidden" name="Region_ID" value="<?php echo($Region_ID);?>">

				<div class="form-group margin_top_70">


					<div class="col-sm-3 col-lg-offset-4">
						<a href="Add_Place_Region_inc.php" class="btn btn-info btn-block">Cancel</a>
					</div>

					<div class="col-sm-3 ">
						<button type="submit" class="btn btn-success btn-block"><strong>Save</strong>
						</button>
					</div>


				</div>
			</form>

		</div>


	</div>



</div>



<?php

include "Encoder_Footer.php";

?>


