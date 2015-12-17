<?php

require('Require.php');
require('Admin_Header.php');
require('Admin_Menu2.html');

	$user = $_SESSION['Logged_In_User'];
	$admin_con = new Admin_Controller($user);

	//get the encoders
	$encoders = $admin_con->Get_Users(User_Type::ENCODER);
	//get the normal encoders
	$normal_encoders = $admin_con->Get_Users(User_Type::NORMAL_ENCODER);
	//get the operators
	$operators = $admin_con->Get_Users(User_Type::OPERATOR);

?>

<div class="col-sm-8 col-sm-offset-1 margin_top_51 list_container">

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

		if(isset($_GET['success_edit'])){

			?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>You have edited an Employee successfully.</strong>

				<br/>
			</div>

		<?php
		}
		if(isset($_GET['success_delete'])){

			?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>You have deleted Employee successfully.</strong>

				<br/>
			</div>
		<?php
		}
	}
	?>

	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Super Encoder</h4>
			</div>
		</div>
		<ul class="list-group">

			<?php

			$count = 0;
			if($encoders){
				while($Encoder = mysqli_fetch_array($encoders,MYSQL_ASSOC)){
					$single_user_id = $Encoder['ID'];
					$single_user_name = $Encoder['User_Name'];

 					$count++;
					include("Single_Employee_View.php");
				}
			}
			else{
				echo("<h4>No registered Encoder</h4>");
			}
			?>

		</ul>
	</div>


	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Normal Encoder</h4>
			</div>
		</div>
		<ul class="list-group">
 			<?php
 			$count = 0;
			if($normal_encoders){
				while($normal_encoder = mysqli_fetch_array($normal_encoders,MYSQL_ASSOC)){
					$single_user_id = $normal_encoder['ID'];
					$single_user_name = $normal_encoder['User_Name'];

					$count++;
					include("Single_Employee_View.php");
				}
			}
			else{
				echo("<h4>No registered Encoder</h4>");
			}
			?>

		</ul>
	</div>


	<div class="col-sm-4">
		<div class="panel panel-danger">
			<div class="panel-body">
				<h4>Operators</h4>
			</div>
		</div>
		<ul class="list-group">
 			<?php
 			$count = 0;
			if($operators){
				while($operator = mysqli_fetch_array($operators,MYSQL_ASSOC)){
					$single_user_id = $operator['ID'];
					$single_user_name = $operator['User_Name'];
 					$count++;
					include("Single_Employee_View.php");
				}
			}
			else{
				echo("<h4>No registered Encoder</h4>");
			}
			?>

		</ul>
	</div>


</div>

<?php

require('Admin_Fotter.php');
?>




