<?php

	require("Require.php");
 	include("Category_Header.php");
 	include("Encoder_Menu.html");

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object


	//get all the category from the database
	$category = $encoder->Get_Category();
	$num_category = mysqli_num_rows($category);
?>

<div class="col-sm-8 list_container margin_0">

<div class="col-sm-12">

<div class="panel panel-default">
	<div class="panel-body text-center">
		<h4>Add Category</h4>

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
		<h3 class="panel-title">Add Category</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form"
		      action="../../../../CONTROLLER/Encoder/Add_Category.php" method="POST">


			<div class="form-group">
				<label for="Category_Name" class="col-sm-4 control-label">Category</label>
				<div class="col-sm-5">
					<input name="Category_Name" type="text" class="form-control"
					       id="House_NO" placeholder="Enter Category Name" >
				</div>
			</div>


			<div class="form-group">
				<label for="Category_Name_Amharic" class="col-sm-4 control-label">የስራ መስክ</label>
				<div class="col-sm-5">
					<input name="Category_Name_Amharic" type="text" class="form-control"
					       id="House_NO" placeholder="የስራ መስክ ያስገቡ" >
				</div>
			</div>



			<div class="form-group margin_top_30">

				<div class="col-sm-5 col-lg-offset-4">
					<button type="submit" class="btn btn-success btn-block">
						<strong>Add Category</strong>
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

			<h4>List of Category</h4>

		</div>
	</div>


	<div class=" margin_top_30">
		<table class="table table-hover">
			<thead>

				<th>#</th>
 				<th>Category Name</th>
				<th>የስራ መስክ</th>

			</thead>
			<tbody>

			<?php
				$count = 0;
				$category_name = "";
				$category_name_amharic = "";

				if($category){
					while($cat = mysqli_fetch_array($category,MYSQLI_ASSOC)){
						$count++;
						$category_name = $cat['Name'];
						$category_name_amharic = $cat['Name_Amharic'];

						?>

						<tr>
							<td><?php echo($count); ?></td>
 							<td><?php echo($category_name); ?></td>
							<td><?php echo($category_name_amharic); ?></td>
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
	include("Encoder_Footer.php");
?>






