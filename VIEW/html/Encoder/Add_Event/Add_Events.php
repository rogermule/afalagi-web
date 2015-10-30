<?php

	include "Require.php";
	include "Encoder_Header.php";
 	include "Includeables.php";

?>

<div class="col-sm-7 list_container margin_0">

<div class="col-sm-12">

<div class="panel panel-default">
	<div class="panel-body text-center">
		<h4>Add Events</h4>

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

		if(isset($_GET['success'])){

 			$Name = $_GET["Name"];
			$Name_Amharic = $_GET["Name_Amharic"];

			?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>You have added a new Event Successfully.</strong>
				<br/>New Event --- <?php echo("$Name ($Name_Amharic)");?>
			</div>

		<?php

		}

		if(isset($_GET['success_edit'])){

			?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>You have edited the event successfully.</strong>
 			</div>

		<?php

		}
	}

	?>
<div class=" margin_top_20">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">About Event</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form"
		      action="../../../../CONTROLLER/Encoder/Add_Event.php" method="POST">

			<div class="form-group">
				<label for="Name" class="col-sm-4 control-label">Event Name</label>
				<div class="col-sm-6">
					<input name="Name" type="text" class="form-control"
					       id="Name" placeholder="Enter Event Name" >
				</div>
			</div>
 			<div class="form-group">
				<label for="Name_Amharic" class="col-sm-4 control-label">ስም</label>
				<div class="col-sm-6">
					<input name="Name_Amharic" type="text" class="form-control"
					       id="Name_Amharic" placeholder="Enter Event Name" >
				</div>
			</div>
 			<div class="form-group">
				<label for="About_Event" class="col-sm-4 control-label">About Event</label>
				<div class="col-sm-6">
					<textarea name="About_Event" class="form-control"
					          rows="3"  id="About_Event"
					          placeholder="About Event"></textarea>
				</div>
			</div>
 			<div class="form-group">
				<label for="About_Event_Amharic" class="col-sm-4 control-label">አጠቃላይ መረጃ</label>
				<div class="col-sm-6">
					<textarea name="About_Event_Amharic" class="form-control"
					          rows="3"  id="About_Event_Amharic"
					          placeholder="አጠቃላይ መረጃ"></textarea>
				</div>
			</div>
			<div class="form-group margin_top_70">
				<label for="Event_Start" class="col-sm-4 control-label">የኢቨንቱ መጀመሪያ ቀን</label>
				<div class="col-sm-6">
					<input name="Event_Start" type="text" class="form-control datepicker"
					       id="Name" placeholder="yyyy/mm/dd" >
				</div>
			</div>
 			<div class="form-group margin_top_70">
				<label for="Event_End" class="col-sm-4 control-label">የኢቨንቱ መጨረሻ ቀን</label>
				<div class="col-sm-6">
					<input name="Event_End" type="text" class="form-control datepicker"
					       id="Name_Amharic" placeholder="yyyy/mm/dd" >
				</div>
			</div>

 			<div class="form-group margin_top_70">

				<div class="col-sm-6 col-lg-offset-4">
					<button type="submit" class="btn btn-success btn-block">
						<strong>Add Event</strong>
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








