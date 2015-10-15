<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the id of the Street

if(isset($_GET['Street_ID'])){
	$Street_ID = $_GET['Street_ID'];
}



$Single_Street = $encoder->Get_Single_Street($Street_ID);

$Single_Street = mysqli_fetch_array($Single_Street,MYSQL_ASSOC);

$Street_Name = $Single_Street['Name'];
$Street_Name_Amharic = $Single_Street['Name_Amharic'];
$Street_About = $Single_Street['About_Street'];
$Street_About_Amharic = $Single_Street['About_Street_Amharic'];




?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Edit Street</h4>

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
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Edit_Street.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-4 control-label">Street</label>
					<div class="col-sm-6">
						<input name="Name" type="text" class="form-control" id="city" placeholder="Enter Street" value="<?php echo($Street_Name);?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-4 control-label">የመንገድ ስም</label>
					<div class="col-sm-6">
						<input name="Name_Amharic" type="text" class="form-control" id="City_Name_Amharic" placeholder="የመንገዱን ስም ያስገቡ" value="<?php echo($Street_Name_Amharic);?>" >
					</div>
				</div>

				<div class="form-group">
					<label for="About_Street"
					       class="col-sm-4 control-label">About the street</label>
					<div class="col-sm-6">

						<textarea name="About_Street" class="form-control"
						          rows="3"  id="About_Street"
						          placeholder="Enter the city and where it is found in city."><?php echo($Street_About);?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="About_Street_Amharic"
					       class="col-sm-4 control-label">ስለ መንገዱ ገለጻ</label>
					<div class="col-sm-6">

						<textarea name="About_Street_Amharic" class="form-control"
						          rows="3"  id="About_Street_Amharic"
						          placeholder="የትኛው ከተማ እንደሚገኝ እና የት ቦታ እንደሚገኝ."><?php echo($Street_About_Amharic); ?></textarea>
					</div>
				</div>


				<input type="hidden" name="Street_ID" value="<?php echo($Street_ID);?>">

				<div class="form-group margin_top_70">


					<div class="col-sm-3 col-lg-offset-4">
						<a href="Add_Place_Street_inc.php" class="btn btn-info btn-block">Cancel</a>
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


