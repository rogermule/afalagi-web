<?php
//add the required and the
require('Require.php');
include('Event_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

 $event = $operator->Get_Events();



include('Event_Menu.html');
?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">


			<div class="col-sm-12 margin_top_20">

				<div class="panel panel-success margin_top_10">
					<div class="panel-body text-center">
						<h4>የኢቨንት ዝርዝር</h4>

					</div>
				</div>


				<div class=" margin_top_30">
					<table class="table table-hover">
						<thead>
						<th>#</th>

						<th>Event Name</th>
						<th>የኢቨንት ስም</th>
						<th>Status</th>
						<th> More</th>

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
								$Event_Status = $evt['Event_Status'];
								?>

								<tr>
									<td><?php echo("$Count"); ?></td>
									<td><?php echo("$Event_Name");?></td>
									<td><?php echo("$Event_Name_Amharic");?></td>
									<td>


										<?php

										if($Event_Status == Event_Status::NOT_EXPIRED){
											?>
											<span class="glyphicon glyphicon-ok"></span>
										<?php
										}
										else if($Event_Status == Event_Status::EXPIRED){
											?>
											<span class="glyphicon glyphicon-remove"></span>
										<?php
										}

										?>
									</td>
									<td>
										<p>
											<a  href="More_On_Event.php?Event_ID=<?php echo($Event_ID);?>" class="btn btn-default btn-xs">more</a>

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