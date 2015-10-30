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

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Edit profile of the your employees.</h4>
					<span>Just a click away to edit profiles.</span>
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


			<div class="col-sm-10 col-sm-offset-1 margin_top_30">
				<form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Edit_User.php" method="POST">



					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-6">
							<input name="User_Name" type="text" class="form-control" id="inputEmail3" placeholder="Enter user name" value="<?php echo("$Employee_Name");?>">
						</div>
					</div>


					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-6">

							<input name="User_Password" type="password" class="form-control" id="inputPassword3" placeholder="Password" >
						</div>
					</div>


					<div class="form-group">
						<label for="phone" class="col-sm-3 control-label">Phone</label>
						<div class="col-sm-6">

							<input name="User_Phone" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo("$Employee_Phone");?>">

						</div>
					</div>


					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee Type</label>
						<div class="col-sm-9">


							<div class="col-sm-4">

		<input name="User_Type" class="col-sm-1" type="radio" id="Encoder" value="ENCODER"                                                      <?php if($Employee_Type == User_Type::ENCODER){ echo("checked"); } ?>>

								<p class="user_types">Super Encoder</p>
							</div>
							<div class="col-sm-4">

			<input name="User_Type" class="col-sm-1" type="radio" id="NORMAL_Encoder" value="NORMAL_ENCODER"
	<?php if($Employee_Type == User_Type::NORMAL_ENCODER){ echo("checked"); } ?>>
				<p class="user_types">Normal Encoder</p>
							</div>
							<div class="col-sm-4">
								<input name="User_Type" class="col-sm-1" type="radio" id="Operator" value="OPERATOR" <?php if($Employee_Type == User_Type::OPERATOR){echo("checked");}?>>

								<p class="user_types">Operator</p>

							</div>



						</div>
					</div>


					<input type="hidden" name="User_ID" value="<?php echo($User_ID);?>">


					<div class="form-group margin_top_51">
						<div class="col-sm-3 col-sm-offset-2 ">
							<a href="Employee_List.php" class="btn btn-default btn-block" role="button">cancel</a>
						</div>
						<div class="col-sm-offset-1 col-sm-3">
							<button type="submit" class="btn btn-success btn-block"><strong>Save</strong>
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
