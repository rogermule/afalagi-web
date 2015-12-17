<?php
//add the required and the
require('Require.php');
include('Street_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

		if(isset($_GET['Street_ID'])){

			$Street_ID = $_GET['Street_ID'];
			$Street = $operator->Get_Single_Street($Street_ID);
			$Street = mysqli_fetch_array($Street,MYSQLI_ASSOC);

			$Name = $Street['Name'];
			$Name_Amharic = $Street['Name_Amharic'];
			$About_Street = $Street['About_Street'];
			$About_Street_Amharic =$Street['About_Street_Amharic'];

		}



include('Street_Menu.html');
?>

	<div class="col-sm-7  list_container">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h1>አፋላጊ</h1>

				</div>
			</div>

			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">አጠቃላይ መረጃ</h3>
					</div>
					<div class="panel-body">

						<div class="single_info row">
							<div class="col-sm-3 left_disc">ስም</div>
							<div class="col-sm-9 float_left"><?php echo($Name_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ገለጻ</div>
							<div class="col-sm-9 float_left"><?php echo($About_Street_Amharic);?></div>
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
							<div class="col-sm-3 left_disc">Name</div>
							<div class="col-sm-9 float_left"><?php echo($Name);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">About</div>
							<div class="col-sm-9 float_left"><?php echo($About_Street);?></div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>


<?php

include('Street_Footer.php');
?>