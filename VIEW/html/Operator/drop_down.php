<?Php
require_once("../../../CONFIGURATION/Config.php");
require_once("../../../CONTROLLER/SearchController.php");

error_reporting(E_ALL);// With this no error reporting will be there

$controller = new SearchController();

/////////////////////////////////////////////////////////////////////////////
$region=$_GET['region'];//
$city1=$_GET['city'];
$subcity1=$_GET['subcity'];


//////////////////////////////////////////////////////////////////

$citysearch = $controller->getCityDrop($region);

if(city!="none"){
    $subcity = $controller->getSubCityDrop($city);
}
else if($city=="none"){
    //$subcity = $controller->getSubCityAll();
}

/////////////////////////////////////////////////////////////////


if(strlen($region) > 0){
    $q_region="select  from region where region = '$region'";

}
else{
    $q_region="select distinct(city) from student5";
}


//echo $q_region;
$sth = $dbo->prepare($q_region);
$sth->execute();
$city = $sth->fetchAll(PDO::FETCH_COLUMN);

$citytt = mysql_fetch_assoc($citysearch);


$q_city="select distinct(subcity) from student5 where ";


if(strlen($region) > 0){
    $q_city= $q_city . " region = '$region' ";
}

if(strlen($city1) > 0){
    $q_city= $q_city . " and  city='$city1'";
}

$sth = $dbo->prepare($q_city);
$sth->execute();
$subcity = $sth->fetchAll(PDO::FETCH_COLUMN);


$main = array('city'=>$citytt["name"],'subcity'=>$subcity,'value'=>array("city1"=>"$city1","subcity1"=>"$subcity1"));

echo json_encode($main);

////////////End of script /////////////////////////////////////////////////////////////////////////////////
?>