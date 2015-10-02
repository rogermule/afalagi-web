<?php

include "Hospital_Header.php";

include "Encoder_Menu.html";

include "Hospital_Menu.php";

?>

	<div class=" col-sm-6 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Add Specialization</h4>

				</div>
			</div>


			<div class=" margin_top_20">
				<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Admin_Edit_User.php" method="POST">


					<div class="form-group">
						<label for="inputcity" class="col-sm-4 control-label">Specialization</label>
						<div class="col-sm-5">
							<input name="User_Name" type="text" class="form-control" id="inputcity" placeholder="Enter Specialization" >
						</div>
					</div>
					<div class="form-group">
						<label for="inputcity" class="col-sm-4 control-label">Amh specialization</label>
						<div class="col-sm-5">
							<input name="User_Name" type="text" class="form-control" id="inputcity" placeholder="Enter Specialization" >
						</div>
					</div>


					<div class="form-group margin_top_30">

						<div class="col-sm-5 col-lg-offset-4">
							<button type="submit" class="btn btn-success btn-block">
								<strong>Add Specialization</strong>
							</button>
						</div>
					</div>
				</form>

			</div>

		</div>

		<div class="col-sm-12 margin_top_51 ">
			<hr>
			<div class="panel panel-primary list_header">
				<div class="panel-body text-center">
					<h4>List of Specialization</h4>

				</div>
			</div>

			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>

					<th>Specialization</th>
					<th>Specialization Amh</th>
					</thead>
					<tbody>
					<tr>
						<td>1</td>

						<td>Head</td>
						<td>keanget belay</td>
					</tr>



					</tbody>
				</table>
			</div>



		</div>

<?php
	include "../Encoder_Footer.php";
?>