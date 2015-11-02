<?php

$controller = new SearchController();


switch($faqValue){
    case "building":
        $result = $controller->getFaqBuilding();
        break;
    case "company":
        $result = $controller->getFaqBuilding();
        break;
}

$num_of_result = mysqli_num_rows($result);



?>

	<div class="row margin_top_30 operator_search">


		<div class="col-sm-12">
			<h3 class="afalagi_text">Frequently Asked "<?php echo $faqValue; ?>"</h3>
            <h5 class="afalagi_search"> <?php echo $num_of_result; echo " results found for \""; echo $faqValue; ?>"</h5>

            <br />
            <div class="row">
                <div class="col-lg-11">


                    <ul class="list-group">

                        <?php

                        $count = 0;
                        if($num_of_result>0){

                            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                                $company_id = $results['ID'];
                                //$company_name = $results['Company_Name'];
                                //$company_description = $results['Discription'];
                                //$company_type_id = $results['Company_Type'];
                                //$company_address = $results['Address'];
                                //$company_city;
                               // $company_subcity;
                               // $company_sefer;
                               // $company_phone;

                                $count++;

                                include("Company_Search_Single_View.php");
                            }
                        }
                        else{
                            echo("<h4>No result found for \"".$faqValue."\"</h4>");
                        }
                        ?>

                    </ul>





                </div>
            </div>
        </div>
	</div>

</div>