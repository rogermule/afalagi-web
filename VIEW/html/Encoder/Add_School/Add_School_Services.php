<?php
  	include "School_Header.php";
	include "Encoder_Menu.html";
	include "School_Menu.php";
?>
	<div class=" col-sm-6 list_container margin_0">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Add School Service</h4>

				</div>
			</div>


			<div class=" margin_top_20">
				<form class="form-horizontal" role="form" action="../../../../CONTROLLER/Admin_Edit_User.php" method="POST">


					<div class="form-group">
						<label for="inputcity" class="col-sm-4 control-label">Service</label>
						<div class="col-sm-5">
							<input name="User_Name" type="text" class="form-control" id="inputcity" placeholder="Enter School Service" >
						</div>
					</div>
					<div class="form-group">
						<label for="inputcity" class="col-sm-4 control-label">Service amh</label>
						<div class="col-sm-5">
							<input name="User_Name" type="text" class="form-control" id="inputcity" placeholder="Enter School Service" >
						</div>
					</div>


					<div class="form-group margin_top_30">

						<div class="col-sm-5 col-lg-offset-4">
							<button type="submit" class="btn btn-success btn-block">
								<strong>Add School Service</strong>
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
					<h4>List of School Service</h4>

				</div>
			</div>

			<div class=" margin_top_30">
				<table class="table table-hover">
					<thead>
					<th>#</th>

					<th>Services</th>
					<th>Services amh</th>
					<th>Edit</th>
					</thead>
					<tbody>
					<tr>
						<td>1</td>

						<td>1-8</td>
						<td>1-8</td>
						<td>
							<p>
								<button type="button" class="btn btn-warning btn-xs">Edit</button>
								<button type="button" class="btn btn-danger btn-xs">Delete</button>

							</p>

						</td>
					</tr>


 					</tbody>
				</table>
			</div>


		</div>


<?php
	include "../Encoder_Footer.php";
?>