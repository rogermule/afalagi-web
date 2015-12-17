<?php
//add the required and the
require('Require.php');
include('Operator_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

	 if($_SERVER['REQUEST_METHOD'] == 'GET'){

		 if(isset($_GET['Company_ID'])){

			 $On_Building = False;
			 $Company_ID = $_GET['Company_ID'];
			 //if the company is on building use on building query
			 //else use a query with out building to get info about the company
			 if($_GET['On_Building'] == 0){
				 $Company = $operator->Get_More_Info_With_Out_Building($Company_ID);
				 $Company = mysqli_fetch_array($Company,MYSQLI_ASSOC);

				 $Company_Name = $Company['company_name'];
				 $Company_Name_Amharic = $Company['company_name_amharic'];
				 $Branch = $Company['Branch'];
				 $Branch_Amharic = $Company['Branch_Amharic'];
				 $Working_Hours = $Company['Working_Hours'];
				 $Working_Hours_Amharic = $Company['Working_Hours_Amharic'];
				 $Product_Service = $Company['Product_Service'];
				 $Product_Service_Amharic = $Company['Product_Service_Amharic'];
				 $Category_Name = $Company['category_name'];
				 $Category_Name_Amharic = $Company['category_name_amharic'];
				 $Ownership = $Company['company_type'];
				 $Ownership_Amharic = $Company['company_type_amharic'];

				 //this will find contact
				 $Email =$Company['Email'];
				 $House_No = $Company['House_No'];
				 $FAX = $Company['FAX'];
				 $POBOX = $Company['POBOX'];
				 $Telephone = $Company['Telephone'];


				 //this will find address
				 $Region = $Company['Region'];
				 $Region_Amharic = $Company['Region_Amharic'];
				 $City = $Company['City'];
				 $City_Amharic = $Company['City_Amharic'];
				 $Sub_City = $Company['Sub_City'];
				 $Sub_City_Amharic = $Company['Sub_City_Amharic'];
				 $Wereda =$Company['Wereda'];
				 $Wereda_Amharic = $Company['Wereda_Amharic'];
				 $Sefer =$Company['Sefer'];
				 $Sefer_Amharic = $Company['Sefer_Amharic'];
				 $Street = $Company['Street'];
				 $Street_Amharic =$Company['Street_Amharic'];
				 $Street_ID = $Company['Street_ID'];
				 $Direction = $Company['Direction'];
				 $Direction_Amharic = $Company['Direction_Amharic'];


			 }
			 else if($_GET['On_Building'] == 1){
				 $Company =$operator->Get_More_Info_With_Building($Company_ID);
				 $Company = mysqli_fetch_array($Company,MYSQLI_ASSOC);


				 $Company_Name = $Company['Company_Name'];
				 $Company_Name_Amharic = $Company['Company_Name_Amharic'];
				 $Branch = $Company['Branch'];
				 $Branch_Amharic = $Company['Branch_Amharic'];
				 $Working_Hours = $Company['Working_Hours'];
				 $Working_Hours_Amharic = $Company['Working_Hours_Amharic'];
				 $Product_Service = $Company['Product_Service'];
				 $Product_Service_Amharic = $Company['Product_Service_Amharic'];

				 $Category_Name = $Company['category_name'];
				 $Category_Name_Amharic = $Company['category_name_amharic'];
				 $Ownership = $Company['company_type'];
				 $Ownership_Amharic = $Company['company_type_amharic'];

				 //this will find contact
				 $Email =$Company['Email'];
				 $House_No = $Company['House_No'];
				 $FAX = $Company['FAX'];
				 $POBOX = $Company['POBOX'];
				 $Telephone = $Company['Telephone'];


				 //address
				 $Building_ID = $Company['Building_ID'];
				 $Building_Name = $Company['Building_Name'];
				 $Building_Name_Amharic = $Company['Building_Name_Amharic'];
				 $Floor = $Company['Floor'];


				 $On_Building = True;

			 }


		 }


	 }
	else{

	}
?>

	<div class="col-sm-9 margin_4p list_container">

	<div class="col-sm-12">

	<div class="panel panel-default">
		<div class="panel-body text-center">
			<h1>አፋላጊ</h1>

		</div>
	</div>


		<div class="Amharic_con">

			<div class="col-sm-7">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">አጠቃላይ መረጃ</h3>
					</div>
					<div class="panel-body">
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የድርጅቱ ስም</div>
							<div class="col-sm-9 float_left"><?php echo($Company_Name_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የስራ መስክ</div>
							<div class="col-sm-9 float_left"><?php echo($Category_Name_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የስራ ውጤት ማብራርያ</div>
							<div class="col-sm-9 float_left"><?php echo($Product_Service_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ቅርንጫፍ</div>
							<div class="col-sm-9 float_left"><?php echo($Branch_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የስራ ሰዓት</div>
							<div class="col-sm-9 float_left"><?php echo($Working_Hours_Amharic);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የድርጅት ባለቤትነት</div>
							<div class="col-sm-9 float_left"><?php echo($Ownership_Amharic);?></div>
						</div>
					</div>
				</div>
				<?php

				//if the company has specialization fetch the specializations

				if($operator->Company_Has_Specialization($Company_ID)){
					//fetch the specializations and print them all in here
					$specializations = $operator->Get_Company_Specializations($Company_ID);

					?>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">ስፔሻላይዜሽን</h3>
						</div>
						<div class="panel-body">

							<?php
							while($spec = mysqli_fetch_array($specializations,MYSQLI_ASSOC)){

								?>
								<div class="single_info row">
									<div class="col-sm-3 left_disc"><?php echo($spec['Name_Amharic']);?></div>
									<div class="col-sm-9 float_left"><?php echo($spec['Name']);?></div>
								</div>
							<?php

							}

							?>

						</div>
					</div>

				<?php
				}
				?>


			</div>

			<div class="col-sm-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">አድራሻ (መገኛ)</h3>
					</div>
					<div class="panel-body">


						<?php


						if($On_Building){

							?>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">ህንጻ</div>
								<div class="col-sm-9 float_left"><a href="../Building_Search/More_On_Building.php?Building_ID=<?php echo($Building_ID);?>">
										<?php echo($Building_Name_Amharic);?></a></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Floor</div>
								<div class="col-sm-9 float_left"><?php echo($Floor);?></div>
							</div>
							<?php
						}

						else if(!$On_Building){

							?>

							<div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">ክልል</div>
									<div class="col-sm-9 float_left"><?php echo($Region_Amharic);?></div>
								</div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">ከተማ</div>
									<div class="col-sm-9 float_left"><?php echo($City_Amharic);?></div>
								</div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">ከፍለከተማ</div>
									<div class="col-sm-9 float_left"><?php echo($Sub_City_Amharic);?></div>
								</div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">ወረዳ</div>
									<div class="col-sm-9 float_left"><?php echo($Wereda_Amharic);?></div>
								</div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">ሰፈር</div>
									<div class="col-sm-9 float_left"><?php echo($Sefer_Amharic);?></div>
								</div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">የመንገድ ስም</div>
									<div class="col-sm-9 float_left"><a href="../Street_Search/More_On_Street.php?Street_ID=<?php echo($Street_ID);?>"><?php echo($Street_Amharic);?></a></div>
								</div>
								<div class="single_info row">
									<div class="col-sm-3 left_disc">አቅጣጫ</div>
									<div class="col-sm-9 float_left"><?php echo($Direction_Amharic);?></div>
								</div>
							</div>
							<?php

						}

						?>

					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">አድራሻ</h3>
					</div>
					<div class="panel-body">
						<div class="single_info row">
							<div class="col-sm-3 left_disc">የቤት ቁጥር</div>
							<div class="col-sm-9 float_left"><?php echo($House_No);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ፓስታ</div>
							<div class="col-sm-9 float_left"><?php echo($POBOX)?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ስልክ</div>
							<div class="col-sm-9 float_left"><?php echo($Telephone);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ፋክስ</div>
							<div class="col-sm-9 float_left"><?php echo($FAX);?></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ኢሜል</div>
							<div class="col-sm-9 float_left"><?php echo($Email);?></div>
						</div>

					</div>
				</div>
			</div>

		</div>


	<div class="Amharic_con">

		<div class="col-sm-7">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				</div>
				<div class="panel-body">
					<div class="single_info row">
						<div class="col-sm-3 left_disc">Name</div>
						<div class="col-sm-9 float_left"><?php echo($Company_Name);?></div>
					</div>
					<div class="single_info row">
						<div class="col-sm-3 left_disc">Category</div>
						<div class="col-sm-9 float_left"><?php echo($Category_Name);?></div>
					</div>
					<div class="single_info row">
						<div class="col-sm-3 left_disc">Product And Service</div>
						<div class="col-sm-9 float_left"><?php echo($Product_Service);?></div>
					</div>
					<div class="single_info row">
						<div class="col-sm-3 left_disc">Branch</div>
						<div class="col-sm-9 float_left"><?php echo($Branch);?></div>
					</div>
					<div class="single_info row">
						<div class="col-sm-3 left_disc">Working Hours</div>
						<div class="col-sm-9 float_left"><?php echo($Working_Hours);?></div>
					</div>
					<div class="single_info row">
						<div class="col-sm-3 left_disc">Company Ownership</div>
						<div class="col-sm-9 float_left"><?php echo($Ownership);?></div>
					</div>
				</div>
			</div>


		</div>

		<div class="col-sm-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Address Place</h3>
				</div>
				<div class="panel-body">


					<?php


					if($On_Building){

						?>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">ህንጻ</div>
							<div class="col-sm-9 float_left"><a href="../Building_Search/More_On_Building.php?Building_ID=<?php echo($Building_ID);?>">
									<?php echo($Building_Name);?></a></div>
						</div>
						<div class="single_info row">
							<div class="col-sm-3 left_disc">Floor</div>
							<div class="col-sm-9 float_left"><?php echo($Floor);?></div>
						</div>
					<?php
					}

					else if(!$On_Building){

						?>

						<div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Region</div>
								<div class="col-sm-9 float_left"><?php echo($Region);?></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">City</div>
								<div class="col-sm-9 float_left"><?php echo($City);?></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Sub City</div>
								<div class="col-sm-9 float_left"><?php echo($Sub_City);?></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Wereda</div>
								<div class="col-sm-9 float_left"><?php echo($Wereda);?></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Sefer</div>
								<div class="col-sm-9 float_left"><?php echo($Sefer);?></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Street</div>
								<div class="col-sm-9 float_left"><a href="../Street_Search/More_On_Street.php?Street_ID=<?php echo($Street_ID);?>"><?php echo($Street);?></a></div>
							</div>
							<div class="single_info row">
								<div class="col-sm-3 left_disc">Direction</div>
								<div class="col-sm-9 float_left"><?php echo($Direction);?></div>
							</div>
						</div>
					<?php

					}

					?>

				</div>
			</div>

		</div>

	</div>



	</div>

	</div>



<?php
//include the footer
include('Operator_Footer.php');
?>