<?php

require('Require.php');
require('Admin_Header.php');
require('Admin_Menu2.html');
$user = $_SESSION['Logged_In_User'];
$admin_con = new Admin_Controller($user);

if(isset($_GET['User_ID'])){

	$User_ID = $_GET['User_ID'];
	$Single_User = $admin_con->Get_User($User_ID);

	$Single_User = mysqli_fetch_array($Single_User,MYSQLI_ASSOC);

	$Employee_Name = $Single_User['User_Name'];
	$Employee_Phone = $Single_User['User_Phone'];
	$Employee_Type = $Single_User['User_Type'];
}
?>

	<div class="col-sm-8 col-sm-offset-1 margin_top_51 list_container">
		<div class=" row list_container margin_0">


			<div class="col-sm-12">

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


				<div class="panel panel-default">
					<div class="panel-body text-center">
						<h2 class="red">Delete Employee</h2>
					</div>
				</div>


<div class="col-sm-6 col-sm-offset-3 margin_top_30">
	<form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Delete_User.php" method="POST">

		<div class="form-group">
			<label   class="col-sm-6 control-label">User Name</label>
			<label   class="col-sm-6 control-label left"><?php echo($Employee_Name);?></label>
		</div>

		<div class="form-group">
			<label class="col-sm-6 control-label">Phone</label>
			<label   class="col-sm-6 control-label left"><?php echo($Employee_Phone);?></label>
		</div>

		<div class="form-group">
			<label class="col-sm-6 control-label">Works As</label>
			<label   class="col-sm-6 control-label left"><?php echo($Employee_Type);?></label>
		</div>

		<div class="alert alert-danger text-center">
 			<strong>Are You Sure you want to delete <?php echo($Employee_Name);?></strong>
		</div>

		<input type="hidden" name="User_ID" value="<?php echo($User_ID);?>">

		<div class="form-group margin_top_51">
			<div class="col-sm-offset-1 col-sm-4">
				<a href="Employee_List.php" class="btn btn-default btn-block" role="button">cancel</a>
			</div>
			<div class="col-sm-offset-2 col-sm-4">
				<button type="submit" class="btn btn-danger btn-block"><strong>Delete</strong>
				</button>
			</div>
		</div>


	</form>

</div>



			</div>



		</div>
	</div>

<?php
require('Admin_Fotter.php');
?>