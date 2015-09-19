<?php

require("../../../CONFIGURATION/Config.php");
require("../../../CONTROLLER/SearchController.php");

$title="Operator";
include "Operator_Header.html";
$active_menu = "generic";


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

                <nav>
                    <ul class="pagination">
                        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        ...
                    </ul>
                </nav>
                 <form class="" role="form" action="Operator_Home_Page.php" method="GET">

                    <div class="row">
                        <div class="col-lg-11 operator_search_input_area">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Enter Company Name ...">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default afalagi_text" type="submit">Search</button>
                                  </span>
                            </div>
                        </div>
                    </div>

                  </form>


            </div>

<?php } ?>
<!-- for search-->
    <?php
        if(isset($_GET["search"])){

            $searchValue = $_GET["search"];
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
