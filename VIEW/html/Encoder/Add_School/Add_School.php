<?php

include "School_Header.php";
include "Encoder_Menu.html";
include "School_Menu.php";

?>

<div class="col-sm-7 list_container margin_0">

<div class="col-sm-12">

<div class="panel panel-default">
	<div class="panel-body text-center">
		<h4>Add School</h4>

	</div>
</div>

<div class=" margin_top_20">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">School Address</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form"
		      action="../../../CONTROLLER/Admin_Edit_User.php" method="POST">


			<div class="form-group">
				<label for="Region" class="col-sm-3 control-label">Region</label>
				<div class="col-sm-6">
					<select class="form-control" id="Region">
						<option>Select Region</option>
						<option>Amhara</option>
						<option>Afar</option>
						<option>Benshangul</option>
						<option>Debub</option>
						<option>Somaliya</option>
						<option>Ormoiya</option>
						<option>Tigray</option>

					</select>
				</div>
				<div class="col-sm-2">
					<div class="btn btn-info">new</div>
				</div>
			</div>

			<div class="form-group">
				<label for="City" class="col-sm-3 control-label">City</label>
				<div class="col-sm-6">
					<select class="form-control" id="City">
						<option>Select city</option>
						<option>Addis Ababa</option>
						<option>Jigjiga</option>
						<option>Jimma</option>
						<option>BahirDar</option>
						<option>Wello</option>
						<option>Axum</option>
						<option>Mekele</option>

					</select>
				</div>
				<div class="col-sm-2">
					<div class="btn btn-info">new</div>
				</div>
			</div>

			<div class="form-group">
				<label for="Sub_City" class="col-sm-3 control-label">Sub City</label>
				<div class="col-sm-6">
					<select class="form-control" id="Sub_City">
						<option>Select Sub City</option>
						<option>Kirkos</option>
						<option>Nifas Silk Lafto</option>
						<option>Bole</option>


					</select>
				</div>
				<div class="col-sm-2">
					<div class="btn btn-info">new</div>
				</div>
			</div>

			<div class="form-group">
				<label for="Kebele_Wereda" class="col-sm-3 control-label">Kebele/Wereda</label>
				<div class="col-sm-6">
					<select class="form-control" id="Kebele_Wereda">
						<option>Selece Kebele/wereda</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="col-sm-2">
					<div class="btn btn-info">new</div>
				</div>
			</div>

			<div class="form-group">
				<label for="Sefer" class="col-sm-3 control-label">Sefer</label>
				<div class="col-sm-6">
					<select class="form-control" id="Sefer">
						<option>Select Sefer</option>
						<option>Jemo 1</option>
						<option>Lebu</option>
						<option>CMC</option>
						<option>Ayer Tena</option>
					</select>
				</div>
				<div class="col-sm-2">
					<div class="btn btn-info">new</div>
				</div>
			</div>
			<div class="form-group">
				<label for="Different_Identification"
				       class="col-sm-3 control-label">Direction</label>
				<div class="col-sm-6">
					<input name="Different_Identification" type="text" class="form-control"
					       id="Enter Direction"
					       placeholder="Enter Different Identification" >
				</div>
			</div>

			<div class="form-group">
				<label for="Different_Identification"
				       class="col-sm-3 control-label">አቅጣጫ
				</label>
				<div class="col-sm-6">
					<input name="Different_Identification" type="text" class="form-control"
					       id="Enter Direction"
					       placeholder="አቅጣጫ ያሰገቡ" >
				</div>
			</div>


			<hr>


			<div class="form-group">
				<label for="Building" class="col-sm-3 control-label">Building</label>
				<div class="col-sm-6">
					<select class="form-control" id="Building">
						<option>Select Building</option>
						<option>Friendship</option>
						<option>Denbel</option>
						<option>Getu</option>
					</select>
				</div>
				<div class="col-sm-2">
					<div class="btn btn-info">new</div>
				</div>
			</div>

			<div class="form-group">
				<label for="Building_Floor" class="col-sm-3 control-label">Building Floor</label>
				<div class="col-sm-6">
					<select class="form-control" id="Building_Floor">
						<option>Select Floor</option>
						<option>Ground</option>
						<option>1 Floor</option>
						<option>2 Floor</option>
						<option>3 Floor</option>
						<option>4 Floor</option>

					</select>
				</div>

			</div>

			<div class="form-group">
				<label for="Building_Floor" class="col-sm-3 control-label">Road Name</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="House_NO" placeholder="Enter Road Name" >
				</div>
			</div>

			<div class="form-group">
				<label for="Building_Floor" class="col-sm-3 control-label">መንገድ ሰም </label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="House_NO" placeholder="መንገድ ሰም ያሰገቡ" >
				</div>
			</div>


			<hr>

			<div class="form-group">
				<label for="POBOX" class="col-sm-3 control-label">PO-BOX</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="POBOX" placeholder="Enter POBOX" >
				</div>
			</div>

			<div class="form-group">
				<label for="Phone" class="col-sm-3 control-label">Phone</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="Phone" placeholder="Enter Phone" >
				</div>
			</div>

			<div class="form-group">
				<label for="FAX" class="col-sm-3 control-label">FAX</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="FAX" placeholder="Enter FAX" >
				</div>
			</div>

			<div class="form-group">
				<label for="Email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="Email" placeholder="Enter Email" >
				</div>
			</div>

		</form>
	</div>
