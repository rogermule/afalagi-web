<?php
/**
 * get the write information from the database and set the values
 * to the forms
 */


/**
 * First check if the get value are set and if they are set continue
 */


if($_SERVER['REQUEST_METHOD'] == "GET"){



	$edited_user_id = $_GET['ID'];
	$user = $_SESSION['Logged_In_User'];
	$admin_controller = new Admin_Controller($user);


	//edited user will contain all information about the edited user
	//then we will gather information about the user and set those values on the
	//edit forms
	$edited_user = $admin_controller->Get_User($edited_user_id);

	$edited_user = mysqli_fetch_array($edited_user,MYSQL_ASSOC);


	/**
	 * this will hold values for the user that is going to be updated
 	 */
	$edited_user_name = $edited_user['User_Name'];

	$edited_user_phone = $edited_user['User_Phone'];

	$edited_user_type = $edited_user['User_Type'];


}
else{

	redirect_to_index();
	//if the user id is not set redirect to index
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
							Edit Employee
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
					<h4>Edit profile of the your employees.</h4>
					<span>Just a click away to edit profiles.</span>
				</div>
			</div>




			<div class="col-sm-8 col-sm-offset-1 margin_top_30">
				<form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Edit_User.php" method="POST">


					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
						<div class="col-sm-8">
							<input name="User_Name" type="text" class="form-control" id="inputEmail3" placeholder="Enter user name" value="<?php echo("$edited_user_name");?>">
						</div>
					</div>


					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">

							<input name="User_Password" type="password" class="form-control" id="inputPassword3" placeholder="Password" >
						</div>
					</div>


					<div class="form-group">
						<label for="phone" class="col-sm-4 control-label">Phone</label>
						<div class="col-sm-8">

							<input name="User_Phone" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo("$edited_user_phone");?>">

						</div>
					</div>




					<div class="form-group">
						<label  class="col-sm-4 control-label">Employee Type</label>
						<div class="col-sm-8">
							<label  class="col-sm-3 control-label" form="Operator">Operator</label>

							<input name="User_Type" class="col-sm-1" type="radio" id="Operator" value="OPERATOR"
								<?php
								if($edited_user_type == User_Type::OPERATOR){
									echo("checked=\"checked\"");
								}
								?>>

							<label  class="col-sm-3 col-sm-offset-2 control-label" form="Operator">Encoder</label>

							<input name="User_Type" class="col-sm-1" type="radio" id="Encoder" value="ENCODER"                          <?php
							if($edited_user_type == User_Type::ENCODER){
								echo("checked=\"checked\"");
							}
						?>>

						</div>
					</div>


					<input type="hidden" name="ID" value="<?php echo($edited_user_id);?>">



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