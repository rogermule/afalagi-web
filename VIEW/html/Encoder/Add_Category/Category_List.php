<?php
require("Require.php");
include("Category_Header.php");
include("Includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object


//get all the category from the database
$category = $encoder->Get_Category();
$num_category = mysqli_num_rows($category);

?>

<div class="col-sm-7 panel panel-primary">
	<div class="col-sm-12 margin_top_20 ">


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
			if(isset($_GET['success_edit'])){

 				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have edited Category successfully.</strong>

				</div>

			<?php

			}

			if(isset($_GET['success_delete'])){

				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have deleted Category successfully.</strong>

				</div>

			<?php

			}
		}

		?>

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
				<th>Edit</th>
				</thead>
				<tbody>
				<?php
				$count = 0;
				$category_name = "";
				$category_name_amharic = "";
				$category_id = "";

				if($category){
					while($cat = mysqli_fetch_array($category,MYSQLI_ASSOC)){
						$count++;
						$category_name = $cat['Name'];
						$category_name_amharic = $cat['Name_Amharic'];
						$category_id = $cat['ID'];
 						?>
 						<tr>
							<td><?php echo($count); ?></td>
							<td><?php echo($category_name); ?></td>
							<td><?php echo($category_name_amharic); ?></td>
							<td>
		<a href="Edit_Category.php?Category_ID=<?php echo($category_id);?>" class="btn btn-xs btn-warning">Edit</a>
		<a href="Delete_Category.php?Category_ID=<?php echo($category_id);?>" class="btn btn-xs btn-danger">Delete</a>
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

<?php
	include("Encoder_Footer.php");
?>



