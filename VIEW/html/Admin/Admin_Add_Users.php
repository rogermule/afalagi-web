<?php

$title = "Admin";

include "Admin_Header.html";


?>

	<!-- content of the admin page-->

		<?php
		include "Admin_Navigation.html";

		?>
		<div class="row margin_top_51">
			<?php
			include "Admin_Menu.html";
			include "Admin_Add_Employee.php";
			?>
		</div>


<?php

include "../Includable/Footer.php";