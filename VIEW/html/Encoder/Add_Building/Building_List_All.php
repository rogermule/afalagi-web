<?php

require("Require.php");


include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object


$Buildings = $encoder->Get_Building_For_Listing_All();
$Num_Bul = mysqli_num_rows($Buildings);

?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body text-center">

				<h4>All Building List (ሁሉም የህንጻ ዝርዝር )</h4>

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

			if(isset($_GET['success'])){
				$building_name = $_GET["building_name"];
				$building_name_amharic = $_GET["building_name_amharic"];
				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have added a new building successfully.</strong>
					<br/>New Building --- <?php echo("$building_name ($building_name_amharic)");?>
					<br/>
				</div>
			<?php
			}
			else if(isset($_GET['success_edit'])){

				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have edited building successfully.</strong>

					<br/>
				</div>
			<?php
			}
			else if(isset($_GET['success_delete'])){

				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have deleted building successfully.</strong>

					<br/>
				</div>
			<?php
			}
		}
		?>


		<div class="col-sm-12 margin_top_20 ">





			<hr>
			<div class="row">
				<div class="col-md-5">Number of Buildings (የህንጻ ብዛት) =  </div>
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
										<a class="btn btn-warning btn-xs" href="Edit_Building.php?Building_ID=<?php echo($Building_ID);?>">Edit</a>
										<a href="Delete_Building.php?Building_ID=<?php echo($Building_ID);?>" class="btn btn-danger btn-xs">Delete</a>

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
















