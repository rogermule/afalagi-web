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
$About_Event = $Single_Event['About_Event'];
$About_Event_Amharic = $Single_Event['About_Event_Amharic'];
$Event_Start =$Single_Event['Event_Start'];
$Event_End = $Single_Event['Event_End'];

?>

<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Edit Events</h4>
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

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Delete Event</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Edit_Event.php" method="POST">

							<div class="form-group">
								<label for="Name" class="col-sm-4 control-label">Event Name</label>
								<div class="col-sm-6">
		<input name="Name" type="text" class="form-control" id="Name"
		       placeholder="Enter Event Name" value="<?php echo($Event_Name);?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="Name_Amharic" class="col-sm-4 control-label">ስም</label>
								<div class="col-sm-6">
									<input name="Name_Amharic" type="text" class="form-control"
									       id="Name_Amharic" placeholder="Enter Event Name" value="<?php echo($Event_Name_Amharic);?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="About_Event" class="col-sm-4 control-label">About Event</label>
								<div class="col-sm-6">
									<textarea name="About_Event" class="form-control"
									          rows="3"  id="About_Event"
									          placeholder="About Event"><?php echo($About_Event);?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="About_Event_Amharic" class="col-sm-4 control-label">አጠቃላይ መረጃ</label>
								<div class="col-sm-6">
									<textarea name="About_Event_Amharic" class="form-control"
									          rows="3"  id="About_Event_Amharic"
									          placeholder="አጠቃላይ መረጃ"><?php echo($About_Event_Amharic);?></textarea>
								</div>
							</div>
							<div class="form-group margin_top_70">
								<label for="Event_Start" class="col-sm-4 control-label">የኢቨንቱ መጀመሪያ ቀን</label>
								<div class="col-sm-6">
									<input name="Event_Start" type="text" class="form-control datepicker"
									       id="Name" placeholder="yyyy/mm/dd" value="<?php echo($Event_Start);?>" >
								</div>
							</div>
							<div class="form-group margin_top_70">
								<label for="Event_End" class="col-sm-4 control-label">የኢቨንቱ መጨረሻ ቀን</label>
								<div class="col-sm-6">
						<input name="Event_End" type="text" class="form-control datepicker"
						id="Name_Amharic" placeholder="yyyy/mm/dd" value="<?php echo($Event_End);?>" >
								</div>
							</div>

							<input type="hidden" value="<?php echo($Event_ID)?>" name="Event_ID">
							<div class="form-group margin_top_70">

								<div class="col-sm-6 col-lg-offset-4">
									<button type="submit" class="btn btn-success btn-block">
										<strong>Save</strong>
									</button>
								</div>
							</div>
							<div class="margin_bottom_200">

							</div>



						</form>
					</div>
				</div>


				<div class="col-sm-12 margin_top_51 ">


				</div>

			</div>

		</div>

	</div>

<?php
include "Encoder_Footer.php";
?>