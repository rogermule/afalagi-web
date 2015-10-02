<?php


require("../../../../CONFIGURATION/Config.php");
require(DB);
require("../../../../MODEL/User.php");
require("../../../../MODEL/User_Type.php");
require("../../../../CONTROLLER/Encoder/User_Controller.php");
require("../../../../CONTROLLER/Encoder/Encoder_Controller.php");
require("../../../../CONTROLLER/Controller_Secure_Access.php");



include "Encoder_Header.php";
include "Includeables.php";

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	$Companies = $encoder->Get_Company_For_Listing();



?>
<div class="col-sm-7 list_container margin_0">

<div class="col-sm-12">

	<div class="panel panel-default">
		<div class="panel-body text-center">

			<h4>Company List</h4>

		</div>
	</div>
	<div class="col-sm-12 margin_top_51 ">
		<hr>


		<div class="panel panel-primary list_header margin_top_10">
			<div class="panel-body text-center">
				<h4>List of Companies</h4>

			</div>
		</div>
		<div class="col-sm-12 text-center margin_top_20">

			<button type="button" class="btn btn-success btn-xs"> A </button>
			<button type="button" class="btn btn-success btn-xs"> B </button>
			<button type="button" class="btn btn-success btn-xs"> C </button>
			<button type="button" class="btn btn-success btn-xs"> D </button>

			<button type="button" class="btn btn-success btn-xs"> E </button>
			<button type="button" class="btn btn-success btn-xs"> F </button>
			<button type="button" class="btn btn-success btn-xs"> G </button>
			<button type="button" class="btn btn-success btn-xs"> H </button>
			<button type="button" class="btn btn-success btn-xs"> I </button>
			<button type="button" class="btn btn-success btn-xs"> J </button>
			<button type="button" class="btn btn-success btn-xs"> K </button>
			<button type="button" class="btn btn-success btn-xs"> L </button>
			<button type="button" class="btn btn-success btn-xs"> M </button>
			<button type="button" class="btn btn-success btn-xs"> N </button>
			<button type="button" class="btn btn-success btn-xs"> O </button>
			<button type="button" class="btn btn-success btn-xs"> P </button>
			<button type="button" class="btn btn-success btn-xs"> Q </button>

			<button type="button" class="btn btn-success btn-xs"> R </button>
			<button type="button" class="btn btn-success btn-xs"> S </button>
			<button type="button" class="btn btn-success btn-xs"> T </button>
			<button type="button" class="btn btn-success btn-xs"> U </button>
			<button type="button" class="btn btn-success btn-xs"> V </button>
			<button type="button" class="btn btn-success btn-xs"> W </button>
			<button type="button" class="btn btn-success btn-xs"> X </button>
			<button type="button" class="btn btn-success btn-xs"> Y </button>
			<button type="button" class="btn btn-success btn-xs"> Z </button>

		</div>

		<div class=" margin_top_30">
			<table class="table table-hover">
				<thead>
				<th>#</th>

				<th>Company Name</th>
				<th>የድርጅቱ ስም</th>
				<th>የስራ ውጤት</th>
				<th> Edit</th>

				</thead>
				<tbody>

				<?php
					$Count = 0;
					$Company_ID = "";
					$Company_Name = "";
					$Company_Name_Amharic = "";

					if($Companies){
						while($com = mysqli_fetch_array($Companies,MYSQLI_ASSOC)){
							$Company_ID =$com["ID"];
							$Company_Name = $com["Name"];
							$Company_Name_Amharic = $com["Name_Amharic"];
							$Company_Product_Service_Amharic = $com['Product_Service_Amharic'];
							$Count++;

							?>

								<tr>
									<td><?php echo("$Count"); ?></td>

									<td><?php echo("$Company_Name");?></td>
									<td><?php echo("$Company_Name_Amharic");?></td>
									<td><?php echo("$Company_Product_Service_Amharic");?></td>

									<td>
										<p>
											<button type="button" class="btn btn-warning btn-xs">Edit</button>
											<button type="button" class="btn btn-danger btn-xs">Delete</button>

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




<?php
	include "Encoder_Footer.php";
?>

