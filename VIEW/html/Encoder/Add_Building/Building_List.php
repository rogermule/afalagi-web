<?php

require("Require.php");


include "Encoder_Header.php";
include "Includeables.php";

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	$Buildings = $encoder->Get_Building_For_Listing();


?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">

				<h4>Building List</h4>

			</div>
		</div>
		<div class="col-sm-12 margin_top_51 ">
			<hr>


			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>List of Buildings</h4>

				</div>
			</div>
			<div class="col-sm-12 text-center margin_top_20">

				<button type="button" class="btn btn-success btn-xs"> A </button>
				<button type="button" class="btn btn-success btn-xs"> B </button>
				<button type="button" class="btn btn-success btn-xs"> C </button>
				<button type="button" class="btn btn-success btn-xs"> D </button>

				<button type="button" class="btn btn-success btn-xs"> E </button>
				<button type="button" class="btn btn-success btn-xs"> F </button>
				<button type="button" class="btn btn-success btn-xs"> G </button>
				<button type="button" class="btn btn-success btn-xs"> H </button>
				<button type="button" class="btn btn-success btn-xs"> I </button>
				<button type="button" class="btn btn-success btn-xs"> J </button>
				<button type="button" class="btn btn-success btn-xs"> K </button>
				<button type="button" class="btn btn-success btn-xs"> L </button>
				<button type="button" class="btn btn-success btn-xs"> M </button>
				<button type="button" class="btn btn-success btn-xs"> N </button>
				<button type="button" class="btn btn-success btn-xs"> O </button>
				<button type="button" class="btn btn-success btn-xs"> P </button>
				<button type="button" class="btn btn-success btn-xs"> Q </button>

				<button type="button" class="btn btn-success btn-xs"> R </button>
				<button type="button" class="btn btn-success btn-xs"> S </button>
				<button type="button" class="btn btn-success btn-xs"> T </button>
				<button type="button" class="btn btn-success btn-xs"> U </button>
				<button type="button" class="btn btn-success btn-xs"> V </button>
				<button type="button" class="btn btn-success btn-xs"> W </button>
				<button type="button" class="btn btn-success btn-xs"> X </button>
				<button type="button" class="btn btn-success btn-xs"> Y </button>
				<button type="button" class="btn btn-success btn-xs"> Z </button>

			</div>

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



	<?php
include "Encoder_Footer.php";
?>


























