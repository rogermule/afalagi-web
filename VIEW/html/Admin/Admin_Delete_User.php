<?php

if($_SERVER['REQUEST_METHOD'] == "GET"){



	$deleted_user_id = $_GET['ID'];
	$user = $_SESSION['Logged_In_User'];
	$admin_controller = new Admin_Controller($user);


	// user will contain all information about the deleted user
	//then we will gather information about the user and set those values on the
	//delete forms


	$deleted_user = $admin_controller->Get_User($deleted_user_id);

	$deleted_user = mysqli_fetch_array($deleted_user,MYSQL_ASSOC);


	/**
	 * this will hold values for the user that is going to be updated
	 */
	$deleted_user_name = $deleted_user['User_Name'];
 	$deleted_user_phone = $deleted_user['User_Phone'];
 	$deleted_user_registration_date = $deleted_user['User_Registration_Date'];
 	$deleted_user_type = $deleted_user['User_Type'];


}
else{

	redirect_to_index();
	//if the user id is not set redirect to index
}



?>


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


<div class=" row list_container margin_0">


            <div class="col-sm-12">

                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h4>Delete an employee from afalagi.</h4>
                        <span>Are you sure you want to delete a user</span>
                    </div>
                </div>





                <div class="col-sm-6 col-sm-offset-3 margin_top_30">
                    <form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Delete_User.php" method="POST">


                        <div class="form-group">
                            <label   class="col-sm-6 control-label">User Name</label>
                            <label   class="col-sm-6 control-label left"><?php echo($deleted_user_name);?></label>


                        </div>


                        <div class="form-group">
                            <label class="col-sm-6 control-label">Phone</label>
                            <label   class="col-sm-6 control-label left"><?php echo($deleted_user_phone);?></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label">Started Working</label>
                <label   class="col-sm-6 control-label left"><?php echo($deleted_user_registration_date);?></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label">Works As</label>
                            <label   class="col-sm-6 control-label left"><?php echo($deleted_user_type);?></label>
                        </div>


                        <div class="alert alert-danger text-center">

                            <strong>Are You Sure you want to delete <?php echo($deleted_user_name);?></strong>
                        </div>
	                    <input type="hidden" name="ID" value="<?php echo($deleted_user_id);?>">

                        <div class="form-group margin_top_51">
	                        <div class="col-sm-offset-1 col-sm-4">
		                        <a href="Admin_Home_Page.php" class="btn btn-default btn-block" role="button">cancel</a>
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