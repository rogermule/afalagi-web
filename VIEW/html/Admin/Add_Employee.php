<?php

require('Require.php');
require('Admin_Header.php');
require('Admin_Menu2.html');

$user = $_SESSION['Logged_In_User'];
$admin_con = new Admin_Controller($user);



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

				if(isset($_GET['success'])){

					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have added a Employee successfully.</strong>

						<br/>
					</div>
				<?php
				}
			}
			?>


			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h2>Add Employee</h2>
				</div>
			</div>


			<div class="col-sm-10 col-sm-offset-1 margin_top_30">
				<form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Add_User.php" method="POST">

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-7">
							<input name="User_Name" type="text" class="form-control" id="inputEmail3" placeholder="Enter user name"  >
						</div>
					</div>
 					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-7">

							<input name="User_Password" type="password" class="form-control" id="inputPassword3" placeholder="Password" >
						</div>
					</div>
 					<div class="form-group">
						<label for="phone" class="col-sm-3 control-label">Phone</label>
						<div class="col-sm-7">
 	<input name="User_Phone" class="form-control" id="phone" placeholder="Phone Number"  >
 						</div>
					</div>


 					<div class="form-group">
						<label  class="col-sm-3 control-label">Employee Type</label>
						<div class="col-sm-9">

						<div class="col-sm-4">
 						<input name="User_Type" class="col-sm-1" type="radio" id="Encoder" value="ENCODER"  >
 						<p class="user_types">Super Encoder</p>
							</div>
						<div class="col-sm-4">

							<input name="User_Type" class="col-sm-1" type="radio" id="NORMAL_Encoder" value="NORMAL_ENCODER" >
							<p class="user_types">Normal Encoder</p>
						</div>
						<div class="col-sm-4">
						<input name="User_Type" class="col-sm-1" type="radio" id="Operator" value="OPERATOR"  >
 							<p class="user_types">Operator</p>
 						</div>

						</div>
					</div>


 					<div class="form-group margin_top_51">

						<div class="col-sm-offset-4 col-sm-5">
							<button type="submit" class="btn btn-success btn-block"><strong>Register</strong>
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
