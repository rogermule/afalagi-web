<?php
//add the required and the
require('Require.php');
include('Building_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

	if(isset($_GET['Building_ID'])){
		$Building_ID = $_GET['Building_ID'];

		$Building = $operator->Get_Building_Info($Building_ID);
		$Building = mysqli_fetch_array($Building,MYSQLI_ASSOC);
		$Building_ID = $Building['BUL_ID'];
		$Building_Name = $Building['BUL_Name'];
		$Building_Name_Amharic = $Building['BUL_Name_Amharic'];
		$Building_Description =$Building['BUL_DESC'];
		$Building_Description_Amharic = $Building['BUL_DESC_AMH'];
		$Parking_Area_English =$Building['Parking_Area_English'];
		$Parking_Area_Amharic = $Building['Parking_Area_Amharic'];
		$Region = $Building['Region'];
		$Region_Amharic = $Building['Region_Amharic'];
		$City = $Building['City'];
		$City_Amharic = $Building['City_Amharic'];
		$Sub_City = $Building['Sub_City'];
		$Sub_City_Amharic = $Building['Sub_City_Amharic'];
		$Wereda = $Building['Wereda'];
		$Wereda_Amharic = $Building['Wereda_Amharic'];
		$Sefer = $Building['Sefer'];
		$Sefer_Amharic = $Building['Sefer_Amharic'];
		$Street = $Building['Street'];
		$Street_Amharic = $Building['Street_Amharic'];
		$Street_ID = $Building['Street_ID'];
		$Direction = $Building['Direction'];
		$Direction_Amharic = $Building['Direction_Amharic'];




	}
	else{
		echo('Data Base Error Go back');
	}


include('Building_Menu.html');
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
							<div class="col-sm-3 left_disc">የህንጻ ስም</div>
							<div class="col-sm-9 float_left"><?php echo($Building_Name_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ገለጻ</div>
							<div class="col-sm-9 float_left"><?php echo($Building_Description_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ክልል</div>
							<div class="col-sm-9 float_left"><?php echo($Region_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ከተማ</div>
							<div class="col-sm-9 float_left"><?php echo($City_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ክፍለ ከተማ</div>
							<div class="col-sm-9 float_left"><?php echo($Sub_City_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ወረዳ</div>
							<div class="col-sm-9 float_left"><?php echo($Wereda_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ሰፈር</div>
							<div class="col-sm-9 float_left"><?php echo($Sefer_Amharic);?></div>
						</div>
						<div class="single_info row">
					<div class="col-sm-3 left_disc">መንገድ</div>
					<div class="col-sm-9 float_left"><a href="../Street_Search/More_On_Street.php?Street_ID=<?php echo($Street_ID);?>"><?php echo($Street_Amharic);?></a></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">አቅጣጫ</div>
							<div class="col-sm-9 float_left"><?php echo($Direction_Amharic);?></div>
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
							<div class="col-sm-9 float_left"><?php echo($Building_Name);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Description</div>
							<div class="col-sm-9 float_left"><?php echo($Building_Description);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Region</div>
							<div class="col-sm-9 float_left"><?php echo($Region);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">City</div>
							<div class="col-sm-9 float_left"><?php echo($City);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Sub City</div>
							<div class="col-sm-9 float_left"><?php echo($Sub_City);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Wereda</div>
							<div class="col-sm-9 float_left"><?php echo($Wereda);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Sefer</div>
							<div class="col-sm-9 float_left"><?php echo($Sefer);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Street</div>
							<div class="col-sm-9 float_left"><a href="../Street_Search/More_On_Street.php?Street_ID=<?php echo($Street_ID);?>"><?php echo($Street);?></a></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Direction</div>
							<div class="col-sm-9 float_left"><?php echo($Direction);?></div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

<?php

include('Building_Footer.php');
?>