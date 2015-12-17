<?php
//add the required and the
require('Require.php');
include('Building_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

$Buildings = $operator->Get_Building_For_Listing_All();
$Num_Bul = mysqli_num_rows($Buildings);




include('Building_Menu.html');
?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body text-center">

					<h4>ህንጻ ዝርዝር</h4>

				</div>
			</div>



			<div class="col-sm-12 margin_top_20 ">





				<hr>
				<div class="row">
					<div class="col-md-5">የህንጻ ብዛት   </div>
					<div class="col-md-3 indicator"><?php   echo($Num_Bul)?></div>
				</div>
				<hr>

				<div class=" margin_top_30">
					<table class="table table-hover">
						<thead>
						<th>#</th>

						<th>Building Name</th>
						<th>የህንፃ ስም</th>
						<th>ስለ ህንፃው</th>
						<th> Edit</th>

						</thead>
						<tbody>

						<?php
						$Count = 0;
						$Building_ID = "";
						$Building_Name = "";
						$Building_Name_Amharic = "";


						if($Buildings){
							while($bul = mysqli_fetch_array($Buildings,MYSQLI_ASSOC)){


								$Building_ID = $bul["ID"];
								$Building_Name = $bul["Name"];
								$Building_Name_Amharic = $bul["Name_Amharic"];
								$Building_Description = $bul["Building_Description_Amharic"];
								$Count++;

								?>

								<tr>
									<td><?php echo("$Count"); ?></td>

									<td><?php echo("$Building_Name");?></td>
									<td><?php echo("$Building_Name_Amharic");?></td>
									<td><?php echo("$Building_Description");?></td>

									<td>
										<p>
											<a class="btn btn-warning btn-xs" href="More_On_Building.php?Building_ID=<?php echo($Building_ID);?>">More</a>


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

include('Building_Footer.php');
?>