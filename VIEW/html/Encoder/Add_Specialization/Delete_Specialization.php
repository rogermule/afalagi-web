<?php

include "Require.php";
include "Encoder_Header.php";
include "Includeables.php";

//we have to get the category
//then also a text field to add the specialization

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object



if(isset($_GET['Specialization_ID'])){


	$Specialization_ID = $_GET['Specialization_ID'];
	$Single_Specialization = $encoder->Get_Single_Specialization($Specialization_ID);
	$Single_Specialization = mysqli_fetch_array($Single_Specialization,MYSQLI_ASSOC);
	$Name = $Single_Specialization['Name'];
	$Name_Amharic = $Single_Specialization['Name_Amharic'];
	$General_Category = $Single_Specialization['General_Category'];


}

?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-danger">
				<div class="panel-body text-center">
					<h4>Delete Specialization (የስራ መስክ ስፔሻላይዜሽን ማጥፊያ)</h4>

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
						<strong>You have added a new Specialization Successfully.</strong>

					</div>

				<?php

				}
			}

			?>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">About the number</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Delete_Specialization.php" method="POST">


							<div class="form-group">
								<label for="Name" class="col-sm-4 control-label">Specialization Name</label>
								<div class="col-sm-6">
									<?php echo($Name);?>


								</div>
							</div>

							<div class="form-group">
								<label for="Description_Amharic" class="col-sm-4 control-label">የስፔሻላይዜሽኑ ስም</label>
								<div class="col-sm-6">
									<?php echo($Name_Amharic);?>
								</div>
							</div>

							<input type="hidden" name="Specialization_ID" value="<?php echo($Specialization_ID);?>">

							<div class="form-group margin_top_30">

								<div class="col-sm-6 col-lg-offset-2">
									<a href="Specialization_List.php" class="btn btn-default col-sm-5">
										<strong>Cancel</strong>
									</a>


									<button type="submit" class="btn btn-danger col-sm-5 col-sm-offset-2">
										<strong>Delete</strong>
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