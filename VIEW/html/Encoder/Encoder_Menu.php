<?php ?>



<!--this is the start of the menu-->
<div class="col-sm-2">
    <div class="list-group border_raduis_0">

        <a href="../Add_Company/Add_Company.php" class="list-group-item encoder_menu">




	        <div class="col-sm-10">
		        <div class="col-sm-1">
			        <span class=" glyphicon glyphicon-plus m_r_10 "></span>
		        </div>
		        <div class="col-sm-11">
			        <h5><p class="text-center">Add Company</p>
			        <p class="text_center dark_blue">(ድርጅት መጨመርያ)</p></h5>
		        </div>


	        </div>
	        <div class="clear_float">

	        </div>



        </a>

	    <?php
            if(get_encoder_type() == User_Type::ENCODER){

	            ?>

	            <a href="../Add_Place/Add_Place_Region_inc.php" class="list-group-item encoder_menu">


		            <div class="col-sm-10">
			            <div class="col-sm-1">
				            <span class=" glyphicon glyphicon-plus m_r_10 "></span>
			            </div>
			            <div class="col-sm-11">
                            <h5>  <p class="text-center">Add Place</p>
				            <p class="text_center dark_blue">(ቦታ መጨመርያ)</p></h5>
			            </div>


		            </div>
		            <div class="clear_float">

		            </div>
	            </a>

	            <a href="../Add_Building/Add_Building.php" class="list-group-item encoder_menu">

		            <div class="col-sm-10">
			            <div class="col-sm-1">
				            <span class=" glyphicon glyphicon-plus m_r_10 "></span>
			            </div>
			            <div class="col-sm-11">
                            <h5> <p class="text-center">Add Buildings</p>
				            <p class="text_center dark_blue">(ህንጻ መጨመርያ)</p></h5>
			            </div>


		            </div>
		            <div class="clear_float">

		            </div>
 	            </a>

	    <?php

            }
	    ?>



        <a href="../Add_Event/Add_Events.php" class="list-group-item encoder_menu">

	        <div class="col-sm-10">
		        <div class="col-sm-1">
			        <span class=" glyphicon glyphicon-plus m_r_10 "></span>
		        </div>
		        <div class="col-sm-11">
                    <h5> <p class="text-center">Add Events</p>
			        <p class="text_center dark_blue">(ኢቨንት መጨመርያ)</p></h5>
		        </div>


	        </div>
	        <div class="clear_float">

	        </div>

        </a>


        <a href="../Add_Phone/Add_Phone_Number.php" class="list-group-item encoder_menu">

	        <div class="col-sm-10">
		        <div class="col-sm-1">
			        <span class=" glyphicon glyphicon-plus m_r_10 "></span>
		        </div>
		        <div class="col-sm-11">
                    <h5>  <p class="text-center">Add Phone Numbers</p>
			        <p class="text_center dark_blue">(ስልክ መጨመርያ)</p></h5>
		        </div>


	        </div>
	        <div class="clear_float">

	        </div>

        </a>


	     <?php
	            if(get_encoder_type() == User_Type::ENCODER){
 		            ?>

		            <a href="../Add_Category/Add_Category.php" class="list-group-item encoder_menu">

			            <div class="col-sm-10">
				            <div class="col-sm-1">
					            <span class=" glyphicon glyphicon-plus m_r_10 "></span>
				            </div>
				            <div class="col-sm-11">
                                <h5>  <p class="text-center">Add Category</p>
					            <p class="text_center dark_blue">(የስራ መስክ መጨመርያ)</p></h5>
				            </div>


			            </div>
			            <div class="clear_float">

			            </div>

		            </a>


		            <a href="../Add_Specialization/Add_Specialization.php" class="list-group-item encoder_menu">

			            <div class="col-sm-10">
				            <div class="col-sm-1">
					            <span class=" glyphicon glyphicon-plus m_r_10 "></span>
				            </div>
				            <div class="col-sm-11">
                                <h5> <p class="text-center">Add Specialization</p>
					            <p class="text_center dark_blue">(የስራ መስክ ስፔሻላይዜሽን መጨመርያ)</p></h5>
				            </div>


			            </div>
			            <div class="clear_float">

			            </div>

		            </a>
 		            <a href="../Add_Ownership/Add_Ownership.php" class="list-group-item encoder_menu">


		                <div class="col-sm-10">
			                <div class="col-sm-1">
				                <span class=" glyphicon glyphicon-plus m_r_10 "></span>
			                </div>
			                <div class="col-sm-11">
                                <h5>  <p class="text-center">Add Company Type</p>
				                <p class="text_center dark_blue">(የድርጅት አይነቶች መጨመርያ)</p></h5>
			                </div>


		                </div>
		                <div class="clear_float">

		                </div>

		            </a>

	            <?php
	            }
	     ?>

	    <a href="../Add_Health_Institution/Add_Health_Institution.php" class="list-group-item encoder_menu">

		    <div class="col-sm-10">
			    <div class="col-sm-1">
				    <span class=" glyphicon glyphicon-plus m_r_10 "></span>
			    </div>
			    <div class="col-sm-11">
                    <h5> <p class="text-center">Add Health Institutions</p>
				    <p class="text_center dark_blue">(የጤና ተቋማት)</p></h5>
			    </div>


		    </div>
		    <div class="clear_float">

		    </div>

	    </a>

        <a href="../Add_Educational_Institution/Add_Educational_Institute.php" class="list-group-item encoder_menu">

	        <div class="col-sm-10">
		        <div class="col-sm-1">
			        <span class=" glyphicon glyphicon-plus m_r_10 "></span>
		        </div>
		        <div class="col-sm-11">
                    <h5> <p class="text-center">Add School Institutions</p>
			        <p class="text_center dark_blue">(የትምህርት ተቋማት)</p></h5>
		        </div>


	        </div>
	        <div class="clear_float">

	        </div>

        </a>

        <a href="../Add_Recreational_Institution/Add_Recreational_Institute.php" class="list-group-item encoder_menu">


	        <div class="col-sm-10">
		        <div class="col-sm-1">
			        <span class=" glyphicon glyphicon-plus m_r_10 "></span>
		        </div>
		        <div class="col-sm-11">
                    <h5> <p class="text-center">Add Recreational Institutions</p>
			        <p class="text_center dark_blue">(የመዝናኛ ተቋማት)</p></h5>
		        </div>


	        </div>
	        <div class="clear_float">

	        </div>

        </a>


        <a href="../Money_Exchange/View_Exchange.php" class="list-group-item encoder_menu">


            <div class="col-sm-10">
                <div class="col-sm-1">
                    <span class=" glyphicon glyphicon-plus m_r_10 "></span>
                </div>
                <div class="col-sm-11">
                    <h5> <p class="text-center">Money Exchange</p>
                    <p class="text_center dark_blue">(የገንዘብ ምንዛሪ)</p></h5>
                </div>


            </div>
            <div class="clear_float">

            </div>

        </a>



    </div>
</div>
<!--end of the menu-->