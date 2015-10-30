<?php

require("Require.php");
include("Encoder_Header.php");
include("Includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object




?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Add Company Type</h4>

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



				$name = $_GET['Name'];
				$name_amharic = $_GET['Name_Amharic'];

				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have added a new Company ownership type Type successfully.</strong>
					<br/>New Company Type --- <?php echo("$name  ($name_amharic)");?>
				</div>

			<?php

			}
		}

		?>

		<div class=" margin_top_20">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add Company Ownership</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form"
					      action="../../../../CONTROLLER/Encoder/Add_Ownership.php" method="POST">


						<div class="form-group">
							<label for="Ownership" class="col-sm-4 control-label">Company Ownership  Type</label>
							<div class="col-sm-5">
								<input name="Ownership" type="text" class="form-control"
								       id="Company_Type" placeholder="Enter Company Type" >
							</div>
						</div>


						<div class="form-group">
							<label for="Ownership_Amharic" class="col-sm-4 control-label">የድርጅት ባለቤትነት አይነት ያስገቡ</label>
							<div class="col-sm-5">
								<input name="Ownership_Amharic" type="text" class="form-control"
								       id="House_NO" placeholder="የድርጅት ባለቤትነት አይነት ያስገቡ" >
							</div>
						</div>



						<div class="form-group margin_top_30">

							<div class="col-sm-5 col-lg-offset-4">
								<button type="submit" class="btn btn-success btn-block">
									<strong>Add Company Ownership Type</strong>
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
include("Encoder_Footer.php");
?>






