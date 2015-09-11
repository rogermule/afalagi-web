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
                    <h4>Register a new Employee to Afalagi.</h4>
                    <span>Afalagi welcomes the new employee.</span>
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

			            $user_name = $_GET['User_Name'];
			            $user_type = $_GET['User_Type'];

			            ?>
            <div class="alert alert-success alert-dismissable">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <strong>You have added a new user successfully.</strong>
	            <br/>User -> <?php echo($user_name);?>,... Works as -><?php echo($user_type);?>
            </div>

	                    <?php

		            }
	            }

	        ?>



            <div class="col-sm-8 col-sm-offset-1 margin_top_30">
                <form class="form-horizontal" role="form" action="../../../CONTROLLER/Admin_Add_User.php" method="POST">


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
                        <div class="col-sm-8">
                            <input name="User_Name" type="text" class="form-control" id="inputEmail3" placeholder="Enter user name">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">

                            <input name="User_Password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">

                            <input name="User_Phone" class="form-control" id="phone" placeholder="Phone Number">

                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-4 control-label">Employee Type</label>
                        <div class="col-sm-8">
                            <label  class="col-sm-3 control-label" form="Operator">Operator</label>

                            <input name="User_Type" class="col-sm-1" type="radio"  id="Operator" value="OPERATOR">

                            <label  class="col-sm-3 col-sm-offset-2 control-label" form="Operator">Encoder</label>

                             <input name="User_Type" class="col-sm-1" type="radio" id="Encoder" value="ENCODER">

                        </div>
                    </div>


                    <div class="form-group margin_top_51">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary btn-block"><strong>Register</strong></button>
                        </div>
                    </div>
                </form>

            </div>



        </div>



    </div>

</div>


<!--end of employee managing page-->
