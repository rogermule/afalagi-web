<?php
$user = $_SESSION['Logged_In_User'];
$search_controller = new Encoder_Controller($user);//make an encoder object

//$controller = new SearchController();
//$result = $controller->genericSearch($searchValue,$searchOptions);

$searchdata = trim($searchValue);

$searchresult = $search_controller->Get_Company_For_Search_Listing($searchdata);

$num_of_result = mysqli_num_rows($searchresult);

?>

	<div class="row margin_top_30 operator_search">


		<div class="col-sm-12">
			<h3 class="afalagi_text">Afalagi Search Result</h3>
            <h5 class="afalagi_search">
                <?php echo $num_of_result; echo " results found for \""; echo $searchValue; ?>"
                     in <?php echo $searchOptions ?></h5>

            <br />
            <div class="row">
                <div class="col-lg-11">


                    <ul class="list-group">

                <?php

                        $count = 0;
                        if($num_of_result>0){

                            while($results = mysqli_fetch_array($searchresult,MYSQL_ASSOC)){
                                $company_id = $results['company_id'];
                               $company_name = $results['company_name'];
                                $company_type = $results['category'];
                                $Belong_to = $results["belong_to"];

                                $count++;
                                include("Operator_Search_Single_View.php");
                            }
                        }
                        else{
                            echo("<h4>No result found for \"".$searchValue."\"</h4>");
                        }
                        ?>

                    </ul>

                </div>
            </div>
        </div>
	</div>

</div>