<?php
require("Require.php");
include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object




$Companies = $encoder->Get_Companies_For_Different_Listing_All(Registration_Type::SILVER);
$Num_Companies= mysqli_num_rows($Companies);
?>
<div class="col-sm-8 list_container margin_0">
<div class="col-sm-12">
<div class="col-sm-12 margin_top_10">

<div class="panel panel-primary list_header margin_top_10 silver_b">
	<div class="panel-body text-center">
		<h4>List of Silver Companies (ሁሉም የነሃስ የድርጅት ዝርዝር በስም)</h4>
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

<hr>
<div class="row">
	<div class="col-md-6">Number of companies (የድርጅትች ብዛት)=  </div>
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

