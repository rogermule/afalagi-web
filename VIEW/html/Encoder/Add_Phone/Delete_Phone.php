<?php

require('Require.php');
include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the phone id
if(isset($_GET['Phone_ID'])){
	$Phone_ID = $_GET['Phone_ID'];
}

$Single_Phone = $encoder->Get_Single_Phone($Phone_ID);

$Single_Phone = mysqli_fetch_array($Single_Phone,MYSQLI_ASSOC);

$Phone = $Single_Phone['Phone'];
$Phone_Description = $Single_Phone['Description'];
$Phone_Description_Amharic = $Single_Phone['Description_Amharic'];


?>


	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Delete Phone</h4>
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
 			}
 			?>
			<div class=" margin_top_20">
				<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Delete_Phone.php" method="POST">


					<div class="form-group">
						<label for="Name" class="col-sm-6 control-label">Phone</label>
						<label for="Name" class="col-sm-6 control-label left"><?php echo($Phone);?></label>
					</div>
					<div class="form-group">
						<label for="Name_Amharic" class="col-sm-6 control-label">Description</label>
						<label for="Name" class="col-sm-6 control-label left"><?php echo($Phone_Description)?></label>
					</div>
					<div class="form-group">
						<label for="Name_Amharic" class="col-sm-6 control-label">ገለጻ</label>
						<label for="Name" class="col-sm-6 control-label left"><?php echo($Phone_Description_Amharic)?></label>
					</div>

					<input type="hidden" name="Phone_ID" value="<?php echo($Phone_ID);?>">

					<div class="alert alert-danger text-center margin_top_70">

						<strong>Are You sure you want to delete <?php echo($Phone);?></strong>
					</div>


					<div class="form-group margin_top_20">

						<div class="col-sm-3 col-lg-offset-3">
							<a href="Phone_List.php" class="btn btn-info btn-block">Cancel</a>
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