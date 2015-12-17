<?php
//add the required and the
require('Require.php');
include('Street_Header.php');
include('../Menu_Operator.php');

//make an operator
$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

include('Street_Menu.html');

$streets = $operator->Get_Streets();


?>
<div class="col-sm-7  list_container">
	<div class="col-sm-12 ">



		<div class="panel panel-default  margin_top_10">
			<div class="panel-body text-center">

				<h4>List of Street</h4>

			</div>
		</div>


		<div class=" margin_top_30">
			<table class="table table-hover">
				<thead>

				<th>#</th>
				<th>Name</th>
				<th>ስም</th>

				<th>መረጃ</th>

				</thead>
				<tbody>

				<?php
				$count = 0;
				$street_name = "";
				$street_name_amharic = "";

				if($streets){
					while($str = mysqli_fetch_array($streets,MYSQLI_ASSOC)){
						$count++;

						$street_name = $str['Name'];
						$street_name_amharic  = $str['Name_Amharic'];

						$About_Street_Amharic = $str['About_Street_Amharic'];
						$Street_ID = $str["ID"];

						?>
						<tr>
							<td><?php echo($count);?></td>
							<td><?php echo($street_name);?></td>
							<td><?php echo($street_name_amharic);?></td>

							<td><?php echo($About_Street_Amharic);?></td>
							<td>
								<a class="btn btn-default btn-xs" href="More_On_Street.php?Street_ID=<?php echo($Street_ID)?>"> more</a>

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
<?php

include('Street_Footer.php');
?>