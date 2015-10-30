<?php
require("Require.php");
include("Category_Header.php");
include("Includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

	if(isset($_GET['Category_ID'])){
		$Category_ID = $_GET['Category_ID'];
	}

	$Single_Category = $encoder->Get_Single_Category($Category_ID);
 	$Single_Category = mysqli_fetch_array($Single_Category,MYSQLI_ASSOC);
 	$Name = $Single_Category['Name'];
	$Name_Amharic = $Single_Category['Name_Amharic'];
?>


<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h4>Delete Category</h4>
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
		}
		?>


		<div class=" margin_top_20">
			<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Delete_Category.php" method="POST">


				<div class="form-group">
					<label for="Name" class="col-sm-6 control-label">Category</label>
					<label for="Name" class="col-sm-6 control-label left"><?php echo($Name);?></label>
				</div>
				<div class="form-group">
					<label for="Name_Amharic" class="col-sm-6 control-label">የስራ መስክ</label>
					<label for="Name" class="col-sm-6 control-label left"><?php echo($Name_Amharic)?></label>
				</div>


				<input type="hidden" name="Category_ID" value="<?php echo($Category_ID);?>">

				<div class="alert alert-danger text-center margin_top_70">

					<strong>Are You sure you want to delete <?php echo($Name);?></strong>
				</div>


				<div class="form-group margin_top_20">

					<div class="col-sm-3 col-lg-offset-3">
						<a href="Category_List.php" class="btn btn-info btn-block">Cancel</a>
					</div>

					<div class="col-sm-3 ">
						<button type="submit" class="btn btn-danger btn-block"><strong>Delete</strong>
						</button>
					</div>

				</div>
			</form>

		</div>


	</div>

</div>

<?php
include("Encoder_Footer.php");
?>
