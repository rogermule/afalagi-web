<?php

require("Require.php");

include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);

$event = $encoder->Get_TODAY_Events();

$today = date("Y/m/d");


?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">


		<div class="col-sm-12 margin_top_20">

			<?php

			if(isset($_GET['success_edit'])){
				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have edited Event Successfully.</strong>

				</div>
			<?php
			}

			else if(isset($_GET['success_delete'])){
				?>
				<div class="alert alert-success alert-dismissable">

					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have deleted Event Successfully.</strong>

				</div>
			<?php
			}
 			?>

			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>TODAY Events <?php echo($today);?></h4>

				</div>
			</div>

			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>
 					<th>Event Name</th>
					<th>ስም</th>
 					<th>Event Day</th>
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
									<p>TODAY</p>
								</td>
								<td>
									<p>
										<a  href="Edit_Event.php?Event_ID=<?php echo($Event_ID);?>" class="btn btn-warning btn-xs">Edit</a>
										<a  href="Delete_Event.php?Event_ID=<?php echo($Event_ID);?>" class="btn btn-danger btn-xs">Delete</a>
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













