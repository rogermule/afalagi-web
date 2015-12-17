<?php
//add the required and the
require('Require.php');
include('Phone_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);


include('Phone_Menu.html');

$Famous_Phones = $operator->Get_Famous_Phones();
?>


	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">


			<div class="col-sm-12 margin_top_20">


				<div class="panel panel-primary  margin_top_10">
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
											<a href="More_On_Phone.php?Phone_ID=<?php echo($Phone_ID);?>" class="btn btn-default btn-xs"> more </a>

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

include('Phone_Footer.php');
?>