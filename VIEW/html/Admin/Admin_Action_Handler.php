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

		if( isset($_GET['EDIT'])){
			include "Admin_Edit_User.php";
		}
		else if(isset($_GET['DELETE'])){
			include "Admin_Delete_User.php";
		}
		else if(isset($_GET['EDIT_PROFILE'])){
			include "Admin_Edit_Profile.php";
		}

		?>

	</div>



<?php

include "../Includable/Footer.php";
























