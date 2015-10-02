<?php

require("../../../../CONFIGURATION/Config.php");
require(DB);
require("../../../../MODEL/User.php");
require("../../../../MODEL/User_Type.php");
require("../../../../CONTROLLER/Encoder/User_Controller.php");
require("../../../../CONTROLLER/Encoder/Encoder_Controller.php");
require("../../../../CONTROLLER/Controller_Secure_Access.php");

include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

	$event = $encoder->Get_Events();

?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">


		<div class="col-sm-12 margin_top_20">



			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>List of Events</h4>

				</div>
			</div>


			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>

					<th>Event Name</th>
					<th>ስም</th>

					<th> Edit</th>

					</thead>
					<tbody>

					<?php
					$Count = 0;
					$Name = "";
					$Name_Amharic = "";



					if($event){
						while($evt = mysqli_fetch_array($event,MYSQLI_ASSOC)){

							$Count++;
							$Event_ID = $evt["ID"];
							$Event_Name = $evt["Name"];
							$Event_Name_Amharic = $evt["Name_Amharic"];



							?>

							<tr>
								<td><?php echo("$Count"); ?></td>

								<td><?php echo("$Event_Name");?></td>

								<td><?php echo("$Event_Name_Amharic");?></td>

								<td>
									<p>
										<button type="button" class="btn btn-warning btn-xs">Edit</button>
										<button type="button" class="btn btn-danger btn-xs">Delete</button>

									</p>
								</td>

							</tr>

						<?php
						}
					}

					?>


					</tbody>
				</table>
			</div>



		</div>

	</div>

</div>



	<?php
	include "Encoder_Footer.php";
	?>













