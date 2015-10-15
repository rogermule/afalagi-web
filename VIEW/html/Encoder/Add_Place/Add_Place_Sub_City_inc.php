<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	$SubCities = $encoder->Get_Sub_City();
	$num_sub_cities = mysqli_num_rows($SubCities);

?>

	<div class=" col-sm-7 list_container margin_0">

    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h4>Add Sub Cities</h4>

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


			    $subcity_name = $_GET['SubCity_Name'];

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have added a new Sub city successfully.</strong>
				    <br/>New Sub City --- <?php echo("$subcity_name");?>
			    </div>

		    <?php

		    }
		    else if(isset($_GET['success_edit'])){

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have edited a Sub city successfully!</strong>

			    </div>

		    <?php

		    }
		    else if(isset($_GET['success_delete'])){

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have deleted Sub city successfully!</strong>

			    </div>

		    <?php

		    }
	    }

	    ?>

        <div class=" margin_top_20">
            <form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Add_Subcity.php" method="POST">


	            <div class="form-group">
		            <label for="SubCity_Name" class="col-sm-4 control-label">Sub City</label>
		            <div class="col-sm-5">
			            <input name="SubCity_Name" type="text" class="form-control" id="SubCity_Name" placeholder="Enter Sub City" >
		            </div>
	            </div>


                <div class="form-group">
                    <label for="SubCity_Name_Amharic" class="col-sm-4 control-label">ከፍለከተማ</label>
                    <div class="col-sm-5">
                        <input name="SubCity_Name_Amharic" type="text" class="form-control" id="SubCity_Name_Amharic" placeholder="Enter Sub City" >
                    </div>
                </div>







	            <div class="form-group margin_top_30">

                    <div class="col-sm-5 col-lg-offset-4">
                        <button type="submit" class="btn btn-success btn-block"><strong>Add Sub City</strong>
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
                <h4>List of Sub Cities</h4>

            </div>
        </div>

        <div class=" margin_top_30">
            <table class="table table-hover">
                <thead>
                <th>#</th>
                <th>Sub City</th>
                <th>ከፍለከተማ</th>

                </thead>
                <tbody>

                <?php
                //fetch the regions from the database and render them to the view
                $count = 0;
                $subcity_name = "";
                $subcity_name_amharic = "";

                if($SubCities){
	                while($subcity = mysqli_fetch_array($SubCities,MYSQLI_ASSOC)){
		                $count++;
		                $subcity_name = $subcity["Name"];
		                $subcity_name_amharic = $subcity["Name_Amharic"];
		                $sub_city_id = $subcity['ID'];
		                ?>
		                <tr>
			                <td><?php echo($count);?></td>
			                <td><?php echo($subcity_name);?></td>
			                <td><?php echo($subcity_name_amharic);?></td>
			                <td>
				                <a class="btn btn-warning btn-xs" href="Edit_Sub_City.php?Sub_City_ID=<?php echo($sub_city_id)?>">Edit</a>
				                <a class="btn btn-danger btn-xs"
				                   href="Delete_Sub_City.php?Sub_City_ID=<?php echo($sub_city_id);?>">Delete</a>
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