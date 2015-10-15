<?php

	require('Require.php');
 	include("Place_Header.php");
	include("includables.php");
 	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	//get the id of the City

	if(isset($_GET['City_ID'])){
		$City_ID = $_GET['City_ID'];
	}

	$Single_City = $encoder->Get_Single_City($City_ID);
 	$Single_City = mysqli_fetch_array($Single_City,MYSQL_ASSOC);
 	$City_Name = $Single_City['Name'];
	$City_Name_Amharic = $Single_City['Name_Amharic'];


?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Edit City</h4>

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
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Edit_City.php" method="POST">

				<div class="form-group">
					<label for="Name" class="col-sm-4 control-label">City</label>
					<div class="col-sm-6">
						<input name="Name" type="text" class="form-control" id="city" placeholder="Enter City" value="<?php echo($City_Name);?>" >
					</div>
				</div>

				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-4 control-label">ከተማ</label>
					<div class="col-sm-6">
						<input name="Name_Amharic" type="text" class="form-control" id="City_Name_Amharic" placeholder="የከተማ ስም ያስገቡ" value="<?php echo($City_Name_Amharic);?>" >
					</div>
				</div>

				<input type="hidden" name="City_ID" value="<?php echo($City_ID);?>">

				<div class="form-group margin_top_70">


					<div class="col-sm-3 col-lg-offset-4">
						<a href="Add_Place_City_inc.php" class="btn btn-info btn-block">Cancel</a>
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
