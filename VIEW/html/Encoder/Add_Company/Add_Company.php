<?php

require("Require.php");

	include "Encoder_Header.php";
 	include "Includeables.php";

	//in here we are going to fetch data that is going to feel the drop downs
 	    $user = $_SESSION['Logged_In_User'];
		$encoder = new Encoder_Controller($user);//make an encoder object

		$Regions = $encoder->Get_Regions();      //get regions
		$Cities   = $encoder->Get_City();        //get cities
		$SubCities = $encoder->Get_Sub_City();   //get sub cities
		$Weredas = $encoder->Get_Wereda();       //get weredas
		$Sefers = $encoder->Get_Sefer();        //get sefer
 		$buildings = $encoder->Get_Buildings();  //get the buildings
		$Street = $encoder->Get_Streets();       //get street
		$categories = $encoder->Get_Category();  //get category
 		$company_ownership = $encoder->Get_Ownerships();//get different type of ownership



?>

<div class="col-sm-7 list_container margin_0">

	<div class="col-sm-12">

		<div class="panel panel-default">
			<div class="panel-body text-center">

				<h4>Add Company</h4>

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
					<strong>You have added a new company successfully.</strong>
					<br/>New Company -- <?php echo("$company_name ($company_name_amharic)");?>
					<br/>
				</div>
			<?php
			}
		}
		?>

		<div class=" margin_top_20">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add Company</h3>
				</div>


				<div class="panel-body">
					<form class="form-horizontal" role="form"
					      action="../../../../CONTROLLER/Encoder/Add_Company.php" method="POST">


						<div class="form-group">
							<label for="Building" class="col-sm-4 control-label">Building</label>
							<div class="col-sm-5">
								<select class="form-control " id="Building" name="Building">
									<option value="NOT_FILLED">- - - - - - - select building</option>
									<?php
									$Building_ID = "";
									$Building_Name = "";

									if($buildings){
										while($bul = mysqli_fetch_array($buildings,MYSQLI_ASSOC)){
											$Building_ID = $bul['ID'];
											$Building_Name = $bul['Name'];

											?>
											<option value="<?php echo($Building_ID);?>"><?php echo($Building_Name);?></option>
										<?php
										}
									}

									?>
								</select>
							</div>
							<div class="col-sm-2">

								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
					<a href="../Add_Building/Add_Building.php" class="btn btn-info">new</a>

								<?php
								}?>
							</div>
						</div>

						<div class="form-group">
							<label for="Building_Floor" class="col-sm-4 control-label">Building Floor</label>
							<div class="col-sm-5">
								<select class="form-control" id="Building_Floor" name="Building_Floor">

									<option value="NOT_FILLED">- - - - - - - select Floor</option>


									<?php
									$count = 0;
									while($count<50){
										?>
										<option value="<?php echo("$count Floor");?>">
											<?php echo("$count Floor");?>
										</option>
										<?php
										$count++;
									}
									?>


								</select>
							</div>

						</div>

						<hr>

						<div class="form-group">
							<label for="Region" class="col-sm-4 control-label">Region</label>
							<div class="col-sm-5">
								<select class="form-control place" id="Region" name="Region"  >

									<option value="NOT_FILLED" >- - - - - - - select region</option>
									<?php
									$Region_ID = "";
									$Region_Name = "";

									if($Regions){
										while($reg = mysqli_fetch_array($Regions,MYSQLI_ASSOC)){
											$Region_ID = $reg['ID'];
											$Region_Name = $reg['Name'];

											?>
											<option value="<?php echo($Region_ID);?>"><?php echo($Region_Name);?></option>
										<?php
										}
									}

									?>

								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
									<a href="../Add_Place/Add_Place_Region_inc.php" class="btn btn-info place">new</a>
								<?php
								}?>

							</div>
						</div>

						<div class="form-group">
							<label for="City" class="col-sm-4 control-label">City</label>
							<div class="col-sm-5">
								<select class="form-control place" id="City" name="City">
									<option value="NOT_FILLED">- - - - - - - select city</option>
									<?php
									$City_ID = "";
									$City_Name = "";

									if($Cities){
										while($cit = mysqli_fetch_array($Cities,MYSQLI_ASSOC)){
											$City_ID = $cit['ID'];
											$City_Name = $cit['Name'];

											?>
											<option value="<?php echo($City_ID);?>"><?php echo($City_Name);?></option>
										<?php
										}
									}

									?>
								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
									<a href="../Add_Place/Add_Place_City_inc.php" class="btn btn-info place">new</a>
								<?php
								}?>

							</div>
						</div>

						<div class="form-group">
							<label for="Sub_City" class="col-sm-4 control-label">Sub City</label>
							<div class="col-sm-5">
								<select class="form-control place" id="Sub_City" name="Sub_City">

									<option value="NOT_FILLED">- - - - - - - select Sub city</option>
									<?php
									$SubCity_ID = "";
									$SubCity_Name = "";

									if($SubCities){
										while($SubCit = mysqli_fetch_array($SubCities,MYSQLI_ASSOC)){
											$SubCity_ID = $SubCit['ID'];
											$SubCity_Name = $SubCit['Name'];
											?>
											<option value="<?php echo($SubCity_ID);?>"><?php echo($SubCity_Name);?></option>
										<?php
										}
									}

									?>

			                    </select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
									<a href="../Add_Place/Add_Place_Sub_City_inc.php" class="btn btn-info place">new</a>
								<?php
								}?>

							</div>
						</div>

			            <div class="form-group">
							<label for="Wereda" class="col-sm-4 control-label">Kebele/Wereda</label>
							<div class="col-sm-5">
								<select class="form-control place" id="Wereda" name="Wereda">
									<option value="NOT_FILLED">- - - - - - - select Kebele/Wereda</option>
									<?php
									$Wereda_ID = "";
									$Wereda_Name = "";

									if($Weredas){
										while($Wer = mysqli_fetch_array($Weredas,MYSQLI_ASSOC)){
											$Wereda_ID = $Wer['ID'];
											$Wereda_Name = $Wer['Name'];
											?>
											<option value="<?php echo($Wereda_ID);?>"><?php echo($Wereda_Name);?></option>
										<?php
										}
									}
									?>
								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
			<a href="../Add_Place/Add_Place_Wereda_inc.php" class="btn btn-info place">new</a>
								<?php
								}?>

							</div>
						</div>

						<div class="form-group">
							<label for="Sefer" class="col-sm-4 control-label">Sefer</label>
							<div class="col-sm-5">
								<select class="form-control place" id="Sefer" name="Sefer">
									<option value="NOT_FILLED">- - - - - - - select sefer</option>
									<?php
									$Sefer_ID = "";
									$Sefer_Name = "";

									if($Sefers){
										while($sef = mysqli_fetch_array($Sefers,MYSQLI_ASSOC)){
											$Sefer_ID = $sef['ID'];
											$Sefer_Name = $sef['Name'];

											?>
											<option value="<?php echo($Sefer_ID);?>"><?php echo($Sefer_Name);?></option>
										<?php
										}
									}

									?>
								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
