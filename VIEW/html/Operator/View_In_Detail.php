<?php


require("../../../CONFIGURATION/Config.php");
require(DB);
require("../../../MODEL/User.php");
require("../../../MODEL/User_Type.php");
require("../../../CONTROLLER/Encoder/User_Controller.php");
require("../../../CONTROLLER/Encoder/All_Controllers.php");
require("../../../CONTROLLER/Controller_Secure_Access.php");
require("../../../MODEL/Belong.php");

include "Operator_Header.html";
$active_menu = "generic";
$title="Operator";

if(isset($_GET["faq"])){
    $active_menu = $_GET["faq"];
}

//in here we are going to fetch data that is going to feel the drop downs
$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

$Regions = $encoder->Get_Regions();      //get regions
$Cities   = $encoder->Get_City();        //get cities
$SubCities = $encoder->Get_Sub_City();   //get sub cities
$Weredas = $encoder->Get_Wereda();       //get weredas
$Sefers = $encoder->Get_Sefer();        //get sefer
$buildings = $encoder->Get_Buildings();  //get the buildings
$Street = $encoder->Get_Streets();       //get street
$categories = $encoder->Get_Category();  //get category
$company_ownership = $encoder->Get_Ownerships();//get different type of ownership

if($_SERVER['REQUEST_METHOD']== 'GET'){

    if(isset($_GET['CA'])){

        $Company_ID = $_GET['company_id'];
        $single_company = $encoder->Get_Company_With_Out_Building($Company_ID);
        $Company_Spec = mysqli_fetch_array($single_company,MYSQLI_ASSOC);

        //get place
        $Com_Region_ID = $Company_Spec["Region"];
        $Com_City_ID = $Company_Spec["City"];
        $Com_Sub_City_ID = $Company_Spec["Sub_City"];
        $Com_Sefer_ID = $Company_Spec["Sefer"];
        $Com_Wereda_ID = $Company_Spec["Wereda"];
        $Com_Street_ID = $Company_Spec["Street"];
        $Com_Direction = $Company_Spec["Direction"];
        $Com_Direction_Amharic = $Company_Spec["Direction_Amharic"];

        //contact
        $Com_House_No = $Company_Spec["House_No"];
        $Com_POBOX = $Company_Spec["POBOX"];
        $Com_Telephone = $Company_Spec["Telephone"];
        $Com_Fax = $Company_Spec["FAX"];
        $Com_Email = $Company_Spec["Email"];

        //get category and type
        $Com_Category_ID = $Company_Spec["Category_ID"];
        $Com_Company_Type_ID = $Company_Spec["Company_Type_ID"];

        //about company
        $Com_Company_Name = $Company_Spec["Company_Name"];
        $Com_Company_Name_Amharic = $Company_Spec["Company_Name_Amharic"];
        $Com_Working_Hours = $Company_Spec["Working_Hours"];
        $Com_Working_Hours_Amharic = $Company_Spec["Working_Hours_Amharic"];
        $Com_Company_Service = $Company_Spec["Product_Service"];
        $Com_Company_Service_Amharic = $Company_Spec["Product_Service_Amharic"];
        $Com_Branch = $Company_Spec["Branch"];
        $Com_Branch_Amharic = $Company_Spec["Branch_Amharic"];
        $Com_Expiration_Date = $Company_Spec["Expiration_Date"];


        //right_side
        $About_Company_ID = $Company_Spec["About_Company_ID"];
        $Payment_Status_ID = $Company_Spec["Payment_Status_ID"];
        $Company_Service_ID = $Company_Spec["Company_Service_ID"];
        $Company_Ownership_ID =$Company_Spec["Company_Ownership_ID"];
        $Company_Category_ID = $Company_Spec["Company_Category_ID"];
        $Contact_ID = $Company_Spec["Contact_ID"];

        //left side
        $Direction_ID = $Company_Spec["Direction_ID"];
        $Place_ID = $Company_Spec["Place_ID"];



    }
    else if(isset($_GET['CB'])){

        $Company_ID = $_GET['company_id'];
        $single_company = $encoder->Get_Company_With_Building($Company_ID);
        $Company_Spec = mysqli_fetch_array($single_company,MYSQLI_ASSOC);

        //company spec
        $Com_Company_Name = $Company_Spec["Company_Name"];
        $Com_Company_Name_Amharic = $Company_Spec["Company_Name_Amharic"];
        $Com_Working_Hours = $Company_Spec["Working_Hours"];
        $Com_Working_Hours_Amharic = $Company_Spec["Working_Hours_Amharic"];
        $Com_Company_Service = $Company_Spec["Product_Service"];
        $Com_Company_Service_Amharic = $Company_Spec["Product_Service_Amharic"];
        $Com_Branch = $Company_Spec["Branch"];
        $Com_Branch_Amharic = $Company_Spec["Branch_Amharic"];
        $Com_Expiration_Date = $Company_Spec["Expiration_Date"];

        //addresss and place
        $Com_Address_ID = $Company_Spec["Address_ID"];
        $Place_ID = $encoder->getPlaceID($Com_Address_ID);
        $Direction_ID = $encoder->getDirectionID($Com_Address_ID);
        $PlacerResult = $encoder->getPlace($Place_ID);
        $DirectionResult = $encoder->getDirection($Direction_ID);

        while($Place = mysqli_fetch_array($PlacerResult,MYSQL_ASSOC)){
            $Com_Region_ID = $Place["Region"];
            $Com_City_ID = $Place["City"];
            $Com_Sub_City_ID = $Place["Sub_City"];
           $Com_Sefer_ID = $Place["Sefer"];
           $Com_Wereda_ID = $Place["Wereda"];
           $Com_Street_ID = $Place["Street"];
        }

        while($Direction = mysqli_fetch_array($DirectionResult,MYSQL_ASSOC)){
            $Com_Direction = $Direction["Direction"];
            $Com_Direction_Amharic = $Direction["Direction_Amharic"];

        }

        //contact
        $Com_House_No = $Company_Spec["House_No"];
        $Com_POBOX = $Company_Spec["POBOX"];
        $Com_Telephone = $Company_Spec["Telephone"];
        $Com_Fax = $Company_Spec["FAX"];
        $Com_Email = $Company_Spec["Email"];
        $Com_Category_ID = $Company_Spec["Category_ID"];
        $Com_Company_Type_ID = $Company_Spec["Company_Type_ID"];
        $Com_Floor = $Company_Spec["Floor"];
        $Com_Building_ID = $Company_Spec["Building_ID"];

        //left_side
        $About_Company_ID = $Company_Spec["About_Company_ID"];
        $Payment_Status_ID = $Company_Spec["Payment_Status_ID"];
        $Company_Service_ID = $Company_Spec["Company_Service_ID"];
        $Company_Ownership_ID =$Company_Spec["Company_Ownership_ID"];
        $Company_Category_ID = $Company_Spec["Company_Category_ID"];
        $Contact_ID = $Company_Spec["Contact_ID"];

        //building stuff
        $Address_Building_ID = $Company_Spec["Address_Building_Floor_ID"];
        $Building_ID = $Company_Spec["Building_ID"];
        $Floor =$Company_Spec["Floor"];

    }
}

