<?php


require('Require.php');


include("Place_Header.php");
include("includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object


	$sefers = $encoder->Get_Sefer();
	$num_sefer = mysqli_num_rows($sefers);

	$streets = $encoder->Get_Streets();
	$num_streets = mysqli_num_rows($streets);


?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Add Street (የመንገድ መጨመርያ)</h4>

				</div>
			</div>


			<?php

			/**
			 * if the get server request method has error set
			 * inform the admin about the user
			 */
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
 					$street_name = $_GET["street_name"];
					$street_name_amharic = $_GET["street_name_amharic"];
 					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have added a new Street successfully.</strong>
						<br/>New Street --- <?php echo("$street_name ($street_name_amharic)");?>
					</div>
 				<?php
 				}
				else if(isset($_GET['success_edit'])){
 					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have edited a Street successfully.</strong>
 					</div>
 				<?php
 				}
				else if(isset($_GET['success_delete'])){
  					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have deleted a Street successfully.</strong>
 					</div>
 				<?php

				}
			}
 			?>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Add Street</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Add_Street.php" method="POST">


							<div class="form-group">
								<label for="Street_Name" class="col-sm-4 control-label">Street Name</label>
								<div class="col-sm-7">
									<input name="Street_Name" type="text" class="form-control"
									       id="House_NO" placeholder="Enter Street Name" >
								</div>
							</div>

							<div class="form-group">
								<label for="Street_Name_Amharic" class="col-sm-4 control-label">የመንገድ ስም</label>
								<div class="col-sm-7">
									<input name="Street_Name_Amharic" type="text" class="form-control"
									       id="House_NO" placeholder="የመንገዱን ስም ያስገቡ" >
								</div>
							</div>

							<div class="form-group">
								<label for="About_Street"
								       class="col-sm-4 control-label">About the street</label>
								<div class="col-sm-7">

									<textarea name="About_Street" class="form-control"
									          rows="3"  id="About_Street"
									          placeholder="Enter the city and where it is found in city."></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="About_Street_Amharic"
								       class="col-sm-4 control-label">ስለ መንገዱ ገለጻ</label>
								<div class="col-sm-7">

									<textarea name="About_Street_Amharic" class="form-control"
									          rows="3"  id="About_Street_Amharic"
									          placeholder="የትኛው ከተማ እንደሚገኝ እና የት ቦታ እንደሚገኝ."></textarea>
								</div>
							</div>



							<div class="form-group margin_top_30">
								<div class="col-sm-7 col-lg-offset-4">
									<button type="submit" class="btn btn-success btn-block">
										<strong>Add Street</strong>
									</button>
								</div>
							</div>


						</form>
					</div>
				</div>


				<div class="col-sm-12 margin_top_51 ">
					<hr>


					<div class="panel panel-primary list_header margin_top_10">
						<div class="panel-body text-center">

							<h4>List of Street</h4>

						</div>
					</div>


					<div class=" margin_top_30">
						<table class="table table-hover">
							<thead>

							<th>#</th>
							<th>Name</th>
							<th>ስም</th>

							<th>መረጃ</th>

							</thead>
							<tbody>

							<?php
								$count = 0;
								$street_name = "";
								$street_name_amharic = "";

							if($streets){
								while($str = mysqli_fetch_array($streets,MYSQLI_ASSOC)){
									$count++;

									$street_name = $str['Name'];
									$street_name_amharic  = $str['Name_Amharic'];

									$About_Street_Amharic = $str['About_Street_Amharic'];
									$Street_ID = $str["ID"];

									?>
									<tr>
										<td><?php echo($count);?></td>
										<td><?php echo($street_name);?></td>
										<td><?php echo($street_name_amharic);?></td>

										<td><?php echo($About_Street_Amharic);?></td>
										<td>
											<a class="btn btn-warning btn-xs" href="Edit_Street.php?Street_ID=<?php echo($Street_ID)?>">Edit</a>
											<a class="btn btn-danger btn-xs"
											   href="Delete_Street.php?Street_ID=<?php echo($Street_ID);?>">Delete</a>
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

	</div>



<?php
include "Encoder_Footer.php";
?>