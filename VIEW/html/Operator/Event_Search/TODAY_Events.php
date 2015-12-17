<?php
//add the required and the
require('Require.php');
include('Event_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);



include('Event_Menu.html');
$event = $operator->Get_TODAY_Events();

$today = date("Y/m/d");

?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">


			<div class="col-sm-12 margin_top_20">



				<div class="panel panel-primary  margin_top_10">
					<div class="panel-body text-center">
						<h4>የዛሬ ኢቨንቶች <?php echo($today);?></h4>

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
											<a  href="More_On_Event.php?Event_ID=<?php echo($Event_ID);?>" class="btn btn-default btn-xs"> more </a>

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

include('Event_Footer.php');
?>