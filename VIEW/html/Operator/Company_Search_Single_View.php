<?php

$single_company = $search_controller->Get_Company_For_Search($company_id);
$Company_Spec = mysqli_fetch_array($single_company,MYSQLI_ASSOC);

//$company_name = $Company_Spec["Company_Name"];
$company_description = $Company_Spec["Product_Service"];
//$company_type = $Company_Spec["Category_ID"];

//region
$company_region_id = $Company_Spec["Region"];
$company_region = $search_controller->getRegion($company_region_id);
//city
$company_city_id = $Company_Spec["City"];
$company_city = $search_controller->getCity($company_city_id);
//subcity
$company_sub_city_id =  $Company_Spec["Sub_City"];
$company_sub_city = $search_controller->getSubCity($company_sub_city_id);
//sefer
$company_sefer_id =  $Company_Spec["Sefer"];
$company_sefer = $search_controller->getSefer($company_sefer_id);
//phone number
$company_phone =  $Company_Spec["Telephone"];

?>


<li class="list-group-item">

	<h4 class="list-group-item-heading">
		<span class="number"> <?php echo "<h3>";echo($count); echo ".";?></span> <span class="name"><?php echo($company_name);?></span></h3></h4>
	<dl class="dl-horizontal-search grey">
		<dt>ID</dt>
		<dd><?php echo($company_id);?></dd>

		<dt>Description</dt>
		<dd><?php echo($company_description);?></dd>

        <dt>Company Type</dt>
        <dd><?php echo($company_type);?></dd>

        <dt>Region</dt>
        <dd><?php echo($company_region);?></dd>

        <dt>City</dt>
        <dd><?php echo($company_city);?></dd>

        <dt>SubCity</dt>
        <dd><?php echo($company_sub_city);?></dd>

        <dt>Sefer</dt>
        <dd><?php echo($company_sefer);?></dd>

        <dt>Phone Num</dt>
        <dd><?php echo($company_phone);?></dd>
    </dl>

	<div class="text-right">


        <?php

        if($Belong_to == Belong::COMPANY_WITH_BUILDING ){

            ?>
            <a class="btn btn-warning btn-xs" href="Company_View_In_Detail.php?CB=1&company_id=<?php echo($company_id);?>">View More</a>

        <?php

        }
        else if($Belong_to == Belong::COMPANY_WITH_OUT_BUILDING){

            ?>
            <a class="btn btn-warning btn-xs" href="Company_View_In_Detail.php?CA=1&company_id=<?php echo($company_id);?>">View More</a>

        <?php
        }
        ?>

    </div>

</li>