<?php


/**
 * require files that are going to make this php file work
 */
 
 
require("../../../CONFIGURATION/Config.php");
require(DB);
require("../../../MODEL/User.php");
require("../../../MODEL/User_Type.php");
require("../../../CONTROLLER/User_Controller.php");
require("../../../CONTROLLER/Admin_Controller.php");
require("../../../CONTROLLER/Controller_Secure_Access.php");
require("Admin_Security.php");


$title = "Admin";
include "Admin_Header.html";



include "Admin_Navigation.html";

?>
	<div class="row margin_top_51">

		<?php
		include "Admin_Menu.html";


			/**
			 * if the get server request method has error set
			 * inform the admin about the user
			 */
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

					$user_name = $_GET['User_Name'];
					$user_type = $_GET['User_Type'];

					?>


						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>You have edited a user successfully.</strong>
							<br/>User -> <?php echo($user_name);?>,... Works as -><?php echo($user_type);?>
						</div>



				<?php


				}

				if(isset($_GET['success_delete'])){

					?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>You have DELETED a user successfully.</strong>

					</div>
					<?php
				}
			}



		include "Admin_Employee_List.php";
		?>

	</div>



<?php

include "../Includable/Footer.php";