?>


<div class="margin_top_70">

<?php
include('Operator_Navigation.html');
?>

<div class="row">
<?php

include('Operator_Menu.php');

?>

<div class="col-sm-8 col-sm-offset-1">

<div class="col-sm-9 list_container margin_0">

<div class="col-sm-12">

<div class=" margin_top_20">

<div class="panel panel-primary">
<div class="panel-heading">
    <h4 class="text-center"><?php echo $Com_Company_Name; ?></h4>
</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="POST">

<div>
<?php
    if(isset($Com_Building_ID)){
?>

<div class="form-group">
    <label for="Building" class="col-sm-4 control-label">Building</label>
    <div class="col-sm-5">
        <input class="form-control " id="Building" disabled name="Building" value="<?php echo $encoder->getBuilding($Com_Building_ID); ?>" />


     </div>

</div>

<div class="form-group">
    <label for="Building_Floor" class="col-sm-4 control-label">Building Floor</label>
    <div class="col-sm-5">
        <input disabled class="form-control" id="Building_Floor" name="Building_Floor" value="<?php echo $Com_Floor ?>">

    </div>

</div>

<?php
}
?>
<hr>

    <div class="form-group">
        <label for="Region" class="col-sm-4 control-label">Region</label>
        <div class="col-sm-5">
            <input disabled class="form-control place" id="Region" name="Region" value="<?php echo $encoder->getRegion($Com_Region_ID);?>"  >

        </div>
    </div>

    <div class="form-group">
        <label for="City" class="col-sm-4 control-label">City</label>
        <div class="col-sm-5">
            <iinput disabled class="form-control place" id="City" name="City" value="<?php echo $encoder->getCity($Com_City_ID);?>">
        </div>

    </div>

    <div class="form-group">
        <label for="Sub_City" class="col-sm-4 control-label">Sub City</label>
        <div class="col-sm-5">
            <input disabled class="form-control place" id="Sub_City" name="Sub_City" value="<?php echo $Com_Sub_City_ID; ?>">
        </div>

    </div>

    <div class="form-group">
        <label for="Wereda" class="col-sm-4 control-label">Kebele/Wereda</label>
        <div class="col-sm-5">
            <input disabled class="form-control place" id="Wereda" name="Wereda" value="Woreda">
        </div>

    </div>

    <div class="form-group">
        <label for="Sefer" class="col-sm-4 control-label">Sefer</label>
        <div class="col-sm-5">
            <input disabled class="form-control place" id="Sefer" name="Sefer" value="<?php echo $encoder->getSefer($Com_Sefer_ID); ?>">

        </div>

    </div>

    <div class="form-group">
        <label for="Street" class="col-sm-4 control-label">Street</label>
        <div class="col-sm-5">
            <input disabled class="form-control place" id="Street" name="Street" value="<?php echo $encoder->getStreet($Com_Street_ID); ?>">

        </div>

    </div>


