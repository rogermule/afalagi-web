<?php

$title="Operator";
$active_menu = "specific";

include "Operator_Header.html";

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

		<div class="row col-sm-12 operator_search">

				<h2 class="afalagi_text">Afalagi Specific Search</h2>

            <br />


            <form class="specific_search" role="form" action="" method="POST">

                <div class="form-group">
                    <div class="">
                        <label for="region" class="col-sm-4 control-label">Company Catagory</label>
                    </div>
                    <div class="dropdown">
                        <select name="region">
                            <option value="none">--</option>
                            <option value="">Hotel</option>
                            <option value="">Events</option>
                            <option value="">Buildings</option>
                            <option value="">Companies</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="region" class="col-sm-4 control-label">Region</label>
                    </div>
                    <div class="dropdown">
                        <select name="region">
                            <option value="addis">Addis Ababa</option>
                            <option value="oromia">Oromia</option>
                            <option value="amhara">Amhara</option>
                            <option value="tigray">Tigray</option>
                            <option value="snnpr">SNNPR</option>
                            <option value="none">--</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="region" class="col-sm-4 control-label">City</label>
                    </div>
                     <div class="dropdown">
                        <select class="" name="cars">
                            <option value="none">--</option>
                            <option class="" value="volvo">Addis Ababa</option>
                            <option class="" value="saab">Hawassa</option>
                            <option value="fiat">Adama</option>
                            <option value="audi">Bahir Dar</option>

                        </select>
                    </div>

            </div>

            <div class="form-group">
                <div class="">
                    <label for="region" class="col-sm-4 control-label">Sub City</label>
                 </div>
                 <div class="dropdown">
                        <select name="cars">
                            <option value="none">--</option>
                            <option value="volvo">Arada</option>
                            <option value="saab">Saab</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>

                        </select>
                 </div>
            </div>

            <div class="form-group">
                <div class="">
                    <label for="region" class="col-sm-4 control-label">Sefer</label>
                </div>
                <div class="dropdown">
                        <select name="cars">
                            <option value="none">--</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>

                        </select>
                </div>


            </div>

                <div class="form-group margin_top_20">
                    <div class="col-sm-offset-1 col-sm-5">
                        <button type="submit" class="btn btn-primary btn-block bt_specific_search"><strong>Search</strong></button>
                    </div>
                </div>
            </form>

        </div>
        </div>
		</div>
	</div>

<?php


include "../Includable/Footer.php";
