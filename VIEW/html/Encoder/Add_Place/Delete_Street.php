<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the id of the Street
if($_SERVER['REQUEST_METHOD']=="GET"){
	if(isset($_GET['Street_ID'])){
		$Street_ID = $_GET['Street_ID'];
	}

}

$Single_Street = $encoder->Get_Single_Street($Street_ID);
$Single_Street = mysqli_fetch_array($Single_Street,MYSQL_ASSOC);

$Street_Name = $Single_Street['Name'];
$Street_Name_Amharic = $Single_Street['Name_Amharic'];



?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Delete Street</h4>

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
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Delete_Street.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-6 control-label">Street</label>
					<label for="Name" class="col-sm-6 control-label left"><?php echo($Street_Name);?></label>
				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-6 control-label">የመንገድ ስም</label>
					<label for="Name" class="col-sm-6 control-label left"><?php echo($Street_Name_Amharic)?></label>
				</div>

				<input type="hidden" name="Street_ID" value="<?php echo($Street_ID);?>">

				<div class="alert alert-danger text-center margin_top_70">

					<strong>Are You sure you want to delete <?php echo($Street_Name);?></strong>
				</div>

				<input type="hidden" name="Street_ID" value="<?php echo($Street_ID);?>">
				<div class="form-group margin_top_20">


					<div class="col-sm-3 col-lg-offset-3">
						<a href="Add_Place_Street_inc.php" class="btn btn-info btn-block">Cancel</a>
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