<div class="form-group">
    <label for="Direction"
           class="col-sm-4 control-label">Direction to the company</label>
    <div class="col-sm-5">

        <textarea disabled name="Direction" class="form-control place"
                  rows="3"  id="Direction"
                  ><?php if(isset($_GET['CA'])){echo($Com_Direction);}?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="Direction_Amharic"
           class="col-sm-4 control-label ">አቅጣጫ</label>
    <div class="col-sm-5">

        <textarea disabled name="Direction_Amharic" class="form-control place"
                  rows="3"  id="Direction_Amharic"
                 ><?php if(isset($_GET['CA'])){echo($Com_Direction_Amharic);}?></textarea>
    </div>
</div>

<hr>

<div class="form-group">
    <label for="House_Number" class="col-sm-4 control-label">House number</label>
    <div class="col-sm-5">
        <input disabled name="House_Number" type="text" class="form-control"
               id="House_Number" value="<?php echo($Com_House_No);?>">
    </div>
</div>

<div class="form-group">
    <label for="POBOX" class="col-sm-4 control-label">PO-BOX</label>
    <div class="col-sm-5">
        <input disabled name="POBOX" type="text" class="form-control"
               id="POBOX" value="<?php echo($Com_POBOX);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Telephone" class="col-sm-4 control-label">Telephone</label>
    <div class="col-sm-5">
        <input disabled name="Telephone" type="text" class="form-control"
               id="Telephone" value="<?php echo($Com_Telephone);?>" >
    </div>