<a href="../Add_Place/Add_Place_Sefer_inc.php" class="btn btn-info place">new</a>

								<?php
								}?>
							</div>
						</div>

						<div class="form-group">
							<label for="Street" class="col-sm-4 control-label">Street</label>
							<div class="col-sm-5">
								<select class="form-control place" id="Street" name="Street">
									<option value="NOT_FILLED">- - - - - - - select street</option>

									<?php
									$Street_ID = "";
									$Street_Name = "";

									if($Street){
										while($str = mysqli_fetch_array($Street,MYSQLI_ASSOC)){
											$Street_ID = $str['ID'];
											$Street_Name = $str['Name'];

											?>
											<option value="<?php echo($Street_ID);?>"><?php echo($Street_Name);?></option>
										<?php
										}
									}

									?>
								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
			<a href="../Add_Place/Add_Place_Street_inc.php" class="btn btn-info place">new</a>
 								<?php
								}?>
							</div>
						</div>

						<div class="form-group">
							<label for="Direction"
							       class="col-sm-4 control-label">Direction to the company</label>
							<div class="col-sm-5">

								<textarea name="Direction" class="form-control place"
								          rows="3"  id="Direction"
								          placeholder="Enter the direction to the companies location"></textarea>
			                </div>
						</div>

						<div class="form-group">
							<label for="Direction_Amharic"
							       class="col-sm-4 control-label ">አቅጣጫ</label>
							<div class="col-sm-5">

								<textarea name="Direction_Amharic" class="form-control place"
								          rows="3"  id="Direction_Amharic"
								          placeholder="የድርጅቱን መገኛ አቅጣጫ ያሰገቡ"></textarea>
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label for="House_Number" class="col-sm-4 control-label">House number</label>
							<div class="col-sm-5">
								<input name="House_Number" type="text" class="form-control"
								       id="House_Number" placeholder="Enter House Number" >
							</div>
						</div>

						<div class="form-group">
							<label for="POBOX" class="col-sm-4 control-label">PO-BOX</label>
							<div class="col-sm-5">
								<input name="POBOX" type="text" class="form-control"
								       id="POBOX" placeholder="Enter POBOX" >
							</div>
						</div>

						<div class="form-group">
							<label for="Telephone" class="col-sm-4 control-label">Telephone</label>
							<div class="col-sm-5">
								<input name="Telephone" type="text" class="form-control"
								       id="Telephone" placeholder="Enter Phone" >
							</div>
						</div>

						<div class="form-group">
							<label for="FAX" class="col-sm-4 control-label">FAX</label>
							<div class="col-sm-5">
								<input name="FAX" type="text" class="form-control"
								       id="FAX" placeholder="Enter FAX" >
							</div>
						</div>

						<div class="form-group">
							<label for="Email" class="col-sm-4 control-label">Email</label>
							<div class="col-sm-5">
								<input name="Email" type="text" class="form-control"
								       id="Email" placeholder="Enter Email" >
							</div>
						</div>

						<div class="form-group">
							<label for="Category" class="col-sm-4 control-label">Category</label>
							<div class="col-sm-5">
								<select class="form-control" id="Category" name="Category">
									<option value="NOT_FILLED">- - - - - - - select category</option>
									<?php
									$Category_ID = "";
									$Category_Name = "";

									if($categories){
										while($cat = mysqli_fetch_array($categories,MYSQLI_ASSOC)){
											$Category_ID = $cat['ID'];
											$Category_Name = $cat['Name'];

											?>
											<option value="<?php echo($Category_ID);?>"><?php echo($Category_Name);?></option>
										<?php
										}
									}

									?>
								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
									<a href="../Add_Category/Add_Category.php" class="btn btn-info">new</a>

								<?php
								}?>
							</div>
						</div>

						<div class="form-group">
							<label for="Company_Type" class="col-sm-4 control-label">Company ownership Type</label>
							<div class="col-sm-5">
								<select class="form-control" id="Company_Type" name="Company_Type">
									<option value="NOT_FILLED">- - - - - - - select company type</option>
									<?php


									$Name = "";
									$Name_Amharic = "";

									if($company_ownership){
										while($com_own = mysqli_fetch_array($company_ownership,MYSQLI_ASSOC)){


											$ID = $com_own["ID"];
											$Name = $com_own["Name"];


											?>

									<option value="<?php echo($ID);?>"><?php echo($Name);?></option>

										<?php
										}
									}

									?>
								</select>
							</div>
							<div class="col-sm-2">
								<?php if(get_encoder_type() == User_Type::ENCODER){


									?>
							<a href="../Add_Ownership/Add_Ownership.php" class="btn btn-info">new</a>

								<?php
								}?>
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label for="Company_Name" class="col-sm-4 control-label">Company Name</label>
							<div class="col-sm-5">
								<input name="Company_Name" type="text" class="form-control"
								       id="Company_Name" placeholder="Enter Company Name" >
							</div>
						</div>

						<div class="form-group">
							<label for="Company_Name_Amharic" class="col-sm-4 control-label">የድርጅቱ ስም</label>
							<div class="col-sm-5">
								<input name="Company_Name_Amharic" type="text" class="form-control"
								       id="Company_Name_Amharic" placeholder="የድርጅቱ ስም ያሰገቡ " >
							</div>
						</div>

						<div class="form-group">
							<label for="Working_Hours" class="col-sm-4 control-label">Working Hours</label>
							<div class="col-sm-5">
								<input name="Working_Hours" type="text" class="form-control"
								       id="Working_Hours" placeholder="Enter working hours" >
							</div>
						</div>

						<div class="form-group">
							<label for="Working_Hours_Amharic" class="col-sm-4 control-label">የስራ ሰዓት</label>
							<div class="col-sm-5">
								<input name="Working_Hours_Amharic" type="text" class="form-control"
								       id="Working_Hours_Amharic" placeholder="የስራ ሰዓት ያስገቡ " >
							</div>
						</div>

						<div class="form-group">
							<label for="Product_Description_And_Service"
							       class="col-sm-4 control-label">Company Services</label>
							<div class="col-sm-5">
			                    <textarea name="Product_Description_And_Service" class="form-control"
								          rows="3"  id="Product_Description_And_Service"
								          placeholder="Enter product description or service"></textarea>
			                </div>
						</div>

						<div class="form-group">
							<label for="Product_Description_And_Service_Amharic"
							       class="col-sm-4 control-label">የስራ ውጤት ማብራርያ</label>
							<div class="col-sm-5">

								<textarea name="Product_Description_And_Service_Amharic" class="form-control"
								          rows="3"  id="Product_Description_And_Service_Amharic"
								          placeholder="የስራ ውጤት ማብራርያ ያስገቡ"></textarea>
			                </div>
						</div>

						<div class="form-group">
							<label for="Branch" class="col-sm-4 control-label">Branch</label>
							<div class="col-sm-5">
								<input name="Branch" type="text" class="form-control"
								       id="Branch" placeholder="Enter Branch" >
							</div>
						</div>

						<div class="form-group">
							<label for="Branch_Amharic" class="col-sm-4 control-label">ቅርንጫፍ</label>
							<div class="col-sm-5">
								<input name="Branch_Amharic" type="text" class="form-control"
								       id="Branch" placeholder="ቅርንጫፍ ያስገቡ" >
							</div>
						</div>

						<div class="form-group margin_top_51">

							<label for="Registration_Expiration_Date"
							       class="col-sm-4 control-label">Registration Type</label>

							<div class="input-group date  col-sm-5 ">

								<div class="col-sm-5">
			<input  type="radio" name="Registration_Type" id="GOLD" value="GOLD"> <label for="GOLD">GOLD</label>
								</div>

								<div  class="col-sm-7" >
				<input type="radio" name="Registration_Type" id="SILVER" value="SILVER">
									<label for="SILVER">SILVER</label>
								</div>

								<div class="col-sm-5">
									<input  type="radio" name="Registration_Type" id="BRONZE" value="BRONZE"> <label for="BRONZE">BRONZE</label>
								</div>

								<div  class="col-sm-7" >
									<input type="radio" name="Registration_Type" id="NOT_OFFICIAL" value="NOT_OFFICIAL">
									<label for="NOT_OFFICIAL">NOT OFFICIAL</label>
								</div>

 							</div>

						</div>

						<div class="form-group margin_top_51">
						<label for="Registration_Expiration_Date"
						       class="col-sm-4 control-label">Registration Expiration Date</label>
				            <div class="input-group date  col-sm-5 ">
								<input name="Registration_Expiration_Date"
								       type="text" class="form-control datepicker"
								       placeholder="yyyy/mm/dd"
									>
				            </div>
			            </div>



						<div class="form-group margin_top_51 margin_bottom_200">

							<div class="col-sm-5 col-lg-offset-4">
								<button type="submit" class="btn btn-success btn-block">
									<strong>Add Company</strong>
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
	include "Encoder_Footer.php";
?>