</div>



<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">School Name And Description</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form"
		      action="../../../CONTROLLER/Admin_Edit_User.php" method="POST">


			<div class="form-group">
				<label for="Company_Name" class="col-sm-3 control-label">School Name</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="SchoolName" placeholder="Enter School Name" >
				</div>
			</div>
			<div class="form-group">
				<label for="Company_Name" class="col-sm-3 control-label">school name amh</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text" class="form-control"
					       id="Company_Name" placeholder="enter school name " >
				</div>
			</div>


			<hr>
			<div class="form-group">
				<label for="Company_Specialization"
				       class="col-sm-3 control-label">School Services</label>

				<div class="col-sm-8">

					<div class="col-sm-6">

						<div class="checkbox">
							<label>
								<input type="checkbox"> Kg-1, Kg-2 ,Kg-3
							</label>
						</div>


					</div>
					<div class="col-sm-6">

						<div class="checkbox">
							<label>
								<input type="checkbox"> 1-8
							</label>
						</div>


					</div>
					<div class="col-sm-6">

						<div class="checkbox">
							<label>
								<input type="checkbox"> 9-12
							</label>
						</div>


					</div>
					<div class="col-sm-6">

						<div class="checkbox">
							<label>
								<input type="checkbox"> night classes
							</label>
						</div>


					</div>
					<div class="col-sm-6">

						<div class="checkbox">
							<label>
								<input type="checkbox"> Distance Learning
							</label>
						</div>

					</div>
					<div class="col-sm-6">

						<div class="checkbox">
							<label>
								<input type="checkbox"> Distance Learning
							</label>
						</div>

					</div>

				</div>


			</div>

			<hr>


			<div class="form-group">
				<label for="Sefer" class="col-sm-3 control-label">Type of Ownership</label>
				<div class="col-sm-6">
					<select class="form-control" id="Sefer">
						<option>Select Type</option>
						<option>Government Owned</option>

						<option>Private Owned</option>

					</select>
				</div>

			</div>

			<div class="form-group">
				<label for="Branch" class="col-sm-3 control-label">Branch</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text-a" class="form-control"
					       id="Branch" placeholder="Enter Branch" >
				</div>
			</div>
			<div class="form-group">
				<label for="Branch" class="col-sm-3 control-label">ቅርንጫፍ</label>
				<div class="col-sm-6">
					<input name="User_Name" type="text-a" class="form-control"
					       id="Branch" placeholder="ቅርንጫፍ ያስገቡ" >
				</div>
			</div>


			<div class="form-group margin_top_30">

				<div class="col-sm-6 col-lg-offset-3">
					<button type="submit" class="btn btn-success btn-block">
						<strong>Add School</strong>
					</button>
				</div>
			</div>


		</form>
	</div>
</div>



</div>

</div>

</div>

<?php
include "../Encoder_Footer.php"
?>











