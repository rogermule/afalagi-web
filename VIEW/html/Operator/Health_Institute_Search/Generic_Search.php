<?php
//add the required and the
require('Require.php');
include('Operator_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);
$categories = $operator->GetGeneralCategory(GeneralCategory::HEALTH);
$specialization = $operator->GetSpecialization(GeneralCategory::HEALTH);
$company_type = $operator->Get_Ownerships();
$Regions = $operator->Get_Regions();
$Cities = $operator->Get_City();
$SubCities = $operator->Get_Sub_City();
$Weredas = $operator->Get_Wereda();
$Sefers = $operator->Get_Sefer();
$Street = $operator->Get_Streets();
?>

	<div class="col-sm-9 margin_4p list_container">

	<div class="col-sm-12">

	<div class="panel panel-default">
		<div class="panel-body text-center btn-success white">
			<h1>አፋላጊ</h1>
			<h5>አጠቃላይ ፍለጋ</h5>
		</div>
	</div>

	<div class="panel panel-default">


	<form method="post" class="row margin_top_20" action="Generic_Search.php"  >
		<div class="col-sm-12">

			<div class="col-sm-3">

				<div class="form-group">
					<label for="exampleInputEmail1">የስራ መስክ</label>
					<select class="form-control" id="category" name="category">
						<option value="NOT_FILLED" class="red"></option>
						<?php
						$Category_ID = "";
						$Category_Name_Amh = "";

						if($categories){
							while($cat = mysqli_fetch_array($categories,MYSQLI_ASSOC)){
								$Category_ID = $cat['ID'];
								$Category_Name_Amh = $cat['Name_Amharic'];

								?>
								<option value="<?php echo($Category_ID);?>"><?php echo($Category_Name_Amh);?></option>
							<?php
							}
						}

						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">የድርጅቱ አይነት</label>
					<select class="form-control" id="ownership" name="ownership">
						<option value="NOT_FILLED" class="red"></option>
						<?php
						$Name = "";
						$Name_Amharic = "";
						if($company_type){
							while($com_own = mysqli_fetch_array($company_type,MYSQLI_ASSOC)){
								$ID = $com_own["ID"];
								$Name_Amharic  = $com_own["Name_Amharic"];
								?>

								<option value="<?php echo($ID);?>"><?php echo($Name_Amharic);?></option>
							<?php
							}
						}

						?>
					</select>				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Specialization ( ስፔሻላየዜሽን )</label>
					<select class="form-control" id="specialization" name="specialization">
						<option value="NOT_FILLED" class="red"></option>
						<?php
						$Name = "";
						$Name_Amharic = "";
						if($specialization){
							while($spec = mysqli_fetch_array($specialization,MYSQLI_ASSOC)){
								$ID = $spec["ID"];
								$Name_Amharic  = $spec["Name_Amharic"];
								?>

								<option value="<?php echo($ID);?>"><?php echo($Name_Amharic);?></option>
							<?php
							}
						}

						?>
					</select>				</div>

			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="exampleInputEmail1">ክልል</label>
					<select class="form-control place" id="region" name="region"  >

						<option value="NOT_FILLED" class="red"></option>
						<?php
						$Region_ID = "";
						$Region_Name_Amh = "";

						if($Regions){
							while($reg = mysqli_fetch_array($Regions,MYSQLI_ASSOC)){
								$Region_ID = $reg['ID'];
								$Region_Name_Amh = $reg['Name_Amharic'];
								?>
								<option value="<?php echo($Region_ID);?>"><?php echo($Region_Name_Amh);?></option>
							<?php
							}
						}

						?>

					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">ከተማ</label>
					<select class="form-control place" id="city" name="city">
						<option value="NOT_FILLED" class="red"></option>
						<?php
						$City_ID = "";
						$City_Name_Amh = "";

						if($Cities){
							while($cit = mysqli_fetch_array($Cities,MYSQLI_ASSOC)){
								$City_ID = $cit['ID'];
								$City_Name_Amh = $cit['Name_Amharic'];

								?>
								<option value="<?php echo($City_ID);?>"><?php echo($City_Name_Amh);?></option>
							<?php
							}
						}

						?>
					</select>
				</div>

			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="exampleInputEmail1">ክ/ከተማ</label>
					<select class="form-control place" id="subcity" name="subcity">

						<option value="NOT_FILLED" class="red"></option>
						<?php
						$SubCity_ID = "";
						$SubCity_Name = "";

						if($SubCities){
							while($SubCit = mysqli_fetch_array($SubCities,MYSQLI_ASSOC)){
								$SubCity_ID = $SubCit['ID'];
								$SubCity_Name_Amh = $SubCit['Name_Amharic'];
								?>
								<option value="<?php echo($SubCity_ID);?>"><?php echo($SubCity_Name_Amh);?></option>
							<?php
							}
						}

						?>

					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">ወረዳ</label>
					<select class="form-control place" id="wereda" name="wereda">
						<option value="NOT_FILLED" class="red"></option>
						<?php
						$Wereda_ID = "";
						$Wereda_Name = "";

						if($Weredas){
							while($Wer = mysqli_fetch_array($Weredas,MYSQLI_ASSOC)){
								$Wereda_ID = $Wer['ID'];
								$Wereda_Name = $Wer['Name_Amharic'];
								?>
								<option value="<?php echo($Wereda_ID);?>"><?php echo($Wereda_Name);?></option>
							<?php
							}
						}
						?>
					</select>
				</div>

			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="exampleInputEmail1">ሰፈር</label>
					<select class="form-control place" id="sefer" name="sefer">
						<option value="NOT_FILLED" class="red"></option>
						<?php
						$Sefer_ID = "";
						$Sefer_Name = "";

						if($Sefers){
							while($sef = mysqli_fetch_array($Sefers,MYSQLI_ASSOC)){
								$Sefer_ID = $sef['ID'];
								$Sefer_Name_Amh = $sef['Name_Amharic'];

								?>
								<option value="<?php echo($Sefer_ID);?>"><?php echo($Sefer_Name_Amh);?></option>
							<?php
							}
						}

						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">መንገድ</label>
					<select class="form-control place" id="street" name="street">
						<option value="NOT_FILLED" class="red"></option>

						<?php
						$Street_ID = "";
						$Street_Name = "";

						if($Street){
							while($str = mysqli_fetch_array($Street,MYSQLI_ASSOC)){
								$Street_ID = $str['ID'];
								$Street_Name_Amh = $str['Name_Amharic'];

								?>
								<option value="<?php echo($Street_ID);?>"><?php echo($Street_Name_Amh);?></option>
							<?php
							}
						}

						?>
					</select>
				</div>

			</div>


			<div class="col-sm-4 col-sm-offset-2 margin-t-b-20">
				<button type="submit" class="btn btn-success btn-block">
					<strong>ፈልግ</strong>
				</button>
			</div>
		</div>
	</form>

	</div>

	<div class="panel panel-default ">
		<div class="col-sm-12 row">
			<div class="col-sm-1 margin_top_10">
				<h1 class="result_for">ውጤት</h1>
			</div>
			<div class="col-sm-11 search_query_con">

				<ol class="breadcrumb">

					<?php
					//this will handle form and search the database for the specific search query

					//set flag if search is needed
					$search = false;
					//first handle the form
					if($_SERVER['REQUEST_METHOD'] == 'POST'){


						//get the category
						if($_POST['category'] != 'NOT_FILLED'){
							$category = $_POST['category'];
							$category_name = $operator->Get_Category_Name($category);
							echo('<li><a href="#">'.$category_name.'</a></li>');
							$search = true;
						}
						else{
							$category = null;
						}

						//get the ownership
						if($_POST['ownership'] != 'NOT_FILLED'){
							$ownership = $_POST['ownership'];
							$ownership_name = $operator->Get_Ownership_Name($ownership);
							echo('<li><a href="#">'.$ownership_name.'</a></li>');
							$search = true;
						}
						else{
							$ownership =  null;
						}

						//get the specialization
						if($_POST['specialization'] != 'NOT_FILLED'){
							$specialization = $_POST['specialization'];
							$specialization_name = $operator->Get_Specialization_Name($specialization);
							echo('<li><a href="#">'.$specialization_name.'</a></li>');
							$search = true;
 						}
						else{
							$specialization =null;
						}

						//get region
						if($_POST['region'] != 'NOT_FILLED' ){
							$region = $_POST['region'];
							$region_name = $operator->Get_Region_Name($region);
							echo('<li><a href="#">'.$region_name.'</a></li>');
							$search = true;
						}
						else{
							$region = null;
						}

						//get city
						if($_POST['city'] != 'NOT_FILLED' ){
							$city = $_POST['city'];
							$city_name = $operator->Get_City_Name($city);
							echo('<li><a href="#">'.$city_name.'</a></li>');
							$search = true;
						}
						else{
							$city = null;
						}

						//get sub city
						if($_POST['subcity'] != 'NOT_FILLED'){
							$subcity = $_POST['subcity'];
							$subcity_name = $operator->Get_SubCity_Name($subcity);
							echo('<li><a href="#">'.$subcity_name.'</a></li>');
							$search = true;
						}
						else{
							$subcity = null;
						}

						//get wereda
						if( $_POST['wereda'] != 'NOT_FILLED' ){
							$wereda= $_POST['wereda'];
							$wereda_name = $operator->Get_Wereda_Name($wereda);
							echo('<li><a href="#"> ወረዳ '.$wereda_name.'</a></li>');
							$search = true;
						}
						else{
							$wereda =null;
						}

						//get sefer
						if($_POST['sefer'] != 'NOT_FILLED'){
							$sefer = $_POST['sefer'];
							$sefer_name = $operator->Get_Sefer_Name($sefer);
							echo('<li><a href="#">'.$sefer_name.'</a></li>');
							$search = true;
						}
						else{
							$sefer = null;
						}

						//get street
						if($_POST['street'] != 'NOT_FILLED'){
							$street = $_POST['street'];
							$street_name = $operator->Get_Street_Name($street);
							echo('<li><a href="#">'.$street_name.'</a></li>');
							$search = true;

						}
						else{
							$street = null;
						}


					}
					if(!$search){
						echo('<li><a href="#">አፋላጊ</a></li>');
					}
					?>

				</ol>

			</div>

		</div>
	</div>

	<div class="panel panel-default">

		<?php


		//if there is a search query
		if($search){
			$search_result = $operator->Search_With_Specialization($category,$ownership,$specialization,$region,$city,$subcity,$wereda,$sefer,$street);

			//if there is result for the search display it here
			if($search_result){
				//get company information
				$count = 0;
				$num_companies = mysqli_num_rows($search_result);

				echo('<div class="col-sm-12 result_num"><p>Number of Companies '.$num_companies.'</p></div>');

				while($result = mysqli_fetch_array($search_result,MYSQLI_ASSOC)){
					$count++;

					$Company_ID = $result['Company_ID'];
					$Name = $result['Name'];
					$Name_Amharic = $result['Name_Amharic'];
					$Registration_Type_Word = $result['Registration_Type_Word'];
					$Expiration_Stat = $result['Expiration_Stat'];
					$Product_Service_Amharic = $result['Product_Service_Amharic'];
					$On_Building = $result['On_Building'];


					//in here include the single company result container and fill the info

					?>
					<div class="col-sm-12 result_con padding_5">
						<div>

							<div class="col-sm-1">
								<?php echo($count);?>
							</div>
							<div class="col-sm-11 s_r_name">
								<a href="../Generic_Search/More_On_Company.php?Company_ID=<?php echo($Company_ID);?>&On_Building=<?php echo($On_Building);?>" target="_blank"><?php echo($Name);?>(<?php echo($Name_Amharic)?>)</a>
							</div>
						</div>
						<div>
							<div class="col-sm-4 margin_top_10">

								<div><p class="float_right margin_0 more red"><?php echo($Registration_Type_Word);?></p> </div>
								<div><p class="float_right more"><?php echo($Expiration_Stat);?></p></div>

							</div>
							<div class="col-sm-7 service_con more service margin_top_5">
								<?php echo("$Product_Service_Amharic");?>

							</div>


						</div>

					</div>
				<?php
				}
			}
		}
		?>

	</div>

	</div>

	</div>



<?php
//include the footer
include('Operator_Footer.php');
?>