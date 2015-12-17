<?php

require('Require.php');

include("Place_Header.php");
include("includables.php");

	$user = $_SESSION['Logged_In_User'];
	$encoder = new Encoder_Controller($user);//make an encoder object

	$cities = $encoder->Get_City();
	$num_cities = mysqli_num_rows($cities);


?>

<div class=" col-sm-7 list_container margin_0">

    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h4>Add Cities (ከተማ መጨመርያ)</h4>

            </div>
        </div>

<!--	    start of feedback place-->
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


			    $city_name = $_GET['City_Name'];

			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have added a new city successfully.</strong>
				    <br/>New City --- <?php echo("$city_name");?>
			    </div>

		    <?php

		    }

		    else if(isset($_GET['success_edit'])){




			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You Have Edited A city Successfully</strong>

			    </div>

		    <?php

		    }

		    else if(isset($_GET['success_delete'])){




			    ?>
			    <div class="alert alert-success alert-dismissable">
				    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				    <strong>You have deleted a city Successfully!</strong>

			    </div>

		    <?php

		    }
	    }

	    ?>


        <div class=" margin_top_20">
            <form class="form-horizontal" role="form" action="../../../../CONTROLLER/Encoder/Add_City.php" method="POST">


                <div class="form-group">
                    <label for="city" class="col-sm-4 control-label">City</label>
                    <div class="col-sm-5">
                        <input name="City_Name" type="text" class="form-control" id="city" placeholder="Enter City" >
                    </div>
                </div>
	            <div class="form-group">
		            <label for="City_Name_Amharic" class="col-sm-4 control-label">ከተማ</label>
		            <div class="col-sm-5">
			            <input name="City_Name_Amharic" type="text" class="form-control" id="City_Name_Amharic" placeholder="የከተማ ስም ያስገቡ" >
		            </div>
	            </div>


                <div class="form-group margin_top_30">

                    <div class="col-sm-5 col-lg-offset-4">
                        <button type="submit" class="btn btn-success btn-block"><strong>Add City</strong>
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
                <h4>List of Cities ( የክልል ዝርዝር )</h4>

            </div>
        </div>

        <div class=" margin_top_30">
            <table class="table table-hover">
                <thead>
                <th>#</th>

                <th>City</th>

                <th>ከተማ</th>
                </thead>
                <tbody>

	                <?php
	                //fetch the Citys from the database and render them to the view
		                $count = 0;
		                $city_name = "";
	                    $city_name_amharic = "";
                        $city_id = "";

		                if($cities){
			                while($city = mysqli_fetch_array($cities,MYSQLI_ASSOC)){
				                $count++;
				                $city_name = $city["Name"];
				                $city_name_amharic = $city["Name_Amharic"];
				                $city_id = $city["ID"];
				                ?>
				                <tr>
					                <td><?php echo($count);?></td>
					                <td><?php echo($city_name);?></td>
					                <td><?php echo($city_name_amharic);?></td>
					                <td>
						                <a class="btn btn-warning btn-xs" href="Edit_City.php?City_ID=<?php echo($city_id)?>">Edit</a>
						                <a class="btn btn-danger btn-xs"
						                   href="Delete_City.php?City_ID=<?php echo($city_id);?>">Delete</a>
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