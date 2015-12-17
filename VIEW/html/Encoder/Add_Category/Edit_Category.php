<?php
require("Require.php");
include("Category_Header.php");
include("Includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object


if(isset($_GET['Category_ID'])){
	$Category_ID =$_GET['Category_ID'];
	$Single_Category = $encoder->Get_Single_Category($Category_ID);

	$Single_Category = mysqli_fetch_array($Single_Category,MYSQLI_ASSOC);

	$Name = $Single_Category['Name'];
	$Name_Amharic = $Single_Category['Name_Amharic'];
	$General_Category = $Single_Category['General_Category'];
}




?>

	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Edit Category</h4>

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


					$category_name = $_GET['Category_Name'];

					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have added a new Category successfully.</strong>
						<br/>New Category --- <?php echo("$category_name");?>
					</div>

				<?php

				}
			}

			?>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Category</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Edit_Category.php" method="POST">


							<div class="form-group">
								<label for="Name" class="col-sm-4 control-label">Category</label>
								<div class="col-sm-5">
									<input name="Name" type="text" class="form-control"
									       id="House_NO" placeholder="Enter Category Name" value="<?php echo($Name);?>" >
								</div>
							</div>


							<div class="form-group">
								<label for="Name_Amharic" class="col-sm-4 control-label">የስራ መስክ</label>
								<div class="col-sm-5">
									<input name="Name_Amharic" type="text" class="form-control"
									       id="House_NO" placeholder="የስራ መስክ ያስገቡ" value="<?php echo($Name_Amharic);?>" >
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-5 col-sm-offset-4">
									<input type="radio" name="General_Category" id="EDUCATIONAL" value="<?php echo(GeneralCategory::EDUCATIONAL);?>" <?php if($General_Category == GeneralCategory::EDUCATIONAL){echo("checked=\"\"");}?>> <label for="EDUCATIONAL"><?php echo(GeneralCategory::EDUCATIONAL);?> ( የትምህርት ተቋም )</label>
								</div>
								<div class="col-sm-5 col-sm-offset-4">
									<input  type="radio" name="General_Category" id="HEALTH" value="<?php echo(GeneralCategory::HEALTH);?>"<?php if($General_Category == GeneralCategory::HEALTH){echo("checked=\"\"");}?>> <label for="HEALTH"><?php echo(GeneralCategory::HEALTH);?> ( የጤና ተቋም )</label>
								</div>
								<div class="col-sm-5 col-sm-offset-4">
									<input type="radio" name="General_Category" id="RECREATIONAL" value="<?php echo(GeneralCategory::RECREATIONAL);?>" <?php if($General_Category == GeneralCategory::RECREATIONAL){echo("checked=\"\"");}?>> <label for="RECREATIONAL"><?php echo(GeneralCategory::RECREATIONAL);?> ( የመዝናኛ ተቋም )</label>
								</div>
								<div class="col-sm-5 col-sm-offset-4">
									<input type="radio" name="General_Category" id="NULL" value="<?php echo(GeneralCategory::NULL);?>" <?php if($General_Category == GeneralCategory::NULL){echo("checked=\"\"");}?>> <label for="NULL"><?php echo(GeneralCategory::NULL);?> ( ሌላ )</label>
								</div>
							</div>

							<input type="hidden" name="Category_ID" value="<?php echo($Category_ID);?>">

							<div class="form-group margin_top_30">

								<div class="col-sm-5 col-lg-offset-4">
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