<?php
/**
 * get the write information from the database and set the values
 * to the forms
 */


/**
 * First check if the get value are set and if they are set continue
 */


if($_SESSION["Logged_In_User"]){


	$user = $_SESSION['Logged_In_User'];

	$admin_user_name =$user->getUserName();
	$admin_user_id = $user->getUserID();



}
else{

//
	//if the user id is not set redirect to index
}

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		if(isset($_GET["success"])){
			?>

			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>You have updated your profile successfully.</strong>

			</div>
			<?php
		}
		else{

			if(isset($_GET['error'])){
				$error_msg  = $_GET["error"];
				?>

				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Warning!</strong><?php echo($error_msg);?>
				</div>

				<?php
			}
			?>

			<!--start of the workers managing page-->

			<div class="col-sm-8 margin_top_10">

				<!--start of the navigation bar-->
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Manage Employees</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li ><a href="Admin_Home_Page.php">
										<span class="glyphicon glyphicon-folder-open m_r_10"></span>
										All Employees
									</a></li>
								<li class="active"><a href="#">
										<span class="glyphicon glyphicon glyphicon-plus m_r_10"></span>
										Add Employee
									</a></li>

							</ul>


						</div>
					</div>
				</nav>
				<!--end of navigation bar-->



				<!--start of the workers list-->

				<div class=" row list_container margin_0">


					<div class="col-sm-12">

						<div class="panel panel-default">
							<div class="panel-body text-center">
								<h4>Edit your profile.</h4>
								<span>Just a click away to edit your profile.</span>
							</div>
						</div>




						<div class="col-sm-8 col-sm-offset-1 margin_top_30">
							<form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Edit_Profile.php" method="POST">


								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
									<div class="col-sm-8">
										<input name="User_Name" type="text" class="form-control" id="inputEmail3" placeholder="Enter user name" value="<?php echo("$admin_user_name");?>">
									</div>
								</div>


								<div class="form-group">
									<label for="inputPassword3" class="col-sm-4 control-label">Previous Password</label>
									<div class="col-sm-8">

										<input name="Previous_Password" type="password" class="form-control" id="inputPassword3" placeholder="Password" >
									</div>
								</div>


								<div class="form-group">
									<label for="phone" class="col-sm-4 control-label">New Password</label>
									<div class="col-sm-8">

										<input name="New_Password" class="form-control" id="phone" placeholder="Phone Number">

									</div>
								</div>


 						<input type="hidden" name="ID" value="<?php echo($admin_user_id);?>">



								<div class="form-group margin_top_51">
									<div class="col-sm-offset-4 col-sm-3">
										<a href="Admin_Home_Page.php" class="btn btn-default btn-block" role="button">cancel</a>
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

			<!--end of employee managing page-->

			<?php
		}
	}
	else{
		redirect_to_index();
	}


?>


