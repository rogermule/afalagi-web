<?php

require("Require.php");


include "Encoder_Header.php";
include "Includeables.php";

//in here we are going to fetch data that is going to feel the drop downs
$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

if(isset($_GET['Delete'])){
	$Company_ID = $_GET["company_id"];


	if(isset($_GET['on_building'])){
		$single_company = $encoder->Get_Company_With_Building($Company_ID);
		$single_company = mysqli_fetch_array($single_company,MYSQLI_ASSOC);
		$Address_Building_Floor_ID = $single_company['Address_Building_Floor_ID'];
	}

	else if(!isset($_GET['on_building'])){
		$single_company = $encoder->Get_Company_With_Out_Building($Company_ID);
		$single_company = mysqli_fetch_array($single_company,MYSQLI_ASSOC);
		$Direction_ID = $single_company['Direction_ID'];
		$Place_ID = $single_company['Place_ID'];
	}


	//first lets get the id

	$About_Company_ID = $single_company['About_Company_ID'];
	$Payment_Status_ID = $single_company['Payment_Status_ID'];
	$Company_Service_ID = $single_company['Company_Service_ID'];
	$Company_Ownership_ID = $single_company['Company_Ownership_ID'];
	$Company_Category_ID = $single_company['Company_Category_ID'];
	$Contact_ID = $single_company['Contact_ID'];




	$single_company = $encoder->Get_Company_For_Delete($Company_ID);

	$Company_DEL = mysqli_fetch_array($single_company,MYSQLI_ASSOC);

	$Company_Name = $Company_DEL["Company_Name"];
	$Company_Name_Amharic = $Company_DEL["Company_Name_Amharic"];

	$Category = $Company_DEL["Category"];
	$Category_Amharic = $Company_DEL["Category_Amharic"];

	$Branch = $Company_DEL["Branch"];
	$Branch_Amharic = $Company_DEL["Branch_Amharic"];

	$Working_Hours = $Company_DEL["Working_Hours"];
	$Working_Hours_Amharic = $Company_DEL["Working_Hours_Amharic"];

	$Company_Service = $Company_DEL["Product_Service"];
	$Company_Service_Amharic = $Company_DEL["Product_Service_Amharic"];

	$Expiration_Date = $Company_DEL["Expiration_Date"];

}

?>


	<div class="col-sm-7 list_container margin_0">

		<div class="col-sm-12">


			<div class="panel panel-default">
				<div class="panel-body text-center">
					<h4>Delete a Company from afalagi.</h4>
					<span>Are you sure you want to delete <?php echo($Company_Name);?></span>
				</div>
			</div>

			<div class=" margin_top_20">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Delete Company</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form"
						      action="../../../../CONTROLLER/Encoder/Delete_Company.php" method="POST">

							<div class="form-group">
								<label for="Company_Name" class="col-sm-5 control-label">Company Name</label>
								<label for="Company_Name" class="col-sm-6 control-label left"><?php echo($Company_Name);?></label>
							</div>

							<div class="form-group">
								<label for="Company_Name_Amharic" class="col-sm-5 control-label">የድርጅቱ ስም</label>
								<label for="Company_Name" class="col-sm-6 control-label left">
									<?php echo($Company_Name_Amharic);?>
								</label>
							</div>

							<div class="form-group">
								<label for="Company_Name_Amharic" class="col-sm-5 control-label">Category</label>
								<label for="Company_Name" class="col-sm-6 control-label left"><?php echo($Category);?></label>
							</div>

							<div class="form-group">
								<label for="Company_Name_Amharic" class="col-sm-5 control-label">Category Amharic</label>
								<label for="Company_Name" class="col-sm-6 control-label left"><?php echo($Category_Amharic);?></label>
							</div>

							<div class="form-group">
								<label for="Branch" class="col-sm-5 control-label">Branch</label>
								<label for="Working_Hours" class="col-sm-6 control-label left"><?php echo($Branch);?></label>
							</div>

							<div class="form-group">
								<label for="Branch_Amharic" class="col-sm-5 control-label">ቅርንጫፍ</label>
								<label for="Working_Hours" class="col-sm-6 control-label left"><?php echo($Branch_Amharic);?></label>
							</div>

							<div class="form-group">
								<label for="Working_Hours" class="col-sm-5 control-label">Working Hours</label>
								<label for="Working_Hours" class="col-sm-6 control-label left"><?php echo($Working_Hours);?></label>
							</div>

							<div class="form-group">
								<label for="Working_Hours_Amharic" class="col-sm-5 control-label">የስራ ሰዓት</label>
								<label for="Working_Hours" class="col-sm-6 control-label left"><?php echo($Working_Hours_Amharic);?></label>
							</div>

							<div class="form-group">
								<label for="Working_Hours" class="col-sm-5 control-label">Company Service</label>
								<label for="Working_Hours" class="col-sm-6 control-label left"><?php echo($Company_Service);?></label>
							</div>

							<div class="form-group">
								<label for="Product_Description_And_Service_Amharic" class="col-sm-5 control-label">
									የስራ ውጤት ማብራርያ</label>
								<label for="Working_Hours" class="col-sm-6 control-label left">
									<?php echo($Company_Service_Amharic);?></label>
							</div>

							<div class="form-group">
								<label for="Branch" class="col-sm-5 control-label">Expiration Date</label>
								<label for="Working_Hours" class="col-sm-6 control-label left">
									<?php echo($Expiration_Date);?>
								</label>
							</div>





							<input type="hidden"  name="Company_ID" value="<?php echo($Company_ID);?>">
							<input type="hidden" name="About_Company_ID" value="<?php echo($About_Company_ID);?>">
							<input type="hidden" name="Payment_Status_ID" value="<?php echo($Payment_Status_ID);?>">
							<input type="hidden" name="Company_Service_ID" value="<?php echo($Company_Service_ID);?>">
							<input type="hidden" name="Company_Ownership_ID" value="<?php echo($Company_Ownership_ID)?>">
							<input type="hidden" name="Company_Category_ID" value="<?php echo($Company_Category_ID)?>">
							<input type="hidden" name="Contact_ID" value="<?php echo($Contact_ID);?>">

							<?php
							if(isset($_GET['on_building'])){
								?>
								<input type="hidden" name="Address_Building_Floor_ID" value="<?php echo($Address_Building_Floor_ID);?>"><?php

							}
							else{
								?>

								<input type="hidden" name="Direction_ID" value="<?php echo($Direction_ID);?>">
								<input type="hidden" name="Place_ID" value="<?php echo($Place_ID);?>">

							<?php
							}
							?>



							<div class="form-group margin_top_30 margin_bottom_200">
								<div class="col-sm-3 col-sm-offset-3 ">
									<a href="All_Educational_List.php" class="btn btn-info btn-block"><strong>Cancel</strong></a>
								</div>

								<div class="col-sm-3  ">
									<button type="submit" class="btn btn-danger btn-block">
										<strong>Delete</strong>
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