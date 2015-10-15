<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the id of the region
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(isset($_GET['Region_ID'])){
		$Region_ID = $_GET['Region_ID'];
	}

}

	$Single_Region = $encoder->Get_Single_Region($Region_ID);
 	$Single_Region = mysqli_fetch_array($Single_Region,MYSQL_ASSOC);

 	$Region_Name = $Single_Region['Name'];
	$Region_Name_Amharic = $Single_Region['Name_Amharic'];



?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Delete Region</h4>

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
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Delete_Region.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-6 control-label">Region</label>
					<label for="Name" class="col-sm-6 control-label left"><?php echo($Region_Name);?></label>
 				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-6 control-label">ከተማ</label>
					<label for="Name" class="col-sm-6 control-label left"><?php echo($Region_Name_Amharic)?></label>
 				</div>

				<input type="hidden" name="Region_ID" value="<?php echo($Region_ID);?>">

				<div class="alert alert-danger text-center margin_top_70">

					<strong>Are You sure you want to delete <?php echo($Region_Name);?></strong>
				</div>

				<input type="hidden" name="Region_ID" value="<?php echo($Region_ID);?>">
				<div class="form-group margin_top_20">


					<div class="col-sm-3 col-lg-offset-3">
						<a href="Add_Place_Region_inc.php" class="btn btn-info btn-block">Cancel</a>
					</div>

					<div class="col-sm-3 ">
						<button type="submit" class="btn btn-danger btn-block"><strong>Delete</strong>
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


