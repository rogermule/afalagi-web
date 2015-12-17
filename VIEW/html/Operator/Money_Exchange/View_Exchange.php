<?php
require("Require.php");
include "Operator_Header.php";
include "Includeables.php";

$user = $_SESSION['Logged_In_User'];
$operator = new Operator_Controller($user);

$dollar = $operator->Get_Money_Exchange(1);
$pound = $operator->Get_Money_Exchange(2);
$dirham = $operator->Get_Money_Exchange(3);
$rial = $operator->Get_Money_Exchange(4);
$franc = $operator->Get_Money_Exchange(5);
$yen = $operator->Get_Money_Exchange(6);
$rupee = $operator->Get_Money_Exchange(7);
$yuan = $operator->Get_Money_Exchange(8);
$euro = $operator->Get_Money_Exchange(9);

$buying = "";
$selling = "";
?>

<div class="col-sm-8 margin_4p list_container">
    <div class="row">
    <div class="panel panel-primary list_header margin_top_10">
        <div class="panel-body text-center btn-success white ">
                <h3>የእለቱ የአለም አቀፍ ገንዘብ ምንዛሪ</h3>
        </div>
    </div>
</div>
    <div class="col-sm-12">

            <div class="col-sm-12">
              <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">የአሜሪካ ዶላር</h4>
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
                            <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">የብሪታንያ ፓውንድ</h4>
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
                            <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                        </div>
                    </div>
                </div>
              </div>
            </div>



            <div class="col-sm-12">
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> ዩሮ</h4>
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
                                <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> ዩ.ኤ.ኢ ድርሃም</h4>
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
                                <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        <div class="col-sm-12">
            <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">ሳውዲ ሪያል</h4>
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
                            <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center"> የፈረንሳይ ፍራንክ </h4>
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
                            <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                        </div>
                        <div class="single_info row">
                            <div class="col-sm-3 left_disc">ሽያጭ</div>
                            <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <div class="col-sm-12">
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> የጃፓን የን</h4>
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
                                <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center"> የህንድ ሩፒ</h4>
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
                                <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-sm-12">
                <div class="col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">የቻይና ዩዋን</h4>
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
                                <div class="col-sm-9 float_left"><?php echo $buying; ?></div>
                            </div>
                            <div class="single_info row">
                                <div class="col-sm-3 left_disc">ሽያጭ</div>
                                <div class="col-sm-9 float_left"><?php echo $selling ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
</div>

<?php

include("Operator_Footer.php");

?>