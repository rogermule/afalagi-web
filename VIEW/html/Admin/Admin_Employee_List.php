<!--start of the workers managing page-->

<?php

	$user = $_SESSION['Logged_In_User'];
	$admin_user = new Admin_Controller($user);

	/**
	 * encoder will hold employee list that will serve as an encoders
	 * operator will hold employee list that will serve as an operators
	 */

	$Encoder = $admin_user->Get_Users(User_Type::ENCODER);
	$Operator = $admin_user->Get_Users(User_Type::OPERATOR);
	$num_of_encoders = mysqli_num_rows($Encoder);
	$num_of_operator = mysqli_num_rows($Operator);

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
                <li class="active"><a href="#">
                    <span class="glyphicon glyphicon-folder-open m_r_10"></span>
                    All Employees
                </a></li>
                <li><a href="Admin_Add_Users.php">
                    <span class="glyphicon glyphicon glyphicon-plus m_r_10"></span>
                    Add Employee
                </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--end of navigation bar-->

<!--start of the workers list-->

<div class=" row list_container margin_0">
<div class="col-sm-6">

    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Encoders</h4>
            <span><?php echo($num_of_encoders);?> operators</span>
        </div>
    </div>
    <ul class="list-group">

	   <?php

	   $count = 0;
 		if($Encoder){

		   while($Encoders = mysqli_fetch_array($Encoder,MYSQL_ASSOC)){
			   $single_user_id = $Encoders['ID'];
			   $single_user_name = $Encoders['User_Name'];
			   $single_user_phone = $Encoders['User_Phone'];
			   $single_registration_date = $Encoders['User_Registration_Date'];
				$count++;

			   include("Admin_Single_User_View.php");
		   }
		}
		else{
		   echo("<h4>No registered Encoder</h4>");
		}
 	   ?>

    </ul>


</div>
<div class="col-sm-6">

<div class="panel panel-default">
    <div class="panel-body">
        <h4>Operators</h4><span><?php echo($num_of_operator);?> operators</span>
    </div>
</div>
<ul class="list-group">

 	<?php

	if($Operator){

		$count = 0;

		while($Operators = mysqli_fetch_array($Operator,MYSQL_ASSOC)){
			$single_user_id = $Operators['ID'];
			$single_user_name = $Operators['User_Name'];         //will hold the username
			$single_user_phone = $Operators['User_Phone'];        //will hold the user phone number
			$single_registration_date = $Operators['User_Registration_Date'];
			$count++;
			include("Admin_Single_User_View.php");
		}
	}
	else{
		echo("<h4>No registered Encoder</h4>");
	   }

	?>

</ul>

</div>
</div>

</div>

<!--end of the employee list-->