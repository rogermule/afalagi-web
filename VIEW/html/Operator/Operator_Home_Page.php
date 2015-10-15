<?php


require_once("../../../CONFIGURATION/Config.php");
require_once("../../../MODEL/User.php");
require_once("../../../MODEL/User_Type.php");
require_once("../../../CONTROLLER/User_Controller.php");
require_once("../../../CONTROLLER/Controller_Secure_Access.php");
require_once("../../../CONTROLLER/SearchController.php");


$title="Operator";
include "Operator_Header.html";
$active_menu = "generic";

if(isset($_GET["faq"])){
    $active_menu = $_GET["faq"];
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

        <div class="col-sm-7 col-sm-offset-1">

    <?php

if(!isset($_GET["viewmore"])){   ?>

            <div class="row col-sm-12 operator_search ">
                    <h2 class="afalagi_text">Afalagi Generic Search</h2>
                    <br />

                     <form class="" role="form" action="Operator_Home_Page.php" method="GET">
                       <div class="row">
                            <div class="col-lg-12 input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Enter Company Name ...">
                            </div>

                       </div>

                     <div class="row  col-sm-offset-2">
                         <div class="col-lg-3">
                            <label class="text-primary search_optionsLabel">Search For: </label>
                         </div>

                         <div class="col-lg-3 search_options">
                            <select class="form-control" name="search_options">
                                <option value="company" name="company">Company</option>
                                <option value="event" name="event">Event</option>
                                <option value="building" name="building">Building</option>
                            </select>
                         </div>
                         <div class="col-lg-3 search_options">
                                        <button class="btn btn-primary" type="submit">Search  </button>

                         </div>
                     </div>
                  </form>


            </div>

<?php } ?>

<!-- for search-->
    <?php
        if(isset($_GET["search"])){

            $searchValue = $_GET["search"];
            $searchOptions = $_GET["search_options"];
            include("Operator_Search.php");
        }
    ?>

    <!-- for frequently asked questions-->

    <?php
        if(isset($_GET["faq"])){
            $faqValue = $_GET["faq"];
            include("Operator_Search_Frequent.php");
        }

    ?>

    <!-- for view more -->

    <?php
        if(isset($_GET["viewmore"])){
            $name = $_GET["name"];
            $desc = $_GET["desc"];
            $type = $_GET["type"];
            $region = $_GET["region"];
            $city = $_GET["city"];
            $subcity = $_GET["subcity"];
            $sefer = $_GET["sefer"];
            $phone = $_GET["phone"];
            include("View_More.php");
        }



    ?>

<?php

include "../Includable/Footer.php";