</div>

<div class="form-group">
    <label for="FAX" class="col-sm-4 control-label">FAX</label>
    <div class="col-sm-5">
        <input disabled name="FAX" type="text" class="form-control"
               id="FAX" value="<?php echo($Com_Fax);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Email" class="col-sm-4 control-label">Email</label>
    <div class="col-sm-5">
        <input disabled name="Email" type="text" class="form-control"
               id="Email" value="<?php echo($Com_Email);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Category" class="col-sm-4 control-label">Category</label>
    <div class="col-sm-5">
        <input disabled class="form-control" id="Category" name="Category" value="<?php echo $Company_Category_ID ?>" />
    </div>

</div>

<div class="form-group">
    <label for="Company_Type" class="col-sm-4 control-label">Company ownership Type</label>
    <div class="col-sm-5">
        <input disabled class="form-control" id="Company_Type" name="Company_Type" value="<?php echo $encoder->getOwnershipType($Com_Company_Type_ID); ?>">
    </div>

</div>
<hr>

<div class="form-group">
    <label for="Company_Name" class="col-sm-4 control-label">Company Name</label>
    <div class="col-sm-5">
        <input disabled name="Company_Name" type="text" class="form-control"
               id="Company_Name" value="<?php echo($Com_Company_Name);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Company_Name_Amharic" class="col-sm-4 control-label">የድርጅቱ ስም</label>
    <div class="col-sm-5">
        <input disabled name="Company_Name_Amharic" type="text" class="form-control"
               id="Company_Name_Amharic" value="<?php echo($Com_Company_Name_Amharic);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Working_Hours" class="col-sm-4 control-label">Working Hours</label>
    <div class="col-sm-5">
        <input disabled name="Working_Hours" type="text" class="form-control"
               id="Working_Hours"  value="<?php echo($Com_Working_Hours);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Working_Hours_Amharic" class="col-sm-4 control-label">የስራ ሰዓት</label>
    <div class="col-sm-5">
        <input disabled name="Working_Hours_Amharic" type="text" class="form-control"
               id="Working_Hours_Amharic" value="<?php echo($Com_Working_Hours_Amharic);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Product_Description_And_Service"
           class="col-sm-4 control-label">Company Services</label>
    <div class="col-sm-5">
        <textarea disabled name="Product_Description_And_Service" class="form-control"
                  rows="3"  id="Product_Description_And_Service"
                  ><?php echo($Com_Company_Service);?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="Product_Description_And_Service_Amharic"
           class="col-sm-4 control-label">የስራ ውጤት ማብራርያ</label>
    <div class="col-sm-5">

        <textarea disabled name="Product_Description_And_Service_Amharic" class="form-control"
                  rows="3"  id="Product_Description_And_Service_Amharic"
                 ><?php echo($Com_Company_Service_Amharic);?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="Branch" class="col-sm-4 control-label">Branch</label>
    <div class="col-sm-5">
        <input disabled name="Branch" type="text" class="form-control"
               id="Branch"  value="<?php echo($Com_Branch);?>" >
    </div>
</div>

<div class="form-group">
    <label for="Branch_Amharic" class="col-sm-4 control-label">ቅርንጫፍ</label>
    <div class="col-sm-5">
        <input disabled name="Branch_Amharic" type="text" class="form-control"
               id="Branch"  value="<?php echo($Com_Branch_Amharic);?>" >
    </div>
</div>

</div>

<hr />
</form>



</div>
</div>

</div>

</div>

</div>


<?php

//if the company is found on a building disable the place forms
if(isset($_GET["CB"])){

    ?>
    <script>
        $(document).ready( function(){
            Disable_Place_Forms();
        });
        //this will enable place forms
        function Disable_Place_Forms(){
            $(".place").attr('disabled','disabled');
        }

    </script>
<?php
}
?>


</div>

</div>
</div>
