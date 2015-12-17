<?php
//add the required and the
require('Require.php');
include('Phone_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

	if(isset($_GET['Phone_ID'])){
		$Phone_ID = $_GET['Phone_ID'];

		$Phone = $operator->Get_Single_Phone($Phone_ID);

		$Phone = mysqli_fetch_array($Phone,MYSQLI_ASSOC);

		$Phone_No = $Phone['Phone'];
		$Description = $Phone['Description'];
		$Description_Amharic = $Phone['Description_Amharic'];
	}


include('Phone_Menu.html');
?>

	<div class="col-sm-7  list_container">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h1>አፋላጊ</h1>
					<h4>More Data For Phone</h4>

				</div>
			</div>

			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">አጠቃላይ መረጃ</h3>
					</div>
					<div class="panel-body">

						<div class="single_info row">
							<div class="col-sm-3 left_disc">Phone No</div>
							<div class="col-sm-9 float_left"><?php echo($Phone_No);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ገለጻ</div>
							<div class="col-sm-9 float_left"><?php echo($Description_Amharic);?></div>
						</div>
					</div>
				</div>

			</div>
			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Information </h3>
					</div>
					<div class="panel-body">

						<div class="single_info row">
							<div class="col-sm-3 left_disc">Phone </div>
							<div class="col-sm-9 float_left"><?php echo($Phone_No);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">About</div>
							<div class="col-sm-9 float_left"><?php echo($Description);?></div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

<?php
include('Phone_Footer.php');
?>