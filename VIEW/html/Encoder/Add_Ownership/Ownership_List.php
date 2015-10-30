<?php

require("Require.php");
include("Encoder_Header.php");
include("Includables.php");

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object


$Ownerships =$encoder->Get_Ownerships();

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
				$Ownership_name = $_GET['Ownership_Name'];
				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have added a new Ownership successfully.</strong>
					<br/>New Ownership --- <?php echo("$Ownership_name");?>
				</div>
			<?php
			}
			if(isset($_GET['success_edit'])){

				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have edited Ownership successfully.</strong>

				</div>

			<?php

			}

			if(isset($_GET['success_delete'])){

				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>You have deleted Ownership successfully.</strong>

				</div>

			<?php

			}
		}

		?>

		<div class="panel panel-primary list_header margin_top_10">
			<div class="panel-body text-center">
				<h4>List of Ownership</h4>
			</div>
		</div>
		<div class=" margin_top_30">
			<table class="table table-hover">
				<thead>
				<th>#</th>
				<th>Ownership Name</th>
				<th>የድርጅት ባለቤትነት አይነት</th>
				<th>Edit</th>
				</thead>
				<tbody>
				<?php
				$count = 0;
				$Ownership_name = "";
				$Ownership_name_amharic = "";
				$Ownership_id = "";

				if($Ownerships){
					while($cat = mysqli_fetch_array($Ownerships,MYSQLI_ASSOC)){
						$count++;
						$Ownership_name = $cat['Name'];
						$Ownership_name_amharic = $cat['Name_Amharic'];
						$Ownership_id = $cat['ID'];
						?>
						<tr>
							<td><?php echo($count); ?></td>
							<td><?php echo($Ownership_name); ?></td>
							<td><?php echo($Ownership_name_amharic); ?></td>
							<td>
								<a href="Edit_Ownership.php?Ownership_ID=<?php echo($Ownership_id);?>" class="btn btn-xs btn-warning">Edit</a>
								<a href="Delete_Ownership.php?Ownership_ID=<?php echo($Ownership_id);?>" class="btn btn-xs btn-danger">Delete</a>
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

