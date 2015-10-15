<?php
require('Require.php');

include("Place_Header.php");
include("includables.php");

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object
 	$sefers = $encoder->Get_Sefer();
	$num_sefer = mysqli_num_rows($sefers);

?>

<div class=" col-sm-7 list_container margin_0">

    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h4>Add Sefer</h4>

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


			    $sefer_name = $_GET['Sefer_Name'];

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have added a new sefer successfully.</strong>
				    <br/>New Sefer--- <?php echo("$sefer_name");?>
			    </div>

		    <?php

		    }
		    else if(isset($_GET['success_edit'])){


			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have edited sefer successfully.</strong>

			    </div>

		    <?php

		    }
		    if(isset($_GET['success_delete'])){


			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have deleted a single sefer successfully.</strong>

			    </div>

		    <?php

		    }
	    }

	    ?>



	    <div class=" margin_top_20">
            <form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Add_Sefer.php" method="POST">



                <div class="form-group">
                    <label for="Sefer_Name" class="col-sm-4 control-label">Sefer</label>
                    <div class="col-sm-5">
                        <input name="Sefer_Name" type="text" class="form-control"
                               id="Sefer_Name" placeholder="Enter Sefer" >
                    </div>
                </div>

	            <div class="form-group">
		            <label for="Sefer_Name_Amharic" class="col-sm-4 control-label">ሰፈር</label>
		            <div class="col-sm-5">
			            <input name="Sefer_Name_Amharic" type="text" class="form-control"
			                   id="Sefer_Name_Amharic" placeholder="ሰፈር ስም ያስገቡ" >
		            </div>
	            </div>





                <div class="form-group margin_top_30">

                    <div class="col-sm-5 col-lg-offset-4">
                        <button type="submit" class="btn btn-success btn-block">
                            <strong>Add Sefer</strong>
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
                <h4>List of Sefer</h4>

            </div>
        </div>

        <div class=" margin_top_30">
            <table class="table table-hover">
                <thead>

                <th>#</th>
                <th>Sefer</th>
                <th>ሰፈር ስም</th>

                </thead>
                <tbody>
                <?php
                //fetch the Sefers from the database and render them to the view
                $count = 0;
                $sefer_name = "";
                $sefer_name_amharic = "";

                if($sefers){
	                while($sefer = mysqli_fetch_array($sefers,MYSQLI_ASSOC)){
		                $count++;
		                $sefer_name = $sefer["Name"];
		                $sefer_name_amharic = $sefer["Name_Amharic"];
		                $sefer_id = $sefer["ID"];
		                ?>
		                <tr>
			                <td><?php echo($count);?></td>
			                <td><?php echo($sefer_name);?></td>
			                <td><?php echo($sefer_name_amharic);?></td>
			                <td>
				                <a class="btn btn-warning btn-xs" href="Edit_Sefer.php?Sefer_ID=<?php echo($sefer_id)?>">Edit</a>
				                <a class="btn btn-danger btn-xs"
				                   href="Delete_Sefer.php?Sefer_ID=<?php echo($sefer_id);?>">Delete</a>
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
include "Encoder_Footer.php";
?>