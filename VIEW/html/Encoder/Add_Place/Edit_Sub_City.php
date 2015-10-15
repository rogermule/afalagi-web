<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the id of the Sub_City

if(isset($_GET['Sub_City_ID'])){
	$Sub_City_ID = $_GET['Sub_City_ID'];
}



$Single_Sub_City = $encoder->Get_Single_Sub_City($Sub_City_ID);

$Single_Sub_City = mysqli_fetch_array($Single_Sub_City,MYSQL_ASSOC);

$Sub_City_Name = $Single_Sub_City['Name'];
$Sub_City_Name_Amharic = $Single_Sub_City['Name_Amharic'];




?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Edit SubCity</h4>

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
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Edit_Sub_City.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-4 control-label">Sub_City</label>
					<div class="col-sm-6">
						<input name="Name" type="text" class="form-control" id="city" placeholder="Enter Sub City" value="<?php echo($Sub_City_Name);?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-4 control-label">ከፍለከተማ</label>
					<div class="col-sm-6">
						<input name="Name_Amharic" type="text" class="form-control" id="City_Name_Amharic" placeholder="ከፍለከተማ ስም ያስገቡ" value="<?php echo($Sub_City_Name_Amharic);?>" >
					</div>
				</div>

				<input type="hidden" name="Sub_City_ID" value="<?php echo($Sub_City_ID);?>">

				<div class="form-group margin_top_70">


					<div class="col-sm-3 col-lg-offset-4">
						<a href="Add_Place_Sub_City_inc.php" class="btn btn-info btn-block">Cancel</a>
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


