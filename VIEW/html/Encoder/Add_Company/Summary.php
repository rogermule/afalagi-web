<?php
require("Require.php");
include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

	$Gold_Companies = $encoder->Get_Companies_For_Summary(Registration_Type::GOLD);
	$Expired_Gold_Companies = $encoder->Get_Expired_Companies_For_Summary(Registration_Type::GOLD);
	$Not_Expired_Gold_Companies = $encoder->Get_Not_Expired_Companies_For_Summary(Registration_Type::GOLD);


	$Silver_Companies = $encoder->Get_Companies_For_Summary(Registration_Type::SILVER);
	$Expired_Silver_Companies =$encoder->Get_Expired_Companies_For_Summary(Registration_Type::SILVER);
	$Not_Expired_Silver_Companies = $encoder->Get_Not_Expired_Companies_For_Summary(Registration_Type::SILVER);



	$Bronze_Companies = $encoder->Get_Companies_For_Summary(Registration_Type::BRONZE);
	$Expired_Bronze_Companies = $encoder->Get_Expired_Companies_For_Summary(Registration_Type::BRONZE);
	$Not_Expired_Bronze_Companies = $encoder->Get_Not_Expired_Companies_For_Summary(Registration_Type::BRONZE);

	$Not_Official_Companies = $encoder->Get_Companies_For_Summary(Registration_Type::NOT_OFFICIAL);


	//get the total number of company

	$Num_Company = $encoder->Get_Total_Company();
	$Num_Official_Company = $encoder->Get_Officially_Registered_Companies();
	$Num_Not_Official_Company = $encoder->Get_Not_Officially_Registered_Companies();

	$Num_Expired_Companies = $encoder->Get_Expired_Companies_Num();
	$Num_Not_Expired_Companies = $encoder->Get_Not_Expired_Companies_Num();

?>
<div class="col-sm-8 list_container margin_0">

	<div class="col-sm-12">

		<div class="col-sm-12 margin_top_10">

			<div class="panel panel-primary list_header margin_top_10 ">
				<div class="panel-body text-center">
					<h4>Summary of Companies</h4>
				</div>
			</div>


			<div class="col-sm-12" >

				<div class="clear_float row">
					<div class="col-sm-6">
						<div class="row">

					<h3> <span class="glyphicon glyphicon-certificate gold"> </span> Gold Companies = <?php echo($Gold_Companies);?></h3>
				<div class="col-sm-offset-1">
					<span class="glyphicon glyphicon-certificate gold"> </span> Expired Gold Companies = <?php echo($Expired_Gold_Companies);?><br>
					<span class="glyphicon glyphicon-certificate gold"> </span> Not Expired Gold Companies = <?php echo($Not_Expired_Gold_Companies);?>
		</div>


						</div>
		<div class="margin_top_51">

			<h3> <span class="glyphicon glyphicon-certificate silver"> </span> Silver Companies = <?php echo($Silver_Companies);?></h3>
			<div class="col-sm-offset-1">
				<span class="glyphicon glyphicon-certificate silver"> </span> Expired Silver Companies = <?php echo($Expired_Silver_Companies);?><br>
				<span class="glyphicon glyphicon-certificate silver"> </span> Not Expired Silver Companies = <?php echo($Not_Expired_Gold_Companies);?>
			</div>
		</div>
					</div>
					<div class="col-sm-6">
						<div class="">


				<h3> <span class="glyphicon glyphicon-certificate bronze"> </span> Bronze Companies = <?php echo($Bronze_Companies);?></h3>
						<div class="col-sm-offset-1">
							<span class="glyphicon glyphicon-certificate bronze"> </span> Expired Bronze Companies = <?php echo($Expired_Bronze_Companies);?><br>
							<span class="glyphicon glyphicon-certificate bronze"> </span> Not Expired Bronze Companies = <?php echo($Not_Expired_Bronze_Companies);?>
						</div>

						</div>
						<div class="margin_top_51">


							<h3> <span class="glyphicon glyphicon-remove red"> </span> Not Official Companies = <?php echo($Not_Official_Companies);?></h3>
							<div class="col-sm-offset-1">

							</div>

						</div>
					</div>
				</div>




				<div class="row margin_top_51">

					<h3>Totals</h3>

					<div class="margin_top_20 row  ">
						<div class="col-sm-4 text-right">
							<h4><?php echo($Num_Company);?> -</h4>

						</div>
						<div class="col-sm-8 ">
							<h4>Total Number of companies </h4>
						</div>

					</div>

					<div class="margin_top_20 row">
						<div class="col-sm-4 text-right">
							<h4><?php echo($Num_Official_Company);?> -</h4>

						</div>
						<div class="col-sm-8 ">
							<h4>Total Number of Officially Registered Companies   </h4>
						</div>
 					</div>

					<div class="margin_top_20 row">
						<div class="col-sm-4 text-right">

							<h4><?php echo($Num_Not_Official_Company);?> -</h4>
						</div>
						<div class="col-sm-8 ">
							<h4>Total Number of Not Officially registered Companies</h4>
						</div>
					</div>

					<div class="margin_top_20 row">
						<div class="col-sm-4 text-right">
							<h4><?php echo($Num_Expired_Companies);?> -</h4>
						</div>
						<div class="col-sm-8 ">

							<h4>Total Number of Expired Companies</h4>
						</div>
					</div>

					<div class="margin_top_20 row margin_bottom_200">
						<div class="col-sm-4 text-right">
							<h4><?php echo($Num_Not_Expired_Companies);?> - </h4>

						</div>
						<div class="col-sm-8 ">
							<h4>Total Number of Not Expired Companies</h4>
						</div>
					</div>

				</div>
			</div>


		</div>

	</div>

</div>


<?php
include "Encoder_Footer.php";
?>

