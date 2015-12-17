<?php


require('Require.php');

include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object
 $Specializations  = $encoder->Get_All_Specialization();

?>






<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">


		<div class="col-sm-12 margin_top_20">


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
					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have added a new Specialization Successfully.</strong>
 					</div>
 				<?php

				}
				else if(isset($_GET['success_edit'])){
					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have successfully edited a Specialization.</strong>
 					</div>
 				<?php

				}
				else if(isset($_GET['success_delete'])){
					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have successfully deleted a Specialization.</strong>
 					</div>
 				<?php

				}
			}

			?>



			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>List of Specialization (ስፔሻላይዜሽን ዝርዝር)</h4>

				</div>
			</div>


			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>
					<th>ስፔሻላይዜሽን(specialization)</th>
					<th>የስራ መስክ (Category)</th>
					</thead>
					<tbody>

					<?php
					$Count =0;


					$Specialization_ID = "";
					$Specialization_Name_Amharic = "";
					$Specialization_Name = "";
					$General_Category = "";


					if($Specializations){
						while($speci = mysqli_fetch_array($Specializations,MYSQLI_ASSOC)){

							$Specialization_ID = $speci['ID'];
							$Specialization_Name = $speci['Name'];
							$Specialization_Name_Amharic = $speci['Name_Amharic'];
							$General_Category = $speci['General_Category'];

							$Count++;

							?>
							<tr>
								<td><?php echo($Count);?></td>

				<td><?php echo ($Specialization_Name_Amharic." (". $Specialization_Name ." )")?></td>



								<td><?php if($General_Category == "NULL"){
										echo("_");
									} else{
										echo($General_Category);
									}?></td>
								<td>
								<td>
									<p>
										<a href="Edit_Specialization.php?Specialization_ID=<?php echo($Specialization_ID);?>" class="btn btn-warning btn-xs">Edit</a>
										<a href="Delete_Specialization.php?Specialization_ID=<?php echo($Specialization_ID);?>" class="btn btn-danger btn-xs">Delete</a>
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
