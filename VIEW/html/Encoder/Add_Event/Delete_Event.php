<?php

require("Require.php");

include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);

$event = $encoder->Get_Events();

if(isset($_GET['Event_ID'])){
	$Event_ID = $_GET['Event_ID'];
}

$Single_Event = $encoder->Get_Single_Event($Event_ID);

$Single_Event = mysqli_fetch_array($Single_Event,MYSQLI_ASSOC);

$Event_Name = $Single_Event['Name'];
$Event_Name_Amharic = $Single_Event['Name_Amharic'];
$About_Event_Amharic = $Single_Event['About_Event_Amharic'];


?>
	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Delete Events</h4>
				</div>
			</div>

			<?php

			/**
			 * if the get server request method has error set
			 * inform the admin about the user
			 */
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
				<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Delete_Event.php" method="POST">


					<div class="form-group">
						<label for="Name" class="col-sm-6 control-label">Event</label>
						<label for="Name" class="col-sm-6 control-label left"><?php echo($Event_Name);?></label>
					</div>
					<div class="form-group">
						<label for="Name_Amharic" class="col-sm-6 control-label">ኢቨንት</label>
						<label for="Name" class="col-sm-6 control-label left"><?php echo($Event_Name_Amharic)?></label>
					</div>
					<div class="form-group">
						<label for="Name_Amharic" class="col-sm-6 control-label">ስለ ኢቨንቱ</label>
						<label for="Name" class="col-sm-6 control-label left"><?php echo($About_Event_Amharic)?></label>
					</div>

					<input type="hidden" name="Event_ID" value="<?php echo($Event_ID);?>">

					<div class="alert alert-danger text-center margin_top_70">

						<strong>Are You sure you want to delete <?php echo($Event_Name);?></strong>
					</div>


					<div class="form-group margin_top_20">


						<div class="col-sm-3 col-lg-offset-3">
							<a href="Event_List.php" class="btn btn-info btn-block">Cancel</a>
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