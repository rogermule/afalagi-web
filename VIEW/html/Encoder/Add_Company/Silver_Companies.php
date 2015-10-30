<?php
require("Require.php");
include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

if(isset($_GET['Sort'])){
	$Name_Start = $_GET['Name_Start'];
	$Companies = $encoder->Get_Companies_For_Different_Listings(Registration_Type::SILVER,$Name_Start);
	$Num_Companies= mysqli_num_rows($Companies);
}
else{
	$Companies = $encoder->Get_Companies_For_Different_Listings(Registration_Type::SILVER);
	$Num_Companies = mysqli_num_rows($Companies);
	$Name_Start = 'A';
}
?>
<div class="col-sm-8 list_container margin_0">
<div class="col-sm-12">
<div class="col-sm-12 margin_top_10">

<div class="panel panel-primary list_header margin_top_10 silver_b">
	<div class="panel-body text-center">
		<h4>List of Silver Companies</h4>
	</div>
</div>

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
		$company_name = $_GET["Company_Name"];
		$company_name_amharic = $_GET["Company_Name_Amharic"];
		?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>You have Edited a company successfully.</strong>
			<br/>Edited -- <?php echo("$company_name ($company_name_amharic)");?>
			<br/>
		</div>
	<?php
	}

	if(isset($_GET['success_delete'])){

		?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>You have deleted a company successfully</strong>

			<br/>
		</div>

	<?php

	}
}
?>
<div class="col-sm-12 text-center margin_top_20">

	<a href="Silver_Companies.php?Sort=1&Name_Start=A" class="btn btn-success btn-xs">A</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=B" class="btn btn-success btn-xs">B</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=C" class="btn btn-success btn-xs">C</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=D" class="btn btn-success btn-xs">D</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=E" class="btn btn-success btn-xs">E</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=F" class="btn btn-success btn-xs">F</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=G" class="btn btn-success btn-xs">G</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=H" class="btn btn-success btn-xs">H</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=I" class="btn btn-success btn-xs">I</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=J" class="btn btn-success btn-xs">J</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=K" class="btn btn-success btn-xs">K</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=L" class="btn btn-success btn-xs">L</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=M" class="btn btn-success btn-xs">M</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=N" class="btn btn-success btn-xs">N</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=O" class="btn btn-success btn-xs">O</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=P" class="btn btn-success btn-xs">P</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=Q" class="btn btn-success btn-xs">Q</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=R" class="btn btn-success btn-xs">R</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=S" class="btn btn-success btn-xs">S</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=T" class="btn btn-success btn-xs">T</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=U" class="btn btn-success btn-xs">U</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=V" class="btn btn-success btn-xs">V</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=W" class="btn btn-success btn-xs">W</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=X" class="btn btn-success btn-xs">X</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=Y" class="btn btn-success btn-xs">Y</a>
	<a href="Silver_Companies.php?Sort=1&Name_Start=Z" class="btn btn-success btn-xs">Z</a>


</div>
<hr>
<div class="row">
	<div class="col-md-5">Number of companies starting with <span class="btn btn-danger indicator"> <?php echo($Name_Start);?> </span>  </div>
	<div class="col-md-3 indicator"><?php   echo($Num_Companies)?></div>
</div>
<hr>


<div class=" margin_top_30">
	<table class="table table-hover">
		<thead>
		<th>#</th>
		<th>Reg</th>


		<th>Company Name</th>
		<th>የድርጅቱ ስም</th>
		<th>የስራ መስክ</th>
		<th>Stat</th>
		<th>Edit</th>

		</thead>
		<tbody>

		<?php
		$Count = 0;
		$Company_ID = "";
		$Company_Name = "";
		$Company_Name_Amharic = "";
		$Registration_Type = "";

		if($Companies){
			while($com = mysqli_fetch_array($Companies,MYSQLI_ASSOC)){
				$Company_ID =$com["company_id"];

				$Company_Name = $com["company_name"];
				$Company_Name_Amharic = $com["company_name_amharic"];
				$Category_Amharic =$com["category_amharic"];
				$Belong_to = $com["belong_to"];
				$Registration_Type = $com['Registration_Type'];
				$Registration_Stat = $com['Expiration_Date'];
				$Count++;

				?>

				<tr>
					<td><?php echo("$Count"); ?></td>
					<td>
						<?php
						if($Registration_Type == Registration_Type::GOLD){
							?>
							<span class="glyphicon glyphicon-certificate gold"> G</span>
						<?php
						}
						else if($Registration_Type == Registration_Type::SILVER){
							?>
							<span class="glyphicon glyphicon-certificate silver"> S</span>
						<?php
						}
						else if($Registration_Type == Registration_Type::BRONZE){
							?>
							<span class="glyphicon glyphicon-certificate bronze"> B</span>
						<?php
						}
						else if($Registration_Type == Registration_Type::NOT_OFFICIAL){
							?>
							<span class="glyphicon glyphicon-remove red"></span>
						<?php
						}


						?>


					</td>

					<td><?php echo("$Company_Name");?></td>
					<td><?php echo("$Company_Name_Amharic");?></td>

					<td><?php echo("$Category_Amharic");?></td>
					<td>
						<?php if($Registration_Stat == Registration_Status::EXPIRED ){

							?>
							<strong class="red">EXPIRED</strong>
						<?php
						}
						else{
							?>
							<strong class="green">NOT EXPIRED</strong>
						<?php
						}

						?>
					</td>

					<td>
						<p>


							<?php
							if($Belong_to == Belong::COMPANY_WITH_BUILDING ){

								?>
								<a class="btn btn-warning btn-xs" href=" Edit_Company.php?CB=1&company_id=<?php echo($Company_ID);?>">Edit</a>
								<a class="btn btn-danger btn-xs" href="Delete_Company.php?Delete=1&company_id=<?php echo($Company_ID);?>&on_building=1">Delete</a>

							<?php

							}
							else if($Belong_to == Belong::COMPANY_WITH_OUT_BUILDING){

								?>
								<a class="btn btn-warning btn-xs" href="Edit_Company.php?CA=1&company_id=<?php echo($Company_ID);?>">Edit</a>
								<a class="btn btn-danger btn-xs" href="Delete_Company.php?Delete=1&company_id=<?php echo($Company_ID);?>">Delete</a>

							<?php
							}
							?>


						</p>
					</td>

				</tr>

			<?php
			}
		}

		?>


		</tbody>
	</table>
</div>



</div>

</div>
</div>



<?php
include "Encoder_Footer.php";
?>

