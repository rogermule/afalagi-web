<?php

require("Require.php");


include "Encoder_Header.php";
include "Includeables.php";

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	$Buildings = $encoder->Get_Building_For_Listing();

	if(isset($_GET['Sort'])){
		$Name_Start = $_GET['Name_Start'];
		$Buildings = $encoder->Get_Building_For_Listing($Name_Start);
		$Num_Bul = mysqli_num_rows($Buildings);
	}
	else{
		$Buildings = $encoder->Get_Building_For_Listing();
		$Num_Bul = mysqli_num_rows($Buildings);
		$Name_Start ="A";
	}

?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body text-center">

				<h4>Building List</h4>

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



			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>List of Buildings</h4>

				</div>
			</div>
			<div class="col-sm-12 text-center margin_top_20">

				<a href="Building_List.php?Sort=1&Name_Start=A" class="btn btn-success btn-xs">A</a>
				<a href="Building_List.php?Sort=1&Name_Start=B" class="btn btn-success btn-xs">B</a>
				<a href="Building_List.php?Sort=1&Name_Start=C" class="btn btn-success btn-xs">C</a>
				<a href="Building_List.php?Sort=1&Name_Start=D" class="btn btn-success btn-xs">D</a>
				<a href="Building_List.php?Sort=1&Name_Start=E" class="btn btn-success btn-xs">E</a>
				<a href="Building_List.php?Sort=1&Name_Start=F" class="btn btn-success btn-xs">F</a>
				<a href="Building_List.php?Sort=1&Name_Start=G" class="btn btn-success btn-xs">G</a>
				<a href="Building_List.php?Sort=1&Name_Start=H" class="btn btn-success btn-xs">H</a>
				<a href="Building_List.php?Sort=1&Name_Start=I" class="btn btn-success btn-xs">I</a>
				<a href="Building_List.php?Sort=1&Name_Start=J" class="btn btn-success btn-xs">J</a>
				<a href="Building_List.php?Sort=1&Name_Start=K" class="btn btn-success btn-xs">K</a>
				<a href="Building_List.php?Sort=1&Name_Start=L" class="btn btn-success btn-xs">L</a>
				<a href="Building_List.php?Sort=1&Name_Start=M" class="btn btn-success btn-xs">M</a>
				<a href="Building_List.php?Sort=1&Name_Start=N" class="btn btn-success btn-xs">N</a>
				<a href="Building_List.php?Sort=1&Name_Start=O" class="btn btn-success btn-xs">O</a>
				<a href="Building_List.php?Sort=1&Name_Start=P" class="btn btn-success btn-xs">P</a>
				<a href="Building_List.php?Sort=1&Name_Start=Q" class="btn btn-success btn-xs">Q</a>
				<a href="Building_List.php?Sort=1&Name_Start=R" class="btn btn-success btn-xs">R</a>
				<a href="Building_List.php?Sort=1&Name_Start=S" class="btn btn-success btn-xs">S</a>
				<a href="Building_List.php?Sort=1&Name_Start=T" class="btn btn-success btn-xs">T</a>
				<a href="Building_List.php?Sort=1&Name_Start=U" class="btn btn-success btn-xs">U</a>
				<a href="Building_List.php?Sort=1&Name_Start=V" class="btn btn-success btn-xs">V</a>
				<a href="Building_List.php?Sort=1&Name_Start=W" class="btn btn-success btn-xs">W</a>
				<a href="Building_List.php?Sort=1&Name_Start=X" class="btn btn-success btn-xs">X</a>
				<a href="Building_List.php?Sort=1&Name_Start=Y" class="btn btn-success btn-xs">Y</a>
				<a href="Building_List.php?Sort=1&Name_Start=Z" class="btn btn-success btn-xs">Z</a>

			</div>
			<hr>
			<div class="row">
				<div class="col-md-5">Number of Buildings starting with <span class="btn btn-danger indicator"> <?php echo($Name_Start);?> </span>  </div>
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


























