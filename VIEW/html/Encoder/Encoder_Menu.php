<?php ?>



<!--this is the start of the menu-->
<div class="col-sm-2">
    <div class="list-group border_raduis_0">

        <a href="../Add_Company/Add_Company.php" class="list-group-item encoder_menu">
            <span class=" glyphicon glyphicon-plus m_r_10"></span>
            <span >Add  Company</span>

        </a>

	    <?php
            if(get_encoder_type() == User_Type::ENCODER){

	            ?>

	            <a href="../Add_Place/Add_Place_Region_inc.php" class="list-group-item encoder_menu">
		            <span class=" glyphicon glyphicon-plus m_r_10"></span>
		            <span >Add Place</span>
	            </a>

	            <a href="../Add_Building/Add_Building.php" class="list-group-item encoder_menu">
		            <span class=" glyphicon glyphicon-plus m_r_10"></span>
		            <span >Add Buildings</span>
 	            </a>

	    <?php

            }
	    ?>



        <a href="../Add_Event/Add_Events.php" class="list-group-item encoder_menu">
            <span class=" glyphicon glyphicon-plus m_r_10"></span>
            <span >Add Events</span>

        </a>


        <a href="../Add_Phone/Add_Phone_Number.php" class="list-group-item encoder_menu">
            <span class=" glyphicon glyphicon-plus m_r_10"></span>
            <span >Add Phone Numbers</span>

        </a>


	     <?php
	            if(get_encoder_type() == User_Type::ENCODER){
 		            ?>

		            <a href="../Add_Category/Add_Category.php" class="list-group-item encoder_menu">
			            <span class=" glyphicon glyphicon-plus m_r_10"></span>
			            <span >Add Category</span>

		            </a>
 		            <a href="../Add_Ownership/Add_Ownership.php" class="list-group-item encoder_menu">
			            <span class=" glyphicon glyphicon-plus m_r_10"></span>
			            <span >Add Company Type</span>

		            </a>

	            <?php
	            }
	     ?>


    </div>
</div>
<!--end of the menu-->