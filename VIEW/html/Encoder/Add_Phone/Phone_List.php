<?php


require('Require.php');

include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object


	$Famous_Phones = $encoder->Get_Famous_Phones();

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
						<strong>You have added a new Phone Added Successfully.</strong>

					</div>

				<?php

				}
				else if(isset($_GET['success_edit'])){
					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have successfully edited a phone.</strong>

					</div>

				<?php

				}
				else if(isset($_GET['success_delete'])){
					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have successfully deleted a phone.</strong>

					</div>

				<?php

				}
			}

			?>



			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>List of Phones</h4>

				</div>
			</div>


			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>
					<th>Phone Number</th>
					<th>ገለጻ</th>
					</thead>
					<tbody>

					<?php
					$Count =0;
					$Phone_ID = "";
					$Phone = "";
					$Phone_Description_Amharic = "";

					if($Famous_Phones){
						while($fphone = mysqli_fetch_array($Famous_Phones,MYSQLI_ASSOC)){

							$Phone_ID = $fphone["ID"];
							$Phone = $fphone["Phone"];
							$Phone_Description_Amharic = $fphone["Description_Amharic"];
							$Count++;

							?>
							<tr>
								<td><?php echo($Count);?></td>

								<td><?php echo($Phone)?></td>

								<td>
									<?php echo($Phone_Description_Amharic)?>
								</td>
								<td>
									<p>
										<a href="Edit_Phone.php?Phone_ID=<?php echo($Phone_ID);?>" class="btn btn-warning btn-xs">Edit</a>
										<a href="Delete_Phone.php?Phone_ID=<?php echo($Phone_ID);?>" class="btn btn-danger btn-xs">Delete</a>
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
