<?php

require('Require.php');
include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

//get the phone id
if(isset($_GET['Phone_ID'])){
	$Phone_ID = $_GET['Phone_ID'];
}

$Single_Phone = $encoder->Get_Single_Phone($Phone_ID);

$Single_Phone = mysqli_fetch_array($Single_Phone,MYSQLI_ASSOC);

$Phone = $Single_Phone['Phone'];
$Phone_Description = $Single_Phone['Description'];
$Phone_Description_Amharic = $Single_Phone['Description_Amharic'];


?>


	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Edit Phone</h4>
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



					$Phone = $_GET['Phone'];

					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have added a new Phone Added Successfully.</strong>
						<br/>New Phone --- <?php echo("$Phone");?>
					</div>

				<?php

				}
			}
 			?>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">About Phone</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Edit_Phone.php" method="POST">


							<div class="form-group">
								<label for="Phone" class="col-sm-4 control-label">Telephone NO</label>
								<div class="col-sm-6">
									<input name="Phone" type="text" class="form-control"
									       id="Phone" placeholder="Telephone Number" value="<?php echo($Phone);?>" >
								</div>
							</div>


							<div class="form-group">
								<label for="Description" class="col-sm-4 control-label">Description</label>
								<div class="col-sm-6">
									<textarea name="Description" class="form-control"
									          rows="3"  id="Description"
									          placeholder="What is the purpose of the number,Or the owner of the number"><?php echo($Phone_Description);?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="Description_Amharic" class="col-sm-4 control-label">ገለጻ</label>
								<div class="col-sm-6">

									<textarea name="Description_Amharic" class="form-control"
					rows="3" placeholder="ስለስልኩ ገለጻ"><?php echo($Phone_Description_Amharic);?></textarea>

								</div>
							</div>
							<input type="hidden" name="Phone_ID" value="<?php echo($Phone_ID);?>">
 							<div class="form-group margin_top_30">

								<div class="col-sm-6 col-lg-offset-4">
									<button type="submit" class="btn btn-success btn-block">
										<strong>Save</strong>
									</button>
								</div>
							</div>


						</form>
					</div>
				</div>





			</div>

		</div>

	</div>


<?php

include "Encoder_Footer.php";

?>