<?php

$company_type = $controller->getCompanyType($company_type_id);
$place_id = $controller->getPlaceId($company_address);

$company_region_id = $controller->getRegionId($place_id);
$company_region = $controller->getRegion($company_region_id);

$company_city_id = $controller->getCityId($place_id);
$company_city = $controller->getCity($company_city_id);

$company_sub_city_id = $controller->getSubCityId($place_id);
$company_sub_city = $controller->getSubCity($company_sub_city_id);

$company_sefer_id = $controller->getSeferId($place_id);
$company_sefer = $controller->getSefer($company_sefer_id);

$company_phone = "";

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

        <dt>Phone Number</dt>


    </dl>

	<div class="text-right">
		<a href="Operator_Home_Page.php?viewmore=1&name=<?php echo $company_name;?>&desc=<?php echo $company_description ?>
		        &type=<?php echo $company_type ?>&region=<?php echo $company_region?>&city=<?php echo $company_city ?>
		        &subcity=<?php echo $company_sub_city?>&sefer=<?php $company_sefer?>&phone=<?php echo $company_phone?>"
                class="btn btn-warning btn-xs" role="button">View More</a>
	</div>

</li>