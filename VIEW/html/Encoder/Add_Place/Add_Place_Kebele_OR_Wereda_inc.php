<?php

require("../../../../CONFIGURATION/Config.php");
require(DB);
require("../../../../MODEL/User.php");
require("../../../../MODEL/Wereda.php");
require("../../../../MODEL/User_Type.php");
require("../../../../CONTROLLER/Encoder/User_Controller.php");
require("../../../../CONTROLLER/Encoder/Encoder_Controller.php");
require("../../../../CONTROLLER/Controller_Secure_Access.php");

include("Place_Header.php");
include("includables.php");

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	$wereda = $encoder->Get_Wereda();
	$num_wereda = mysqli_num_rows($wereda);

?>

<div class=" col-sm-7 list_container margin_0">

    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h4>Add Kebele/Wereda</h4>

            </div>
        </div>
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


			    $wereda_name = $_GET['Wereda_Name'];

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have added a new wereda/Kebele successfully.</strong>
				    <br/>New wereda/Kebele --- <?php echo(" $wereda_name");?>
			    </div>

		    <?php

		    }
	    }

	    ?>


        <div class=" margin_top_20">
            <form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Add_Wereda.php" method="POST">





                <div class="form-group">
                    <label for="Wereda_Name" class="col-sm-4 control-label">Kebele/Wereda</label>
                    <div class="col-sm-5">
                        <input name="Wereda_Name" type="text" class="form-control" id="Wereda_Name" placeholder="Enter Kebele/Wereda" >
                    </div>
                </div>
	            <div class="form-group">
		            <label for="Wereda_Name_Amharic" class="col-sm-4 control-label">ወረዳ/ቀበሌ</label>
		            <div class="col-sm-5">
			            <input name="Wereda_Name_Amharic" type="text" class="form-control" id="Wereda_Name_Amharic" placeholder="ወረዳ/ቀበሌ ያስገቡ" >
		            </div>
	            </div>







	            <div class="form-group margin_top_30">

                    <div class="col-sm-5 col-lg-offset-4">
                        <button type="submit" class="btn btn-success btn-block">
                            <strong>Add Kebele / Wereda</strong>
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
                <h4>List of Kebele / Wereda</h4>

            </div>
        </div>

        <div class=" margin_top_30">
            <table class="table table-hover">
                <thead>
                <th>#</th>
                <th>Kebele/Wereda</th>
                <th>ወረዳ/ቀበሌ</th>
                </thead>
	                <tbody>

	                <?php
	                //fetch the regions from the database and render them to the view
	                $count = 0;
	                $wereda_name = "";
	                $wereda_name_amharic = "";


	                if($wereda){
		                while($wer = mysqli_fetch_array($wereda,MYSQLI_ASSOC)){
			                $count++;
			                $wereda_name = $wer["Name"];
			                $wereda_name_amharic = $wer["Name_Amharic"];
			                ?>
			                <tr>
				                <td><?php echo($count);?></td>
				                <td><?php echo($wereda_name);?></td>
				                <td><?php echo($wereda_name_amharic);?></td>
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