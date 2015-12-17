<?php
//add the required and the
require('Require.php');
include('Operator_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);


?>

	<div class="col-sm-9 margin_4p list_container">

	<div class="col-sm-12">

	<div class="panel panel-default">
		<div class="panel-body text-center btn-success white">
			<h1>አፋላጊ</h1>
			<h5>በስም ፍለጋ </h5>
		</div>
	</div>

	<div class="panel panel-default">


	<form method="post" class="row margin_top_20" action="Specific_Search.php" data-toggle="validator"  >
		<div class="col-sm-12">


			<div class="form-group col-sm-8 col-sm-offset-2 has-feedback">

				<input class="form-control" id="search" placeholder="የድርጅቱን ስም ያስገቡ" name="search" required data-error="ስም ያስገቡ" >
				<div class="help-block with-errors"></div>

			</div>
			<div class="form-group col-sm-4 col-sm-offset-4">

				<div class="col-sm-5">
					English <input type="radio" name="Language" value="English"  checked required>
				</div>
				<div class="col-sm-6">
					 <input type="radio" name="Language" value="Amharic" required> አማርኛ
				</div>


			</div>


			<div class="col-sm-3 col-sm-offset-4 margin-t-b-20">
				<button type="submit" class="btn btn-default btn-block">
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

					//set flag if search is nedded
					$search = false;
					//first handle the form
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
 						//get the category
						if(!empty($_POST['search'])){
							 $search_value = $_POST['search'];
							echo('<li><a href="#">'.$search_value.'</a></li>');
							$search = true;
						}
						else{
							$category = null;
							echo('<li><a href="#">Enter Company Name</a></li>');
						}

						if(isset($_POST['Language'])){
							$Language = $_POST['Language'];
							echo('<li><a href="#"> Language '.$Language.'</a></li>');
						}
						else{
							$search = false;
							echo('<li><a href="#"> Choose Search Language</a></li>');
						}
 					}
					if(!$search){
						echo('<li><a href="#">/</a></li>');
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
			$search_result = $operator->Name_Search($search_value,$Language);

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
								<a href="More_On_Company.php?Company_ID=<?php echo($Company_ID);?>&On_Building=<?php echo($On_Building);?>" target="_blank"><?php echo($Name);?>(<?php echo($Name_Amharic)?>)</a>
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