<?php


require("../../../../CONFIGURATION/Config.php");
require(DB);
require("../../../../MODEL/User.php");
require("../../../../MODEL/User_Type.php");
require("../../../../CONTROLLER/Encoder/User_Controller.php");
require("../../../../CONTROLLER/Encoder/Encoder_Controller.php");
require("../../../../CONTROLLER/Controller_Secure_Access.php");

include("Place_Header.php");
include("includables.php");

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object


	$regions = $encoder->Get_Regions();//get all the regions from the database
	$num_regions = mysqli_num_rows($regions);//get the number of regions
?>

<div class=" col-sm-7 list_container margin_0">


    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h4>Add Regions</h4>

            </div>
        </div>

<!--	    start of the feedback place-->


	    <?php

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


			    $region_name = $_GET['Region_Name'];

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have added a new region successfully.</strong>
				    <br/>New Region --- <?php echo("$region_name");?>
			    </div>

		    <?php

		    }
	    }

	    ?>


        <div class=" margin_top_20">
            <form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Add_Regions.php" method="POST">


                <div class="form-group">
                    <label for="region_name" class="col-sm-4 control-label">Region</label>
                    <div class="col-sm-5">
                        <input name="Region_Name" type="text" class="form-control" id="region_name" placeholder="Enter Region" >
                    </div>
                </div>
	            <div class="form-group">
		            <label for="Region_Name_Amharic" class="col-sm-4 control-label">ክልል</label>
		            <div class="col-sm-5">
			            <input name="Region_Name_Amharic" type="text" class="form-control" id="Region_Name_Amharic" placeholder="የክልል ስም ያስገቡ" >
		            </div>
	            </div>



                <div class="form-group margin_top_30">

                    <div class="col-sm-5 col-lg-offset-4">
                        <button type="submit" class="btn btn-success btn-block"><strong>Add Region</strong>
                        </button>
                    </div>
                </div>
            </form>

        </div>



    </div>

    <div class="col-sm-12 margin_top_51 ">
        <hr>
        <div class="panel panel-primary list_header">
            <div class="panel-body text-center">
                <h4>List of Regions</h4>

            </div>
        </div>

        <div class=" margin_top_30">
            <table class="table table-hover">
                <thead>
                <th>#</th>
                <th>Region</th>
                <th>የክልል ስም</th>
                </thead>
                <tbody>

                <?php
                //fetch the regions from the database and render them to the view
                $count = 0;
                $region_name = "";
                $region_name_amharic = "";

				if($regions){
					while($reg = mysqli_fetch_array($regions,MYSQLI_ASSOC)){
							$count++;
							$region_name = $reg["Name"];
							$region_name_amharic = $reg["Name_Amharic"];
						?>
						<tr>
							<td><?php echo($count);?></td>
							<td><?php echo($region_name);?></td>
							<td><?php echo($region_name_amharic);?></td>
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
	include "Encoder_Footer.php";
?>