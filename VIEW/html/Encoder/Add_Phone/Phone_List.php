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


	$Famous_Phones = $encoder->Get_Famous_Phones();

?>






<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">


		<div class="col-sm-12 margin_top_20">



			<div class="panel panel-primary list_header margin_top_10">
				<div class="panel-body text-center">
					<h4>List of Phones</h4>

				</div>
			</div>


			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>
					<th>Phone Number</th>
					<th>ገለጻ</th>
					</thead>
					<tbody>

					<?php
					$Count =0;
					$Phone_ID = "";
					$Phone = "";
					$Phone_Description_Amharic = "";

					if($Famous_Phones){
						while($fphone = mysqli_fetch_array($Famous_Phones,MYSQLI_ASSOC)){

							$Phone_ID = $fphone["ID"];
							$Phone = $fphone["Phone"];
							$Phone_Description_Amharic = $fphone["Description_Amharic"];
							$Count++;

							?>
							<tr>
								<td><?php echo($Count);?></td>

								<td><?php echo($Phone)?></td>

								<td>
									<?php echo($Phone_Description_Amharic)?>
								</td>
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

</div>

<?php
include "Encoder_Footer.php";
?>
