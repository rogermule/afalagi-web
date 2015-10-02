<?php
/**
 * Created by PhpStorm.
 * User: rog
 * Date: 9/20/15
 * Time: 6:08 AM
 */

require("../../../CONTROLLER/SearchController.php");

$controller = new SearchController();

$typelist = $controller->getCompanyTypeDrop();

$html = "<select>";


while($results = mysqli_fetch_array($typelist,MYSQL_ASSOC)){
    $html.="<option value='".$results['Type']."'>".$results['Type']."</option>";
}

$html.="</select>";

echo $html;
?>