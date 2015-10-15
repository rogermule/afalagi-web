<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the id of the Wereda

if(isset($_GET['Wereda_ID'])){
	$Wereda_ID = $_GET['Wereda_ID'];
}



$Single_Wereda = $encoder->Get_Single_Wereda($Wereda_ID);

$Single_Wereda = mysqli_fetch_array($Single_Wereda,MYSQL_ASSOC);

$Wereda_Name = $Single_Wereda['Name'];
$Wereda_Name_Amharic = $Single_Wereda['Name_Amharic'];




?>

<div class=" col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Edit Wereda</h4>

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
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Edit_Wereda.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-4 control-label">Wereda</label>
					<div class="col-sm-6">
						<input name="Name" type="text" class="form-control" id="city" placeholder="Enter Wereda" value="<?php echo($Wereda_Name);?>" >
					</div>
				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-4 control-label">ወረዳ</label>
					<div class="col-sm-6">
						<input name="Name_Amharic" type="text" class="form-control" id="City_Name_Amharic" placeholder="ወረዳ ያስገቡ" value="<?php echo($Wereda_Name_Amharic);?>" >
					</div>
				</div>

				<input type="hidden" name="Wereda_ID" value="<?php echo($Wereda_ID);?>">

				<div class="form-group margin_top_70">


					<div class="col-sm-3 col-lg-offset-4">
						<a href="Add_Place_Wereda_inc.php" class="btn btn-info btn-block">Cancel</a>
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


