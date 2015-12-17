<?php
//add the required and the
require('Require.php');
include('Event_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

	if(isset($_GET['Event_ID'])){
		$Event_ID = $_GET['Event_ID'];

		$Event = $operator->Get_Single_Event($Event_ID);
		$Event = mysqli_fetch_array($Event,MYSQLI_ASSOC);

		$Name = $Event['Name'];
		$Name_Amharic = $Event['Name_Amharic'];
		$About_Event = $Event['About_Event'];
		$About_Event_Amharic = $Event['About_Event_Amharic'];
		$Event_Start = $Event['Event_Start'];
		$Event_End = $Event['Event_End'];

	}



include('Event_Menu.html');
?>

	<div class="col-sm-7  list_container">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h1>አፋላጊ</h1>

				</div>
			</div>

			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">አጠቃላይ መረጃ</h3>
					</div>
					<div class="panel-body">
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የኢቨንን ስም</div>
							<div class="col-sm-9 float_left"><?php echo($Name_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ስለ ኢቨንን</div>
							<div class="col-sm-9 float_left"><?php echo($About_Event_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የኢቨንን መጀመርያ</div>
							<div class="col-sm-9 float_left"><?php echo($Event_Start);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የኢቨንን መጨረሻ</div>
							<div class="col-sm-9 float_left"><?php echo($Event_End);?></div>
						</div>


					</div>
				</div>

			</div>
			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Information </h3>
					</div>
					<div class="panel-body">
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Name</div>
							<div class="col-sm-9 float_left"><?php echo($Name);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">About Event</div>
							<div class="col-sm-9 float_left"><?php echo($About_Event);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Start Date</div>
							<div class="col-sm-9 float_left"><?php echo($Event_Start);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">End Date</div>
							<div class="col-sm-9 float_left"><?php echo($Event_End);?></div>
						</div>

					</div>
				</div>

			</div>
		</div>

	</div>


<?php

include('Event_Footer.php');
?>