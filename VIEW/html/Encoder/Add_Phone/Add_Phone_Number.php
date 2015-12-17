<?php

	include "Require.php";
	include "Encoder_Header.php";
	include "Includeables.php";




?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Add Short And Important Telephone NO (ስልክ መጨመርያ)</h4>

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
						<h3 class="panel-title">About the number</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Add_Famous_Phone.php" method="POST">


							<div class="form-group">
								<label for="Phone" class="col-sm-4 control-label">Telephone NO</label>
								<div class="col-sm-6">
									<input name="Phone" type="text" class="form-control"
									       id="Phone" placeholder="Telephone Number" >
								</div>
							</div>


							<div class="form-group">
								<label for="Description" class="col-sm-4 control-label">Description</label>
								<div class="col-sm-6">
									<textarea name="Description" class="form-control"
									          rows="3"  id="Description"
									          placeholder="What is the purpose of the number,Or the owner of the number"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="Description_Amharic" class="col-sm-4 control-label">ገለጻ</label>
								<div class="col-sm-6">
									<textarea name="Description_Amharic" class="form-control"
									          rows="3"
									          placeholder="ስለስልኩ ገለጻ"></textarea>
								</div>
							</div>


							<div class="form-group margin_top_30">

								<div class="col-sm-6 col-lg-offset-4">
									<button type="submit" class="btn btn-success btn-block">
										<strong>Add Telephone number</strong>
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