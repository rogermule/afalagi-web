<?php
require("Require.php");
include "Encoder_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$encoder = new Encoder_Controller($user);//make an encoder object

$dollar = $encoder->Get_Money_Exchange(1);
$pound = $encoder->Get_Money_Exchange(2);
$dirham = $encoder->Get_Money_Exchange(3);
$rial = $encoder->Get_Money_Exchange(4);
$franc = $encoder->Get_Money_Exchange(5);
$yen = $encoder->Get_Money_Exchange(6);
$rupee = $encoder->Get_Money_Exchange(7);
$yuan = $encoder->Get_Money_Exchange(8);
$euro = $encoder->Get_Money_Exchange(9);

$date = $encoder->Get_Money_Exchange_Date();

$buying = "";
$selling = "";

?>

<div class="col-sm-8 margin_4p list_container">

    <div class="row">
        <?php
        if(isset($_SESSION["update_status"])){
            if($_SESSION["update_status"] == "success"){
        ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo("Successfully updated!");?>
            </div>

        <?php
                unset($_SESSION["update_status"]);
            }
            else if($_SESSION["update_status"] == "fail"){
        ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Warning! </strong><?php echo("No Internet connection"); ?>
            </div>
        <?php
                unset($_SESSION["update_status"]);
            }
        }
        ?>
        <div class="panel panel-primary list_header margin_top_10">
            <div class="panel-body text-center btn-success ">
                <h3>የእለቱ የአለም አቀፍ ገንዘብ ምንዛሪ </h3>


                    <h5>ይህ መረጃ የተለቀቀበት ቀን: <?php echo $date; ?></h5>
                <h4><span class="glyphicon glyphicon-refresh "> </span>

                    <a href="Update_Money_Exchange.php" class="white"> አድስ / Update </a> </h4>
            </div>
        </div>
    </div>

    <div class="col-sm-12">

            <div class="col-sm-12">
              <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">የአሜሪካ ዶላር (US Dollar)</h4>
                        <?php
                            while($results = mysqli_fetch_array($dollar,MYSQL_ASSOC)){
                                $buying = $results['buying'];
                                $selling = $results['selling'];

                            }
                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ግዢ</div>
                            <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling . " ብር" ?></div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">የብሪታንያ ፓውንድ (British Pound) </h4>
                        <?php
                        while($results = mysqli_fetch_array($pound,MYSQL_ASSOC)){
                            $buying = $results['buying'];
                            $selling = $results['selling'];

                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ግዢ</div>
                            <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                        </div>
                    </div>
                </div>
              </div>
            </div>



            <div class="col-sm-12">
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> ዩሮ (Euro) </h4>
                            <?php
                            while($results = mysqli_fetch_array($euro,MYSQL_ASSOC)){
                                $buying = $results['buying'];
                                $selling = $results['selling'];

                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ግዢ</div>
                                <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> ዩ.ኤ.ኢ ድርሃም (UAE Dirham) </h4>
                            <?php
                            while($results = mysqli_fetch_array($dirham,MYSQL_ASSOC)){
                                $buying = $results['buying'];
                                $selling = $results['selling'];

                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ግዢ</div>
                                <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        <div class="col-sm-12">
            <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">ሳውዲ ሪያል (Saudi Riyal) </h4>
                        <?php
                        while($results = mysqli_fetch_array($rial,MYSQL_ASSOC)){
                            $buying = $results['buying'];
                            $selling = $results['selling'];

                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ግዢ</div>
                            <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center"> የፈረንሳይ ፍራንክ (France Franc) </h4>
                        <?php
                        while($results = mysqli_fetch_array($franc,MYSQL_ASSOC)){
                            $buying = $results['buying'];
                            $selling = $results['selling'];

                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ግዢ</div>
                            <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <div class="col-sm-12">
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> የጃፓን የን (Japanese Yen) </h4>
                            <?php
                            while($results = mysqli_fetch_array($yen,MYSQL_ASSOC)){
                                $buying = $results['buying'];
                                $selling = $results['selling'];

                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ግዢ</div>
                                <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> የህንድ ሩፒ (Indian Rupee) </h4>
                            <?php
                            while($results = mysqli_fetch_array($rupee,MYSQL_ASSOC)){
                                $buying = $results['buying'];
                                $selling = $results['selling'];

                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ግዢ</div>
                                <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-sm-12">
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">የቻይና ዩዋን (Chinese Yuan) </h4>
                            <?php
                            while($results = mysqli_fetch_array($yuan,MYSQL_ASSOC)){
                                $buying = $results['buying'];
                                $selling = $results['selling'];

                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ግዢ</div>
                                <div class="col-sm-9 float_left"><?php echo $buying . " ብር"; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling . " ብር"; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
<?php

include("Encoder_Footer.php");

?>
