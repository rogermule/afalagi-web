<?php
//add the required and the
require('Require.php');
include('Street_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);


include('Street_Menu.html');
?>

	<div class="col-sm-7  list_container">

		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body text-center btn-success white">
					<h1>አፋላጊ</h1>
					<h5>በስም ፍለጋ </h5>
				</div>
			</div>

			<div class="panel panel-default">


				<form method="post" class="row margin_top_20" action="Street_Search.php" data-toggle="validator"  >
					<div class="col-sm-12">


						<div class="form-group col-sm-8 col-sm-offset-2 has-feedback">

							<input class="form-control" id="search" placeholder="Street Name" name="search" required data-error="Street Name Should be Filled" >
							<div class="help-block with-errors"></div>

						</div>
						<div class="form-group col-sm-4 col-sm-offset-4">

							<div class="col-sm-6">
								English <input type="radio" name="Language" value="English" checked required>
							</div>
							<div class="col-sm-6">
								<input type="radio" name="Language" value="Amharic" required> አማርኛ
							</div>


						</div>


						<div class="col-sm-4 col-sm-offset-4 margin-t-b-20">
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
									echo('<li><a href="#">Enter Street Name</a></li>');
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
					$search_result = $operator->Search_Street($search_value,$Language);

					//if there is result for the search display it here
					if($search_result){
						//get company information
						$count = 0;
						$num_buildings = mysqli_num_rows($search_result);

				echo('<div class="col-sm-12 result_num"><p>Number of Street '.$num_buildings.'</p></div>');

						while($result = mysqli_fetch_array($search_result,MYSQLI_ASSOC)){
							$count++;


							$Street_ID = $result['ID'];
							$Name = $result['Name'];
							$Name_Amharic = $result['Name_Amharic'];
							$About_Street = $result['About_Street_Amharic'];

							//in here include the single company result container and fill the info

							?>
							<div class="col-sm-12 result_con padding_5">
								<div>

									<div class="col-sm-1">
										<?php echo($count);?>
									</div>
									<div class="col-sm-11 s_r_name">
										<a href="More_On_Street.php?Street_ID=<?php echo($Street_ID);?>" target="_blank"><?php echo($Name);?>(<?php echo($Name_Amharic)?>)</a>
									</div>
								</div>
								<div>

									<div class="col-sm-7 col-sm-offset-2 service_con more service margin_top_5">
										<?php echo("$About_Street");?>

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

include('Street_Footer.php');
?>